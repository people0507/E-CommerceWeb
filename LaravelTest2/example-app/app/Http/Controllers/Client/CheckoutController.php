<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index()
    {
        $carts = session()->get('cart');
        return view('clients.checkout',compact('carts'));
    }


    public function addorder(Request $request)
    {
        $user_email = Auth::user()->user_email;
        $user_name = Auth::user()->detail->userdetail_fullname;
        $user_phonenumber = Auth::user()->detail->userdetail_phonenumber;
        $user_address = Auth::user()->detail->userdetail_address;
        $carts = session()->get('cart');
        $total = 0;
        foreach ($carts as $cartId => $cart) {
            $total = $total + $cart['quantity'] * $cart['price'];
        }
        try {
            $orders = new Order();
            $orders->order_name = $request->order_name;
            $orders->order_email = $request->order_email;
            $orders->order_address = $request->order_address;
            $orders->order_phonenumber = $request->order_phonenumber;
            $orders->order_status = $request->order_status;
            $orders->order_totalprice = $total;
            $orders->order_method = $request->payment;
            $orders->order_note = $request->order_note;
            $orders->delivery_time = null;
            $orders->user_id = Auth::user()->id;
            $orders->save();
    
            $order = Order::find($orders->id);
            foreach ($carts as $cartId => $cart) {
                $order->products()->attach($cartId, ['quantity' => $cart['quantity'], 'price' => $cart['price']]);
                $product = Product::find($cartId);
                $product->product_quantity = $product->product_quantity - $cart['quantity'];
                $product->save();
                }
                Mail::send('clients.authentications.orderemail',compact('carts','total','user_name','user_phonenumber','user_address'),function($email) use($user_email){
                    $email->subject('Order Details');
                    $email->to($user_email);
                });

                Session::forget('cart');    
            return redirect()->route('client.homepage')->with('success', 'Order successfully!');
        } catch (\Exception $e) {
            return redirect()->route('client.checkoutpage');
            } 

    }


}
