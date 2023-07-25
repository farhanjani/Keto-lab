<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UpsellProduct;
use Illuminate\Support\Facades\Storage;
use App\Models\Campaign;
use Intervention\Image\Facades\Image;

class UpsellProducts extends Controller
{

    public function import_selected_upsell_products(Request $req){

        if(isset($req->upsell_product_info)){
            $admin_id = auth()->user()->id;

            foreach($req->upsell_product_info as $upsell_product){
                $exploded_campaign = explode('^', $upsell_product);

                $upsell_crm_id = $exploded_campaign[0];
                $campaign_id = $exploded_campaign[2];
                
                $products_details = json_decode(query_product($upsell_crm_id), true);

                if($products_details['result'] == 'ERROR'){
                    echo "Konnektive Error: ".$products_details['message'];
                    exit;
                }
                
                $product_detail = $products_details['message']['data'][0];
                $img_url = $product_detail['productImagePath'];
                $description = $product_detail['productDescription'];
                $title = $product_detail['productName'];
                $slug = str_replace(" ", "-", strtolower($title));
                $base_price = $product_detail['productCost'];

                if(isset($product_detail['compareAtPrice']) && !empty($product_detail['compareAtPrice'])){
                    $compare_at_price = $product_detail['compareAtPrice'];
                }else {
                    $compare_at_price = $product_detail['price'];
                }

                if(UpsellProduct::where([
                    'upsell_crm_id' => $upsell_crm_id,
                    'is_deleted' => 0
                    ])->exists()){
                    $upsell_product_info = UpsellProduct::where([
                        'upsell_crm_id' => $upsell_crm_id,
                        'is_deleted' => 0
                        ])->first();
                    if(!empty($upsell_product_info->image)){
                        deleteImage('upsell', $upsell_product_info->image);
                        if(!empty($img_url)){
                            $upsell_product_info->image = saveImageUsingURL($img_url,'upsell', true, 300, 300);
                        }
                    }else {
                        if(!empty($img_url)){
                            $upsell_product_info->image = saveImageUsingURL($img_url,'upsell', true, 300, 300);
                        }
                    }

                    $upsell_product_info->title = $title;
                    $upsell_product_info->slug = $slug;
                    $upsell_product_info->campaign_id = $campaign_id;
                    $upsell_product_info->discounted_price = $base_price;
                    $upsell_product_info->price = $compare_at_price;
                    $upsell_product_info->description = $description;
                    $upsell_product_info->is_approved = 1;
                    $upsell_product_info->admin_id = $admin_id;
                    $upsell_product_info->update();
                }else {
                    $upsell_product = new UpsellProduct;
                    $upsell_product->upsell_crm_id = $upsell_crm_id;
                    $upsell_product->title = $title;
                    $upsell_product->campaign_id = $campaign_id;
                    $upsell_product->price = $compare_at_price;
                    $upsell_product->discounted_price = $base_price;
                    $upsell_product->slug = $slug;
                    $upsell_product->description = $description;
                    $upsell_product->is_approved = 1;
                    $upsell_product->admin_id = $admin_id;

                    if(!empty($img_url)){
                        $upsell_product->image = saveImageUsingURL($img_url,'upsell', true, 300, 300);
                    }
                    $upsell_product->save();
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Selected Upsell Product imported successfully.'
            ]);
        }
    }

    public function import_upsell_products($campaign_id){
        $upsell_products = json_decode(import_checkoutchamp_products($campaign_id), true);
        if($upsell_products['result'] == 'ERROR'){
            echo "Checkoutchamp Error: ".$upsell_products['message'];
            exit;
        }
        $upsell_products = $upsell_products["message"]["data"];
        $upsell_products = $upsell_products[$campaign_id]['products'];

        $upsell_products_data = array();
        foreach($upsell_products as $upsell_product){
            if($upsell_product['productType'] == 'UPSALE'){
                $upsell_products_data[$upsell_product['campaignProductId']] = $upsell_product['productName']."^".$campaign_id;
            }
        }
        $existing_upsell_products = UpsellProduct::select('upsell_crm_id')->where('is_deleted', 0)->get();

        return response()->json([
            'status' => 200,
            'upsell_products_data' => $upsell_products_data,
            'existing_upsell_products' => $existing_upsell_products
        ]);
    }

