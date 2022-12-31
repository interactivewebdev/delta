<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::join('faq_category as fc', 'faq.category_id','fc.id')
            ->select('faq.*', 'fc.title as category_title')
            ->get();
        
        return view('faq.list', compact('faqs'));
    }

    public function add(){
        $categories = FaqCategory::get();
        $title = "Add New FAQ";

        return view('faq.add', compact('categories', 'title'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|min:50',
            'description' => 'required|min:50',
            'order_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/faq-form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        if($request->id != '') {
            $sqlResponse = Faq::where('faq_id',$request->id)->update([
                'category_id' => $validated['category_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = Faq::create([
                'category_id' => $validated['category_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1
            ]);

            $action = "added";
        }       

        return redirect('/admin/faqs')->with('success', 'FAQ is '.$action.' successfully!');
    }

    public function edit($id){
        $categories = FaqCategory::get();
        $faq = Faq::where('faq_id', $id)->first();
        $title = "Update FAQ";

        return view('faq.add', compact('categories', 'faq', 'title'));
    }

    public function delete($id){
        Faq::where('faq_id', $id)->delete();

        return redirect('/admin/faqs')->with('success', "Faq is deleted successfully.");
    }

    public function active($id){
        Faq::where('faq_id', $id)->update(['status'=>1]);

        return redirect('/admin/faqs')->with('success', "Faq is activated successfully.");
    }

    public function deactive($id){
        Faq::where('faq_id', $id)->update(['status'=>0]);

        return redirect('/admin/faqs')->with('success', "Faq is deactivated successfully.");
    }

    public function categories()
    {
        $categories = FaqCategory::get();

        return view('faq.categories', compact('categories'));
    }

    public function category_add(){
        $title = "Add New FAQ Category";
        return view('faq.category-add', compact('title'));
    }

    public function category_store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/fcategory-form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        if($request->id != '') {
            $sqlResponse = FaqCategory::where('id',$request->id)->update([
                'title' => $validated['title'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = FaqCategory::create([
                'title' => $validated['title'],
                'status' => 1
            ]);

            $action = "added";
        }       

        return redirect('/admin/fcategories')->with('success', 'FAQ Category is '.$action.' successfully!');
    }

    public function category_edit($id){
        $title = "Add New FAQ Category";
        $category = FaqCategory::where('id', $id)->first();

        return view('faq.category-add', compact('category', 'title'));
    }

    public function category_delete($id){
        FaqCategory::where('id', $id)->delete();

        return redirect('/admin/fcategories')->with('success', "FAQ Category is deleted successfully.");
    }

    public function category_active($id){
        FaqCategory::where('id', $id)->update(['status'=>1]);

        return redirect('/admin/fcategories')->with('success', "FAQ Category is activated successfully.");
    }

    public function category_deactive($id){
        FaqCategory::where('id', $id)->update(['status'=>0]);

        return redirect('/admin/fcategories')->with('success', "FAQ Category is deactivated successfully.");
    }

    
}
