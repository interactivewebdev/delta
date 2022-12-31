<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryFilter;
use App\Models\Filter;
use App\Models\Product;
use App\Models\ProductAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\File;
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

    public function attachments($product_id)
    {
        $attachments = ProductAttachment::join('product as p', 'product_attachment.product_id', 'p.product_id')->where('product_attachment.product_id', $product_id)->select('product_attachment.*', 'p.title as product_title')->get();

        return view('attachments', compact('attachments', 'product_id'));
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

    public function uploadFile($product_id)
    {
        $title = "Upload Product Document";
        $titles = ProductAttachment::where('product_id', $product_id)->groupBy('main_title')->get();
        return view('upload-document', compact('products', 'titles', 'title', 'product_id'));
    }

    public function editUploadFile($attachment_id)
    {
        $title = "Edit Upload Product Document";
        $attachment = ProductAttachment::where('id', $attachment_id)->first();
        $product_id = $attachment->product_id;
        $titles = ProductAttachment::where('product_id', $product_id)->groupBy('main_title')->get();
        return view('upload-document', compact('attachment', 'titles', 'title', 'product_id'));
    }

    public function deleteUploadFile($attachment_id)
    {
        $attach = ProductAttachment::where('id', $attachment_id)->first();
        File::delete(str_replace('http://localhost:8000/', '', str_replace('https://deltabiocare.com/', '', $attach->attachment)));
        ProductAttachment::where('id', $attachment_id)->delete();

        return redirect('/admin/product/attachment/' . $attachment_id)->with('success', 'Product attachment is deleted successfully!');
    }

    public function postUploadFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => '',
            'product_id' => 'required|max:255',
            'type' => 'required',
            'main_title1' => 'required_without:main_title',
            'main_title' => 'required_without:main_title1',
            'title' => 'required',
            'link' => 'required_without:attachment',
            'attachment' => 'required_without:link|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $docfile = 'document/' . time() . '-full.' . $request->file('attachment')->getClientOriginalExtension();
        $request->file('attachment')->move(public_path('uploads/document/'), $docfile);

        if ($validated['id'] != '') {
            $attach = ProductAttachment::where('id', $validated['id'])->first();
            File::delete(str_replace('http://localhost:8000/', '', str_replace('https://deltabiocare.com/', '', $attach->attachment)));

            ProductAttachment::where('id', $validated['id'])->update([
                'product_id' => $validated['product_id'],
                'main_title' => $validated['main_title1'] != '' ? $validated['main_title1'] : $validated['main_title'],
                'type' => $validated['type'],
                'title' => $validated['title'],
                'link' => $validated['link'],
                'attachment' => url('uploads/' . $docfile),
            ]);
        } else {
            ProductAttachment::create([
                'product_id' => $validated['product_id'],
                'main_title' => $validated['main_title1'] != '' ? $validated['main_title1'] : $validated['main_title'],
                'type' => $validated['type'],
                'title' => $validated['title'],
                'link' => $validated['link'],
                'attachment' => url('uploads/' . $docfile),
            ]);
        }

        return redirect('/admin/product/attachment/' . $validated['id'])->with('success', 'Product attachment is added successfully!');
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

        $docfile = 'document/' . time() . '-full.' . $request->file('document')->getClientOriginalExtension();
        $request->file('document')->move(public_path('uploads/document/'), $docfile);

        $category = Product::create([
            'parent_id' => $validated['parent_id'],
            'title' => $validated['title'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'image' => url('uploads/' . $docfile),
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
