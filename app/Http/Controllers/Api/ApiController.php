<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UpsellProduct;
use App\Models\UpsellAssignedProduct;
use App\Models\Setting;
use App\Models\Campaign;
use App\Models\Offer;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    public function list_products($id, $format=null){
        if(Product::where('products.category_id', $id)->exists()){
            $products_info = Product::where('products.category_id', $id)->join('categories', 'products.category_id', '=', 'categories.id')->select('products.*', 'categories.name as category_name', 'categories.description as category_description', 'categories.image as category_image')->get();

            if($format){
                $organizedData = [];
                $parentIndex = 0;
                $childIndex = 0;
            
                foreach($products_info as $key => $value) {
                    if($key % 4 == 0) {
                        $organizedData[$parentIndex]['parent'] = $value;
                        $childIndex = 0;
                    } else {
                        $organizedData[$parentIndex]['children'][$childIndex] = $value;
                        $childIndex++;
                    }
                    if($key % 4 == 3) {
                        $parentIndex++;
                    }
                }
            
                return response()->json([
                    'status' => 200,
                    'message' => 'Products found successfully',
                    'data' => $organizedData
                ]);
            }else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Products found successfully',
                    'data' => $products_info
                ]);
            }

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Products not found against this category ID'
            ]);
        }
    }

    public function list_offers($slug){
        if(Product::where('products.slug', $slug)->exists()){
            $products_info = Product::where('products.slug', $slug)->first();
            $product_id = $products_info->id;
            $campaign_id = $products_info->campaign_id;
            $campaign_info = Campaign::where('campaigns.id', $campaign_id)->first();
            $products_info->campaign_crm_id = $campaign_info->crm_id;
            
            if(!empty($campaign_info->info_text)){
                $products_info->info_text = $campaign_info->info_text;
            }
                
            $products_info->offers = Offer::where('offers.product_id', $product_id)->get();
            $products_info->product_reviews = CustomerReview::where('customer_reviews.product_id', $product_id)->get();

            return response()->json([
                'status' => 200,
                'message' => 'Offers found successfully',
                'data' => $products_info
            ]);

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Offers not found against this product slug'
            ]);
        }
    }

    public function list_upsells($slug){
        if(UpsellProduct::where('upsell_products.slug', $slug)->exists()){
            $upsells_info = UpsellProduct::where('upsell_products.slug', $slug)->first();

            return response()->json([
                'status' => 200,
                'message' => 'Offers found successfully',
                'data' => $upsells_info
            ]);

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Upsell not found against this slug'
            ]);
        }
    }

    public function list_main_product($id){
        if(UpsellAssignedProduct::where('upsell_product_id', $id)->exists()){
            $upsell_assigned_product = UpsellAssignedProduct::where('upsell_product_id', $id)->first();
            $product_id = $upsell_assigned_product['product_id'];

            $main_product = Product::where('id', $product_id)->first();

            return response()->json([
                'status' => 200,
                'message' => 'Product found successfully',
                'data' => $main_product['logo']
            ]);

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found against this ID'
            ]);
        }
    }

    public function list_bought_products(){
        $bought_products = Session::get('bought_products');
        $orderId = Session::get('orderId');

        return response()->json([
            'status' => 200,
            'message' => 'Products found successfully',
            'data' => $bought_products,
            'orderId' => $orderId
        ]);
    }

    public function checkout(Request $request){
        if(str_contains($request->phone, '-')) {
            $formattedPhoneNumber = preg_replace('/\D/', '', $request->phone);
            $request['phone'] = $formattedPhoneNumber;

        }

        $product_id = $request->product_id;
        $import_click_response = import_click($request->all());
        $import_click_response = json_decode($import_click_response, true);

        if($import_click_response['result'] == 'SUCCESS'){
            $request->request->add(['sessionId' => $import_click_response['message']['sessionId']]);
            $import_lead_response = import_lead($request->all());
            $import_lead_response = json_decode($import_lead_response, true);

            if($import_lead_response['result'] == 'SUCCESS'){
                $request->request->add(['orderId' => $import_lead_response['message']['orderId']]);
                $import_order_response = import_order($request->all());
                $import_order_response = json_decode($import_order_response, true);
                
                if($import_order_response['result'] == 'SUCCESS'){
                    $bought_product = Product::where('id', $product_id)->first();
                    $price = $bought_product['price'] - ($bought_product['price'] * $bought_product['discount'] / 100);
                    $name = $bought_product['name'];
                    $quantity = 1;

                    $bought_product = array(array(
                        'name' => $name,
                        'price' => $price,
                        'quantity' => $quantity
                    ));

                    Session::put('bought_products', $bought_product);
                    Session::put('orderId', $import_order_response['message']['orderId']);
                    $upsell_products = UpsellAssignedProduct::join('upsell_products', 'upsell_assigned_products.upsell_product_id', '=', 'upsell_products.id')->select('upsell_products.*', 'upsell_assigned_products.upsell_key')->where('product_id', $product_id)->orderBy('upsell_key', "ASC")->get();

                    if(count($upsell_products) > 0){
                        Session::put('upsell_count', count($upsell_products)-1);
                        Session::put('upsell_detail', $upsell_products);
                        $redirect_url = url('/upsell/'.$upsell_products[count($upsell_products)-1]->slug);

                    }else {
                        $redirect_url = url('/thank-you');
                    }

                    return response()->json([
                        'status' => 200,
                        'data' => $upsell_products,
                        'redirect_url' => $redirect_url
                    ]);
                }else {
                    $import_order_error = "";
                    if(is_array($import_order_response['message'])){
                        foreach($import_order_response['message'] as $key => $error){
                            $import_order_error .= $key.": ".$error;
                        }
        
                    }else {
                        $import_order_error = $import_order_response['message'];
                    }

                    return response()->json([
                        'status' => 400,
                        'error' => $import_order_error
                    ]);
                }
            }else {
                $import_lead_error = "";
                if(is_array($import_lead_response['message'])){
                    foreach($import_lead_response['message'] as $key => $error){
                        $import_lead_error .= $key.": ".$error;
                    }
    
                }else {
                    $import_lead_error = $import_lead_response['message'];
                }

                return response()->json([
                    'status' => 400,
                    'error' => $import_lead_error
                ]);
            }
        }else {
            $import_click_error = "";
            if(is_array($import_click_response['message'])){
                foreach($import_click_response['message'] as $key => $error){
                    $import_click_error .= $key.": ".$error;
                }

            }else {
                $import_click_error = $import_click_response['message'];
            }

            return response()->json([
                'status' => 400,
                'error' => $import_click_error
            ]);
        }
    }

    public function upsell_checkout(Request $request){
        $bought_products = Session::get('bought_products');
        $upsell_product = UpsellProduct::where('upsell_crm_id', $request->upsell_crm_id)->first();
        $name = $upsell_product['title'];

        if(!empty($upsell_product['discounted_price']) AND !empty($upsell_product['price'])){
            $price = $upsell_product['discounted_price'];
        }else {
            $price = $upsell_product['price'];
        }
        $quantity = 1;

        $bought_upsell = array(
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        );

        array_push($bought_products, $bought_upsell);
        Session::put('bought_products', $bought_products);

        $import_upsale_response = import_upsale($request->upsell_crm_id);
        $import_upsale_response = json_decode($import_upsale_response, true);

        if($import_upsale_response['result'] == 'SUCCESS'){
            $upsell_count =  Session::get('upsell_count');
            $upsell_detail = Session::get('upsell_detail');
    
            if($upsell_count > 0){
                Session::put('upsell_count', $upsell_count-1);
                $redirect_url = url('/upsell/'.$upsell_detail[$upsell_count-1]->slug);
    
            }else {
                $bought_products = Session::get('bought_products');
                $redirect_url = url('/thank-you');
            }

            return response()->json([
                'status' => 200,
                'data' => $upsell_detail,
                'redirect_url' => $redirect_url
            ]);

        }else {
            return response()->json([
                'status' => 400,
                'error' => $import_upsale_response['message']
            ]);
        }
    }

    public function no_thanks(Request $request){
        $upsell_count =  Session::get('upsell_count');
        $upsell_detail = Session::get('upsell_detail');

        if($upsell_count > 0){
            Session::put('upsell_count', $upsell_count-1);
            $redirect_url = url('/upsell/'.$upsell_detail[$upsell_count-1]->slug);

        }else {
            $redirect_url = url('/thank-you');
        }

        return response()->json([
            'status' => 200,
            'data' => $upsell_detail,
            'redirect_url' => $redirect_url
        ]);
    }
}
