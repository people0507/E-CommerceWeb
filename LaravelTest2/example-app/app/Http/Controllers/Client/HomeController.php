<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    public function homepage()
    {
        $products = Product::take(8)->get();
        $categories = Category::inRandomOrder()
        ->withCount('product')
        ->take(12)
        ->get(['id', 'category_name', 'products_count']);
        $random_products = Product::inRandomOrder()->limit(8)->get();
        return view('clients.index',compact('categories','products','random_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function homepage_show($id)
    {
        $product_show = Product::findOrFail($id);
        $random_products = Product::inRandomOrder()->limit(8)->get();
        return view('clients.detail',compact('product_show','random_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addtocart(Request $request){
        $productId = $request->input('product_id');
        $product = Product::find($productId);

    
        $carts = session()->get('cart', []);
        if (isset($carts[$productId])) {
            $carts[$productId]['quantity'] = $carts[$productId]['quantity'] + 1;
        } else {
            $carts[$productId] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'quantity' => 1
            ];
        }
    
        session()->put('cart', $carts);
        $cartItemCount = count(session()->get('cart'));
    
        return response()->json(['message' => 'Product added to cart successfully','cartItemCount' => $cartItemCount,]);
    }

   
    
   #Contact Page
    public function contactpage()
    {
        return view('clients.contact');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit()
    {
        return view('clients.authentications.detail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'userdetail_birth'          =>  'required',
            'userdetail_phonenumber'          =>  'required',
            'userdetail_address'          =>  'required',
            'userdetail_fullname'          =>  'required',
        ]);    

        try {
            $userdetail = UserDetail::findOrFail($id);

            if ($request->hasFile('userdetail_avatar')) {
                $image = $request->file('userdetail_avatar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/users/'), $imageName);
                $userdetail->userdetail_avatar= $imageName;
            }
            $userdetail->userdetail_birth = $request->userdetail_birth;
            $userdetail->userdetail_phonenumber = $request->userdetail_phonenumber;
            $userdetail->userdetail_address = $request->userdetail_address;
            $userdetail->userdetail_fullname = $request->userdetail_fullname;
            $userdetail->save();
            
            return redirect()->route('client.homepage');
        } catch (\Exception $e) {
            return redirect()->route('client.edit');
        }
    }

   
}
