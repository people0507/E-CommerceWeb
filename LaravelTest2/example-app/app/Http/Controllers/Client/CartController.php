<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = session()->get('cart');
        return view('clients.cart',compact('carts'));
    }


    public function updatequantity(Request $request)
    {
        if($request->product_id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartpage = view('clients.cart',compact('carts'))->render();
            return response()->json(['cartpage' => $cartpage]);
        }
    }

    public function deleteproductcart(Request $request)
    {
        if($request->product_id){
            $carts = session()->get('cart');
            unset($carts[$request->product_id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartpage = view('clients.cart',compact('carts'))->render();
            return response()->json(['cartpage' => $cartpage]);
        }
    }

}
