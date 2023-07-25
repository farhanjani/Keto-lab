<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;
use App\Models\Product;

class Offers extends Controller
{

    public function index(){
        // $campaigns = json_decode(import_all_campaigns(), true);

        // if($campaigns['result'] == 'ERROR'){
        //     echo "Konnektive Error: ".$campaigns['message'];
        //     exit;
        // }
        // $campaigns = $campaigns["message"]["data"];
        // $campaigns_data = array();
        // foreach($campaigns as $campaign){
        //     $campaigns_data[$campaign['campaignId']] = $campaign['campaignName'];
        // }
        // $data = compact('campaigns_data');
        // return view('admin.offers')->with($data);
        return view('admin.offers');
    }

    // public function import_campaign_offers($campaign_id){
    //     $campaign_products = json_decode(import_checkoutchamp_products($campaign_id), true);
    //     if($campaign_products['result'] == 'ERROR'){
    //         echo "Checkoutchamp Error: ".$campaign_products['message'];
    //         exit;
    //     }
    //     $campaign_products = $campaign_products["message"]["data"];
    //     $campaign_products = $campaign_products[$campaign_id]['products'];

    //     $campaign_offers_data = array();
    //     foreach($campaign_products as $campaign_product){
    //         if($campaign_product['productType'] == 'OFFER'){
    //             $campaign_offers_data[$campaign_product['campaignProductId']] = $campaign_product['productName']."^".$campaign_id;
    //         }
    //     }

    //     $existing_campaign_offers = Offer::select('crm_id')->where('is_deleted', 0)->get();

    //     return response()->json([
    //         'status' => 200,
    //         'campaign_offers_data' => $campaign_offers_data,
    //         'existing_campaign_offers' => $existing_campaign_offers
    //     ]);
    // }

    // public function import_selected_campaign_offers(Request $req){

    //     if(isset($req->campaign_offer_info)){
    //         $admin_id = auth()->user()->id;

    //         foreach($req->campaign_offer_info as $campaign_offer){
    //             $exploded_offer = explode('^', $campaign_offer);

    //             $offer_crm_id = $exploded_offer[0];
    //             $campaign_id = $exploded_offer[2];

    //             $offer_details = json_decode(query_product($offer_crm_id), true);
    //             if($offer_details['result'] == 'ERROR'){
    //                 echo "Konnektive Error: ".$offer_details['message'];
    //                 exit;
    //             }

    //             $product_detail = $offer_details['message']['data'][0];

    //             $shipping_cost = $product_detail['shippingCost'];
    //             $description = $product_detail['productDescription'];
    //             $title = $product_detail['productName'];
    //             $slug = str_replace(" ", "-", strtolower($title));
    //             $base_price = $product_detail['productCost'];

    //             if(isset($product_detail['compareAtPrice']) && !empty($product_detail['compareAtPrice'])){
    //                 $compare_at_price = $product_detail['compareAtPrice'];
    //             }else {
    //                 $compare_at_price = $product_detail['price'];
    //             }

    //             if(Offer::where([
    //                 'crm_id' => $offer_crm_id,
    //                 'is_deleted' => 0
    //                 ])->exists()){
    //                 $offer_info = Offer::where([
    //                     'crm_id' => $offer_crm_id,
    //                     'is_deleted' => 0
    //                     ])->first();

    //                 $offer_info->title = $title;
    //                 $offer_info->price = $compare_at_price;
    //                 $offer_info->campaign_id = $campaign_id;
    //                 $offer_info->description = $description;
    //                 if(!empty($shipping_cost)){
    //                     $offer_info->shipping_cost = $shipping_cost;
    //                 }

    //                 $offer_info->is_approved = 1;
    //                 $offer_info->admin_id = $admin_id;
    //                 $offer_info->update();
    //             }else {
    //                 $new_offer = new Offer;
    //                 $new_offer->crm_id = $offer_crm_id;
    //                 $new_offer->title = $title;
    //                 $new_offer->campaign_id = $campaign_id;
    //                 $new_offer->price = $compare_at_price;
    //                 $new_offer->description = $description;
    //                 if(!empty($shipping_cost)){
    //                     $new_offer->shipping_cost = $shipping_cost;
    //                 }

    //                 $new_offer->is_approved = 1;
    //                 $new_offer->admin_id = $admin_id;
    //                 $new_offer->save();
    //             }
    //         }

    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Selected Campaign Offers imported successfully.'
    //         ]);
    //     }
    // }

    // public function get_campaign_offers($campaign_id){
    //     $campaign_products = json_decode(import_checkoutchamp_products($campaign_id), true);
    //     if($campaign_products['result'] == 'ERROR'){
    //         echo "Checkoutchamp Error: ".$campaign_products['message'];
    //         exit;
    //     }
    //     $campaign_products = $campaign_products["message"]["data"];
    //     $campaign_products = $campaign_products[$campaign_id]['products'];


