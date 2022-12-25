<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = NewsBlog::leftJoin('category as c', 'news_blog.category_id','c.category_id')
            ->select('news_blog.*', 'c.title as category_title')
            ->where('type', 'blog')
            ->get();
        
        return view('blog.list', compact('blogs'));
    }

    public function add(){
        $categories = Category::where('status', 1)->get();
        $title = "Add New Blog";

        return view('blog.add', compact('categories', 'title'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'metatitle' => 'required',
            'metakeyword' => 'required',
            'metadesc' => 'required',
            'title' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'list_image' => 'required',
            'image' => 'required',
            'order_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/blog-form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        // Store file in storage folder
        // $blog_listimage = $request->file('list_image')->store('public/uploads/blog');
        // $blog_image = $request->file('image')->store('public/uploads/blog');

        // store file in public folder
        $blog_listimage = 'blog/'.time().'-list.'.$request->file('list_image')->getClientOriginalExtension();
        $request->file('list_image')->move(public_path('uploads/blog/'), $blog_listimage);

        $blog_image = 'blog/'.time().'-full.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/blog/'), $blog_image);

        if($request->id != '') {
            $sqlResponse = NewsBlog::where('id',$request->id)->update([
                'category_id' => $validated['category_id'],
                'metatitle' => $validated['metatitle'],
                'metakeyword' => $validated['metakeyword'],
                'metadesc' => $validated['metadesc'],
                'title' => $validated['title'],
                'list_image' => url('uploads/'.$blog_listimage),
                'image' => url('uploads/'.$blog_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = NewsBlog::create([
                'category_id' => $validated['category_id'],
                'metatitle' => $validated['metatitle'],
                'metakeyword' => $validated['metakeyword'],
                'metadesc' => $validated['metadesc'],
                'title' => $validated['title'],
                'list_image' => url('uploads/'.$blog_listimage),
                'image' => url('uploads/'.$blog_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'type' => 'blog',
                'status' => 1
            ]);

            $action = "added";
        }       

        return redirect('/admin/blogs')->with('success', 'Blog is '.$action.' successfully!');
    }

    public function edit($id){
        $categories = Category::where('status', 1)->get();
        $blog = NewsBlog::where('id', $id)->first();
        $title = "Update Blog";

        return view('blog.add', compact('categories', 'blog', 'title'));
    }

    public function delete($id,$type){
        NewsBlog::where('id', $id)->delete();

        if($type == "blog")
            return redirect('/admin/blogs')->with('success', "Blog is deleted successfully.");
        else
            return redirect('/admin/news')->with('success', "News is deleted successfully.");
    }

    public function active($id,$type){
        NewsBlog::where('id', $id)->update(['status'=>1]);

        if($type == "blog")
            return redirect('/admin/blogs')->with('success', "Blog is activated successfully.");
        else
            return redirect('/admin/news')->with('success', "News is activated successfully.");
    }

    public function deactive($id,$type){
        NewsBlog::where('id', $id)->update(['status'=>0]);

        if($type == "blog")
            return redirect('/admin/blogs')->with('success', "Blog is deactivated successfully.");
        else
            return redirect('/admin/news')->with('success', "News is deactivated successfully.");
    }

    public function news_list()
    {
        $news = NewsBlog::leftJoin('category as c', 'news_blog.category_id','c.category_id')
            ->select('news_blog.*', 'c.title as category_title')
            ->where('type', 'news')
            ->get();
        
        return view('blog.news', compact('news'));
    }

    public function news_add(){
        $categories = Category::where('status', 1)->get();
        $title = "Add New News";
        return view('blog.news-add', compact('categories','title'));
    }

    public function news_store(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'metatitle' => 'required',
            'metakeyword' => 'required',
            'metadesc' => 'required',
            'title' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'list_image' => 'required',
            'image' => 'required',
            'order_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/blog-form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        $blog_listimage = 'news/'.time().'-list.'.$request->file('list_image')->getClientOriginalExtension();
        $request->file('list_image')->move(public_path('uploads/news/'), $blog_listimage);

        $blog_image = 'news/'.time().'-full.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/news/'), $blog_image);

        if($request->id != '') {
            $sqlResponse = NewsBlog::where('id',$request->id)->update([
                'category_id' => $validated['category_id'],
                'metatitle' => $validated['metatitle'],
                'metakeyword' => $validated['metakeyword'],
                'metadesc' => $validated['metadesc'],
                'title' => $validated['title'],
                'list_image' => url('uploads/'.$blog_listimage),
                'image' => url('uploads/'.$blog_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = NewsBlog::create([
                'category_id' => $validated['category_id'],
                'metatitle' => $validated['metatitle'],
                'metakeyword' => $validated['metakeyword'],
                'metadesc' => $validated['metadesc'],
                'title' => $validated['title'],
                'list_image' => url('uploads/'.$blog_listimage),
                'image' => url('uploads/'.$blog_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'type' => 'news',
                'status' => 1
            ]);

            $action = "added";
        }       

        return redirect('/admin/news')->with('success', 'News is '.$action.' successfully!');
    }

    public function news_edit($id){
        $title = "Add New News";
        $categories = Category::where('status', 1)->get();
        $news = NewsBlog::where('id', $id)->first();

        return view('blog.news-add', compact('categories', 'news', 'title'));
    }

}
