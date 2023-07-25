<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class CheckoutController extends Controller
{
    public function process_cart(Request $request){
        $data = [];

        if($request->session()->has('cart_offers')){
            $cart_offers = json_decode($request->session()->get('cart_offers'), true);
            if(!empty(($cart_offers[$request->offer_id]))){
                unset($cart_offers[$request->offer_id]);
                $data['btn_text'] = 'Shop Now';
            }else {
                $cart_offers[$request->offer_id] = 1;
                $data['btn_text'] = 'Remove from Cart';
            }
            $data['cart_items'] = count($cart_offers);
            $data['total'] = calculate_total($cart_offers);
            $request->session()->put(['total' => $data['total'], 'cart_items' => count($cart_offers), 'cart_offers' => json_encode($cart_offers)]);
        }else {
            $cart_offers = [];
            $cart_offers[$request->offer_id] = 1;
            $data['cart_items'] = count($cart_offers);
            $data['btn_text'] = 'Remove from Cart';
            $data['total'] = calculate_total($cart_offers);
            $request->session()->put(['total' => $data['total'], 'cart_items' => count($cart_offers), 'cart_offers' => json_encode($cart_offers)]);
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function remove_offer(Request $request){
        $data = [];
        if($request->session()->has('cart_offers')){
            $cart_offers = json_decode($request->session()->get('cart_offers'), true);
            if(!empty(($cart_offers[$request->offer_id]))){
                unset($cart_offers[$request->offer_id]);
            }
            $data['total'] = calculate_total($cart_offers);
            $data['cart_items'] = count($cart_offers);
            $request->session()->put(['total' => $data['total'], 'cart_items' => count($cart_offers), 'cart_offers' => json_encode($cart_offers)]);
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function plus_offer(Request $request){
        $data = [];
        if($request->session()->has('cart_offers')){
            $cart_offers = json_decode($request->session()->get('cart_offers'), true);
            if(!empty(($cart_offers[$request->offer_id]))){
                $offer_info = Offer::where('id', $request->offer_id)->first();
                $subtotal = ($offer_info->price)*($request->quantity);
                $data['subtotal'] = "$".$subtotal;
                $cart_offers[$request->offer_id] = $request->quantity;
            }
            $data['total'] = calculate_total($cart_offers);
            $request->session()->put(['total' => $data['total'], 'cart_offers' => json_encode($cart_offers)]);
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function minus_offer(Request $request){
        $data = [];
        if($request->session()->has('cart_offers')){
            $cart_offers = json_decode($request->session()->get('cart_offers'), true);
            if(!empty(($cart_offers[$request->offer_id]))){
                $cart_offers[$request->offer_id] = $cart_offers[$request->offer_id]-1;
            }
            $data['total'] = calculate_total($cart_offers);
            $request->session()->put(['total' => $data['total'], 'cart_offers' => json_encode($cart_offers)]);
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function empty_cart(Request $request){
        $data = [];

        $request->session()->forget(["cart_offers", "cart_items", "total"]);
        $data['cart_items'] = 0;
        $data['total'] = '0.00';

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function checkout(Request $request){
        $request->session()->forget(["cart_offers", "cart_items", "total"]);
        return response()->json([
            'status' => 200,
            'data' => route('thank-you')
        ]);
    }
}