    //     $campaign_offers_data = '<label class="col-form-label">Campaign Offers</label>
    //     <select class="form-control" name="campaign_offer_info">
    //     <option value="" selected>Select Campaign Offer</option>';
    //     foreach($campaign_products as $campaign_product){
    //         if($campaign_product['productType'] == 'OFFER'){
    //             $campaign_offers_data.= '<option value="'.$campaign_product['campaignProductId'].'">'.$campaign_product['productName']." - ".$campaign_product['campaignProductId'].'</option>';
    //         }
    //     }
    //     $campaign_offers_data.= '</select><div class="crm_id_error all_errors text-danger"></div>';

    //     return response()->json([
    //         'status' => 200,
    //         'data'=> $campaign_offers_data,
    //     ]);

    // }

    public function add_offer(Request $req){
        $admin_id = auth()->user()->id;
        $validator = Validator::make($req->all(), [
            // 'title' => 'required|unique:offers,title',
            'title' => 'required',
            'price' => 'required|numeric|min:1',
            // 'campaign_offer_info' => 'required',
            'discount' => 'nullable|sometimes|numeric',
            'is_featured' => 'nullable|sometimes|accepted',
            'description' => 'nullable|sometimes|max:1000',
            'image' => 'nullable|sometimes|mimes:jpg,jpeg,png|max:1024',
        ],[
            // 'campaign_offer_info.required' => 'Campaign offers is a required field.'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {

            $offer = new Offer;
            $offer->title = $req->input('title');
            // $offer->campaign_id = $req->input('campaign_id');
            // $offer->crm_id = $req->input('campaign_offer_info');
            $offer->price = $req->input('price');

            if($req->filled('discount')){
                $offer->discount = $req->input('discount');
            }

            if($req->filled('is_featured')){
                $offer->is_featured = 1;
            }

            if($req->filled('description')){
                $offer->description = $req->input('description');
            }

            $offer->is_approved = 1;
            $offer->admin_id = $admin_id;

            if($req->hasFile('image')){
                $image = $req->file('image');
                $image_title = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). '_' .time(). '.' .$image->getClientOriginalExtension();
                $image->move(public_path('assets/uploads'), $image_title);
            }
            $offer->image = $image_title;

            $offer->save();

            return response()->json([
                'status' => 200,
                'message' => 'Offer data saved successfully.'
            ]);
        }
    }

    public function update_offer(Request $req){
        $offer_id = $req->offer_id;

        $validator = Validator::make($req->all(), [
            // 'title' => 'required|unique:offers,title,"'.$offer_id.'",id',
            'title' => 'required',
            'price' => 'required|numeric|min:1',
            // 'campaign_offer_info' => 'required',
            'discount' => 'sometimes|nullable|numeric',
            'is_featured' => 'sometimes|accepted',
            'description' => 'sometimes|max:1000',
            'image' => 'nullable|sometimes|mimes:jpg,jpeg,png|max:1024',
        ],[
            // 'campaign_offer_info.required' => 'Campaign offers is a required field.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {

            $offer = Offer::where('id', $offer_id)->first();
            $offer->title = $req->input('title');
            $offer->price = $req->input('price');
            // $offer->campaign_id = $req->input('campaign_id');
            // $offer->crm_id = $req->input('campaign_offer_info');

            if($req->filled('discount')){
                $offer->discount = $req->input('discount');
            }

            if($req->input('is_featured')){
                $offer->is_featured = 1;
            }else {
                $offer->is_featured = 0;
            }

            if($req->filled('description')){
                $offer->description = $req->input('description');
            }

            if($req->hasFile('image')){
//                if(!empty($offer->image)){
//                    unlink(asset('assets/uploads/'.$offer->image));
//                }

                $image = $req->file('image');
                $image_title = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). '_' .time(). '.' .$image->getClientOriginalExtension();
                $image->move(public_path('assets/uploads'), $image_title);
            }
            $offer->image = $image_title;

            $offer->update();

            return response()->json([
                'status' => 200,
                'message' => 'Offer updated successfully.'
            ]);
        }
    }

