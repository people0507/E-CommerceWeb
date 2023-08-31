<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shoppage()
    {
        $products = Product::paginate(9);
        $pricecounts = [
            'all' => Product::count(),
            '0-10000000' => Product::whereBetween('product_price', [0, 10000000])->count(),
            '10000000-15000000' => Product::whereBetween('product_price', [10000000, 15000000])->count(),
            '15000000-25000000' => Product::whereBetween('product_price', [15000000, 25000000])->count(),
            '25000000-40000000' => Product::whereBetween('product_price', [25000000, 40000000])->count(),
            '40000000-above' => Product::where('product_price', '>', 40000000)->count(),
        ];
        return view('clients.shop',compact('products','pricecounts'));
    }


    public function shopsearch(Request $request){
        $query = $request->input('query');
        
        $products = Product::where('id', $query)
                     ->orWhere('product_name', 'LIKE', "%$query%")
                     ->paginate(9);

        $pricecounts = [
            'all' => Product::count(),
            '0-10000000' => Product::whereBetween('product_price', [0, 10000000])->count(),
            '10000000-15000000' => Product::whereBetween('product_price', [10000000, 15000000])->count(),
            '15000000-25000000' => Product::whereBetween('product_price', [15000000, 25000000])->count(),
            '25000000-40000000' => Product::whereBetween('product_price', [25000000, 40000000])->count(),
            '40000000-above' => Product::where('product_price', '>', 40000000)->count(),
        ];                     
        return view('clients.shop',compact('products','pricecounts'));
    }

    public function searchbydecrease()
    {
        $pricecounts = [
            'all' => Product::count(),
            '0-10000000' => Product::whereBetween('product_price', [0, 10000000])->count(),
            '10000000-15000000' => Product::whereBetween('product_price', [10000000, 15000000])->count(),
            '15000000-25000000' => Product::whereBetween('product_price', [15000000, 25000000])->count(),
            '25000000-40000000' => Product::whereBetween('product_price', [25000000, 40000000])->count(),
            '40000000-above' => Product::where('product_price', '>', 40000000)->count(),
        ];
        $products = Product::orderBy('product_price', 'desc')->paginate(9); 
        return view('clients.shop', compact('products','pricecounts'));
    }

    public function searchbyincrease()
    {
        $pricecounts = [
            'all' => Product::count(),
            '0-10000000' => Product::whereBetween('product_price', [0, 10000000])->count(),
            '10000000-15000000' => Product::whereBetween('product_price', [10000000, 15000000])->count(),
            '15000000-25000000' => Product::whereBetween('product_price', [15000000, 25000000])->count(),
            '25000000-40000000' => Product::whereBetween('product_price', [25000000, 40000000])->count(),
            '40000000-above' => Product::where('product_price', '>', 40000000)->count(),
        ];
        $products = Product::orderBy('product_price', 'asc')->paginate(9); 
        return view('clients.shop', compact('products','pricecounts'));
    }



 
    public function searchbyprice(Request $request)
    {
 
        $priceRanges = $request->input('price_ranges', []);
        $categories = $request->input('categories', []);


        $query = Product::query();

        foreach ($priceRanges as $range) {
            switch ($range) {
                case 'all':
                    break;
                case '0-10000000':
                    $query->orWhereBetween('product_price', [0, 10000000]);
                    break;
                case '10000000-15000000':
                    $query->orWhereBetween('product_price', [10000000, 15000000]);
                    break;
                case '15000000-25000000':
                    $query->orWhereBetween('product_price', [15000000, 25000000]);
                    break;
                case '25000000-40000000':
                        $query->orWhereBetween('product_price', [25000000, 40000000]);
                        break;    
                case '40000000-above':
                    $query->orWhere('product_price', '>', 40000000);
                    break;
            }
        }

        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        $pricecounts = [
            'all' => Product::count(),
            '0-10000000' => Product::whereBetween('product_price', [0, 10000000])->count(),
            '10000000-15000000' => Product::whereBetween('product_price', [10000000, 15000000])->count(),
            '15000000-25000000' => Product::whereBetween('product_price', [15000000, 25000000])->count(),
            '25000000-40000000' => Product::whereBetween('product_price', [25000000, 40000000])->count(),
            '40000000-above' => Product::where('product_price', '>', 40000000)->count(),
        ];

        $products = $query->paginate(9);


        return view('clients.shop', compact('products','pricecounts'));
    }
}
