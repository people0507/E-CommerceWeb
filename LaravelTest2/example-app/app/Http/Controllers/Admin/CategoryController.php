<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('admins.categories.table',compact('categories'));
    }


    public function search(Request $request){
        $query = $request->input('query');
        
        $categories = Category::where('id', $query)
                     ->orWhere('category_name', 'LIKE', "%$query%")
                     ->get();
        return view('admins.categories.table',compact('categories'));
    }


    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'          =>  'required',
            'category_image'          =>  'required',
        ]);

        try {
            $category = new Category;
            $category->category_name = $request->category_name; 

            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->category_image = $imageName;
            }
            $category->save();
            return redirect()->route('category.index')->with('success', 'Add category successfully!');
        } catch (\Exception $e) {
            return redirect()->route('category.create')->with('failed', 'Add category failed!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admins.categories.edit',compact('categories'));
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
            'category_name'          =>  'required',
        ]);
        
    try {
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->category_image = $imageName;
        }
    
        
        $category->save();
        return redirect()->route('category.index')->with('success', 'Update category successfully!');
    } catch (\Exception $e) {
        return redirect()->route('category.edit')->with('failed', 'Update category failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

    return redirect()->route('category.index')->with('success','Delete category successfully');
    }
}
