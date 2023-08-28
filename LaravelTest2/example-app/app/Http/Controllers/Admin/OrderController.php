<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(5);
        return view('admins.orders.table',compact('orders'));
    }



     public function search(Request $request){
        $query = $request->input('query');
        
        $orders = Order::where('id', $query)
                     ->orWhere('order_name', 'LIKE', "%$query%")
                     ->orWhere('order_email', 'LIKE', "%$query%")
                     ->paginate(5);
        return view('admins.orders.table',compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $details = $order->products;
        return view('admins.orders.detail',compact('details', 'order'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $orders = Order::find($id);
        return view('admins.orders.edit',compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_status'         =>  'required',
        ]);


        try {
            $order = Order::find($id);
            $order->order_status = $request->order_status;
            $order->delivery_time = $request->delivery_time;
            $order->save();
            return redirect()->route('order.index')->with('success', 'Update user successfully!');
        } catch (\Exception $e) {
            return redirect()->route('order.edit')->with('failed', 'Update user failed!');
            }
    }

}
