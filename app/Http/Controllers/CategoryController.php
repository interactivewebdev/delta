<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = FacadesDB::table('category as c1')
            ->leftJoin('category as c2', 'c1.parent_id', 'c2.category_id')
            ->select('c1.*', 'c2.title as parent')
            ->get();
        $username = $request->session()->get('name');

        return view('categories', compact('categories'));
    }

    public function getCategories(Request $request)
    {
        $categories = Category::where([
            'parent_id' => $request->category_id,
            'status' => 1,
        ])->get();

        return response($categories, 200);
    }

    public function add()
    {
        $title = "Add New Category";
        $categories = Category::where('parent_id', 0)->get();
        return view('category-add', compact('categories', 'title'));
    }

    public function edit($id)
    {
        $title = "Edit Category";
        $categories = Category::where('parent_id', 0)->get();
        $category = Category::where('category_id', $id)->first();
        return view('category-add', compact('categories', 'category', 'title'));
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

        $path = $request->file('image')->store('categories');

        $category = Category::create([
            'parent_id' => $validated['parent_id'],
            'title' => $validated['title'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'image' => url('uploads/' . $path),
        ]);

        return redirect('/admin/categories')->with('success', 'Category is added successfully!');
    }

    public function deactive($id)
    {
        Category::where('category_id', $id)
            ->update([
                'status' => 0,
            ]);

        return redirect('/admin/categories')->with('success', 'Category is deactivated successfully!');
    }

    public function active($id)
    {
        Category::where('category_id', $id)
            ->update([
                'status' => 1,
            ]);

        return redirect('/admin/categories')->with('success', 'Category is activated successfully!');
    }

    public function delete($id)
    {
        Category::where('category_id', $id)->delete();

        return redirect('/admin/categories')->with('success', 'Category is deleted successfully!');
    }
}
