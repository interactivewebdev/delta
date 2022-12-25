<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryFilter;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = FacadesDB::table('product as p')
            ->leftJoin('category as c', 'p.category_id', 'c.category_id')
            ->select('p.*', 'c.title as category')
            ->get();
        $username = $request->session()->get('name');

        return view('products', compact('products'));
    }

    public function add()
    {
        $title = "Add New Product";
        $categories = Category::all();
        $filters = Filter::where('status', 1)->get()->toArray();
        foreach ($filters as $key => $value) {
            $filters[$key]['attributes'] = CategoryFilter::where('filter_id', $value['filter_id'])->get()->toArray();
        }
        return view('product-add', compact('categories', 'title', 'filters'));
    }

    public function edit($id)
    {
        $title = "Edit Product";
        $products = Product::where('parent_id', 0)->get();
        $category = Product::where('product_id', $id)->first();
        return view('category-add', compact('products', 'category', 'title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => 'required|max:255',
            'title' => 'required',
            'level' => '',
            'description' => 'required',
            'image' => 'required|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect('category-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $path = $request->file('image')->store('products');

        $category = Product::create([
            'parent_id' => $validated['parent_id'],
            'title' => $validated['title'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'image' => url('uploads/' . $path),
        ]);

        return redirect('products')->with('success', 'Product is added successfully!');
    }

    public function deactive($id)
    {
        Product::where('product_id', $id)
            ->update([
                'status' => 0,
            ]);

        return redirect('products')->with('success', 'Product is deactivated successfully!');
    }

    public function active($id)
    {
        Product::where('product_id', $id)
            ->update([
                'status' => 1,
            ]);

        return redirect('products')->with('success', 'Product is activated successfully!');
    }

    public function delete($id)
    {
        Product::where('product_id', $id)->delete();

        return redirect('products')->with('success', 'Product is deleted successfully!');
    }
}