    public function update($id){

        if(Offer::where('id', $id)->exists()){
            $offer_data = Offer::where('offers.id', $id)->first();
            if(!empty($offer_data->image)){
                $url = asset('assets/uploads/'.$offer_data->image);
                $offer_data->image_data = '<img height="100px" width="100px" src="'.$url.'" />';
            }
            // $campaign_id = $offer_data->campaign_id;
            // $offer_crm_id = $offer_data->crm_id;

            // $campaign_products = json_decode(import_checkoutchamp_products($campaign_id), true);
            // if($campaign_products['result'] == 'ERROR'){
            //     echo "Checkoutchamp Error: ".$campaign_products['message'];
            //     exit;
            // }
            // $campaign_products = $campaign_products["message"]["data"];
            // $campaign_products = $campaign_products[$campaign_id]['products'];


            // $campaign_offers_data = '<label class="col-form-label">Campaign Offers</label>
            // <select class="form-control" name="campaign_offer_info">
            // <option value="" selected>Select Campaign Offer</option>';
            // foreach($campaign_products as $campaign_product){
            //     if($campaign_product['productType'] == 'OFFER'){
            //         $campaign_offers_data.= '<option value="'.$campaign_product['campaignProductId'].'">'.$campaign_product['productName']." - ".$campaign_product['campaignProductId'].'</option>';
            //     }
            // }
            // $campaign_offers_data.= '</select><div class="crm_id_error all_errors text-danger"></div>';
            // $offer_data->campaign_offers_data = $campaign_offers_data;


            return response()->json([
                'status' => 200,
                'message' => 'Offer found successfully.',
                'data' => $offer_data
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Offer not found against this ID.'
            ]);
        }
    }

    public function get_datatable(Request $req){
        $where_array = array(
            'is_deleted' => 0
        );

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

        $total_records = Offer::where($where_array)->count();

        $total_filtered = Offer::where($where_array)->select('offers.*');

        if(!empty($search_value)){
            $total_filtered = $total_filtered->where('title', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('crm_id', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('campaign_id', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('price', 'like', '%' .$search_value. '%');
            $total_filtered = $total_filtered->orWhere('discount', 'like', '%' .$search_value. '%');
        }
        $total_filtered_records = $total_filtered->count();

        $offers = Offer::where($where_array)->select('offers.*')->orderBy($column_data, $column_order_direction)->offset($offset)->limit($limit);
        if(!empty($search_value)){
            $offers = $offers->where('title', 'like', '%' .$search_value. '%');
            $offers = $offers->orWhere('crm_id', 'like', '%' .$search_value. '%');
            $offers = $offers->orWhere('campaign_id', 'like', '%' .$search_value. '%');
            $offers = $offers->orWhere('price', 'like', '%' .$search_value. '%');
            $offers = $offers->orWhere('discount', 'like', '%' .$search_value. '%');
        }
        $offers_data = $offers->get();

        foreach($offers_data as $key => $val){
            $table_data['title'] = (!empty($val['title'])) ? $val['title'] : 'N/A';
            $table_data['crm_id'] = (!empty($val['crm_id'])) ? $val['crm_id'] : 'N/A';
            $table_data['campaign_id'] = (!empty($val['campaign_id'])) ? $val['campaign_id'] : 'N/A';
            $table_data['price'] = (!empty($val['price'])) ? '$'.$val['price'] : 'N/A';
            $table_data['discount'] = (!empty($val['discount'])) ? $val['discount'].'%' : 'N/A';
            $table_data['is_featured'] = ($val['is_featured'] == 1) ? 'Yes' : 'No';


            $action = '<button title="Edit" rel="'.$val['id'].'" class="btn btn-success edit_offer_btn" data-bs-toggle="modal" data-bs-target="#edit_offer"><i class="fas fa-edit"></i></button><button title="Delete" rel="'.$val['id'].'" class="btn btn-danger ms-1 delete_offer_btn"><i class="fas fa-trash"></i></button>';

            if($val['is_approved'] == 0){
                $action = $action.'<button rel="'.$val['id'].'" class="btn ms-1 btn-success approve_offer_btn" title="Approve"><i class="fas fa-thumbs-up"></i></button>';
            }else {
                $action = $action.'<button rel="'.$val['id'].'" class="btn ms-1 btn-danger reject_offer_btn" title="Reject"><i class="fas fa-thumbs-down"></i></button>';
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

    public function delete_offer($id){

        if(Offer::where('id', $id)->exists()){
            $offer_info = Offer::where('id', $id)->first();
            $offer_info->is_deleted = 1;
            $offer_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Offer deleted successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Offer not found against this ID.'
            ]);
        }
    }

    public function approve_offer($id){

        if(Offer::where('id', $id)->exists()){
            $offer_info = Offer::where('id', $id)->first();
            $offer_info->is_approved = 1;
            $offer_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Offer approved successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Offer not found against this ID.'
            ]);
        }
    }

    public function reject_offer($id){

        if(Offer::where('id', $id)->exists()){
            $offer_info = Offer::where('id', $id)->first();
            $offer_info->is_approved = 0;
            $offer_info->update();

            return response()->json([
                'status' => 200,
                'message' => 'Offer rejected successfully.'
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Offer not found against this ID.'
            ]);
        }
    }

}
