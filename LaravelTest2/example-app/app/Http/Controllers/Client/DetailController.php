<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detailpage()
    {
        return view('clients.detail');
    }

    public function addtocartdetail(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);

    
        $carts = session()->get('cart', []);
        if (isset($carts[$productId])) {
            $carts[$productId]['quantity'] = $carts[$productId]['quantity'] + $quantity;
        } else {
            $carts[$productId] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'quantity' => $quantity
            ];
        }
    
        session()->put('cart', $carts);
        $cartItemCount = count(session()->get('cart'));
    
        return response()->json(['message' => 'Product added to cart successfully','cartItemCount' => $cartItemCount,]);
    }
}