    public function index(){
        $campaigns = json_decode(import_all_campaigns(), true);
        if($campaigns['result'] == 'ERROR'){
            echo "Konnektive Error: ".$campaigns['message'];
            exit;
        }
        $campaigns = $campaigns["message"]["data"];
        $campaigns_data = array();
        foreach($campaigns as $campaign){
            $campaigns_data[$campaign['campaignId']] = $campaign['campaignName'];
        }

        $data = compact('campaigns_data');
        return view('admin.upsell_products')->with($data);

    }

    public function add_upsell_product(Request $req){
        $validator = Validator::make($req->all(), [
            'title' => 'required|max:256',
            'upsell_crm_id' => 'required|numeric|digits_between:1,11|unique:upsell_products,upsell_crm_id'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {
            $upsell_product = new UpsellProduct;
            $upsell_product->title = $req->input('title');
            $upsell_product->upsell_crm_id = $req->input('upsell_crm_id');
            $upsell_product->save();

            return response()->json([
                'status' => 200,
                'message' => 'UpSell Product data saved successfully.'
            ]);
        }
    }

    // Load upsell_product datatable
    public function get_datatable(Request $req){
        $table_data = [];
        $data = [];

        $offset = $req->get('start');
        $limit = $req->get('length');
        $draw = $req->get('draw');

        $search = $req->get('search');
        $search_value = $search['value'];

        $order = $req->get('order');
        $column_order_index = $order[0]['column'];
        $column_order_direction = $order[0]['dir'];
        
        $columns = $req->get('columns');
        $column_data = $columns[$column_order_index]['data'];

        $total_records = UpsellProduct::where('is_deleted', 0)->count();

        $total_filtered = UpsellProduct::where('is_deleted', 0)->select('upsell_products.*');
        if(!empty($search_value)){
            $total_filtered = $total_filtered->where('title', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('upsell_crm_id', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('campaign_id', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('price', 'like', '%' .$search_value. '%');
        }
        $total_filtered_records = $total_filtered->count();

        $upsell_products = UpsellProduct::where('is_deleted', 0)->select('upsell_products.*')->orderBy($column_data, $column_order_direction)->offset($offset)->limit($limit);
        if(!empty($search_value)){
            $upsell_products = $upsell_products->where('title', 'like', '%' .$search_value. '%');
            $upsell_products = $upsell_products->orWhere('upsell_crm_id', 'like', '%' .$search_value. '%');
            $upsell_products = $upsell_products->orWhere('campaign_id', 'like', '%' .$search_value. '%');
            $upsell_products = $upsell_products->orWhere('price', 'like', '%' .$search_value. '%');
        }
        $upsell_products_data = $upsell_products->get();

        foreach($upsell_products_data as $key => $val){
            $table_data['title'] = (!empty($val['title'])) ? $val['title'] : 'N/A';
            $table_data['upsell_crm_id'] = (!empty($val['upsell_crm_id'])) ? $val['upsell_crm_id'] : 'N/A';
            $table_data['campaign_id'] = (!empty($val['campaign_id'])) ? $val['campaign_id'] : 'N/A';
            $table_data['price'] = (!empty($val['price'])) ? $val['price'] : 'N/A';

            $action = '<button title="Edit" rel="'.$val['id'].'" class="btn btn-success edit_upsell_product_btn" data-bs-toggle="modal" data-bs-target="#edit_upsell_product"><i class="fas fa-edit"></i></button><button title="Delete" rel="'.$val['id'].'" class="btn btn-danger ms-1 delete_upsell_product_btn"><i class="fas fa-trash"></i></button>';

            if($val['is_approved'] == 0){
                $action = $action.'<button rel="'.$val['id'].'" class="btn ms-1 btn-success approve_upsell_product_btn" title="Approve"><i class="fas fa-thumbs-up"></i></button>';

            }else {
                $action = $action.'<button rel="'.$val['id'].'" class="btn ms-1 btn-danger reject_upsell_product_btn" title="Reject"><i class="fas fa-thumbs-down"></i></button>';

            }   

            $table_data['action'] = $action;
            $data[] = $table_data;
        }

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $total_records,
            'recordsFiltered' => $total_filtered_records,
            'data' => $data
        ]);
    }

    // Delete upsell_product
    public function delete_upsell_product($id){

        if(UpsellProduct::where([
            'id' => $id,
            'is_deleted' => 0
            ])->exists()){
            $upsell_product_info = UpsellProduct::where([
                'id' => $id,
                'is_deleted' => 0
                ])->first();
            $upsell_product_info->is_deleted = 1;
            $upsell_product_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Upsell Product deleted successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Upsell Product not found against this ID.'
            ]);
        }
    }

    // Approve upsell_product
    public function approve_upsell_product($id){

        if(UpsellProduct::where([
            'id' => $id,
            'is_deleted' => 0
            ])->exists()){
            $upsell_product_info = UpsellProduct::where([
                'id' => $id,
                'is_deleted' => 0
                ])->first();
            $upsell_product_info->is_approved = 1;
            $upsell_product_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Upsell Product approved successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Upsell Product not found against this ID.'
            ]);
        }
    }

    // Reject upsell_product
    public function reject_upsell_product($id){

        if(UpsellProduct::where([
            'id' => $id,
            'is_deleted' => 0
            ])->exists()){
            $upsell_product_info = UpsellProduct::where([
                'id' => $id,
                'is_deleted' => 0
                ])->first();
            $upsell_product_info->is_approved = 0;
            $upsell_product_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Upsell Product rejected successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Upsell Product not found against this ID.'
            ]);
        }
    }

    // Get upsell_product
    public function update($id){

        if(UpsellProduct::where([
            'id' => $id,
            'is_deleted' => 0
            ])->exists()){
            $upsell_product_data = UpsellProduct::where([
                'id' => $id,
                'is_deleted' => 0
            ])->first();


            if(!empty($upsell_product_data->image)){
                $url = Storage::disk('s3')->url('upsell/'.$upsell_product_data->image);
               $upsell_product_data->image_data = '<img height="100px" width="100px" src="'.$url.'" />';
            }

            return response()->json([
                'status' => 200,
                'message' => 'Upsell Product found successfully.',
                'data' => $upsell_product_data
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Upsell Product not found against this ID.'
            ]);
        }
    }

    // Update Upsell Product
    public function update_upsell_product(Request $req){
        $upsell_product_id = $req->upsell_product_id;
        $validator = Validator::make($req->all(), [
            'upsell_crm_id' => 'required|digits_between:1,11|unique:upsell_products,upsell_crm_id,"'.$upsell_product_id.'",id',
            'title' => 'required|max:256',
            'upsell_product_id' => 'required|numeric',
            'price' => 'required',
            'campaign_id' => 'required',
        ],[
            'campaign_id.required' => 'Campaign field is required.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {
            $upsell_product = UpsellProduct::where([
                'id' => $upsell_product_id,
                'is_deleted' => 0
                ])->first();
            $upsell_product->title = $req->input('title');
            $upsell_product->upsell_crm_id = $req->input('upsell_crm_id');
            $upsell_product->price = $req->input('price');
            $upsell_product->campaign_id = $req->input('campaign_id');
            $upsell_product->discounted_price = $req->input('discounted_price');

            if($req->has('slug')){
                $upsell_product->slug = $req->input('slug');
            }else {
                $upsell_product->slug = str_replace(" ", "-", strtolower($req->input('title')));
            }
            if($req->has('description')){
                $upsell_product->description = $req->input('description');
            }
            if($req->hasFile('image')){
                if(!empty($upsell_product->image)){
                    deleteImage('upsell', $upsell_product->image);
                    $file = $req->file('image');
                    $upsell_product->image = saveImage($file,'upsell', true, 300, 300);
                }else {
                    $file = $req->file('image');
                    $upsell_product->image = saveImage($file,'upsell', true, 300, 300);
                }
            }
            $upsell_product->update();

            return response()->json([
                'status' => 200,
                'message' => 'Upsell Product updated successfully.'
            ]);
        }
    }
}
