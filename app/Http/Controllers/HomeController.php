<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Offer;

class HomeController extends Controller
{
    public function index(Request $req){
        $offers = Offer::where(['is_deleted' => 0, 'is_approved' => 1])->get();
        return view('index', compact('offers'));
    }

    public function terms(Request $req){
        return view('terms');
    }

    public function privacy(Request $req){
        return view('privacy');
    }

    public function ingredients(Request $req){
        return view('ingredients');
    }

    public function contact_us(Request $req){
        return view('contact-us');
    }

    public function thank_you(Request $req){
        return view('thank-you');
    }

    public function cart(Request $req){
        $data = [];

        if($req->session()->has('cart_offers')){
            $cart_offers = json_decode($req->session()->get('cart_offers'), true);
            
            if(!empty($cart_offers)){
                $offers_data = [];
                foreach($cart_offers as $key => $value){
                    
                    if(Offer::where('id', $key)->exists()){
                        $offer_info = Offer::where('id', $key)->first();
                        $offer_info->quantity = $value;
                        $offers_data[] = $offer_info;
                    }
                }
                $data['offers_data'] = $offers_data;
            }
        }
        return view('cart')->with($data);
    }
}
