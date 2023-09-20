<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category','producer')->paginate(4);
        return view('admins.products.table',compact('products'));
    }



     public function search(Request $request){
        $query = $request->input('query');
        
        $products = Product::where('id', $query)
                     ->orWhere('product_name', 'LIKE', "%$query%")
                     ->orWhere('category_id', 'LIKE', "%$query%")
                     ->orWhere('producer_id', 'LIKE', "%$query%")
                     ->get();
        return view('admins.products.table',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $producers = Producer::all();
        return view('admins.products.create',compact('categories','producers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'         =>  'required',
            'product_price'          =>  'required|numeric|min:0',
            'product_description'      =>  'required',
            'product_quantity'  => 'required|integer|min:0',
            'product_image'  => 'required',
            'category_id' => 'required',
            'producer_id' => 'required',
        ]);

        
        try {
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_quantity = $request->product_quantity;

            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $product->product_image = $imageName;
            }

            $product->category_id= $request->category_id;
            $product->producer_id= $request->producer_id;
            $product->save();
            
            return redirect()->route('product.index')->with('success', 'Add product successfully!');
        } catch (\Exception $e) {
            return redirect()->route('product.create')->with('failed', 'Add product failed!');
        }
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $categories = Category::all();
        $producers = Producer::all();
        $products = Product::findOrFail($id);
        return view('admins.products.edit',compact('products','producers','categories'));
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
            'product_name'         =>  'required',
            'product_price'          =>  'required|numeric|min:0',
            'product_description'      =>  'required',
            'product_quantity'  => 'required|integer|min:0',
            'category_id' => 'required',
            'producer_id' => 'required',
        ]);

        try {
            $product = Product::findOrFail($id);
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_quantity = $request->product_quantity;

            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $product->product_image = $imageName;
            }

            $product->category_id= $request->category_id;
            $product->producer_id= $request->producer_id;
            $product->save();
            
            return redirect()->route('product.index')->with('success', 'Update product successfully!');
        } catch (\Exception $e) {
            return redirect()->route('product.edit')->with('failed', 'Update product failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

    return redirect()->route('product.index')->with('success','Delete product successfully');
    }
}
