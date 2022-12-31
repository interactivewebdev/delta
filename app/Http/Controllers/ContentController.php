<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index()
    {
        $pages = Content::get();

        return view('content.list', compact('pages'));
    }

    public function add()
    {
        $title = "Add New Page";

        return view('content.add', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'list_image' => 'required',
            'image' => 'required',
            'order_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/content-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $content_listimage = 'content/' . time() . '-list.' . $request->file('list_image')->getClientOriginalExtension();
        $request->file('list_image')->move(public_path('uploads/content/'), $content_listimage);

        $content_image = 'content/' . time() . '-full.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/content/'), $content_image);

        if ($request->id != '') {
            $sqlResponse = Content::where('id', $request->id)->update([
                'title' => $validated['title'],
                'list_image' => url('uploads/' . $content_listimage),
                'image' => url('uploads/' . $content_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Content::create([
                'title' => $validated['title'],
                'list_image' => url('uploads/' . $content_listimage),
                'image' => url('uploads/' . $content_image),
                'short_desc' => $validated['short_desc'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/contents')->with('success', 'Page is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $content = Content::where('id', $id)->first();
        $title = "Update Page Content";

        return view('content.add', compact('content', 'title'));
    }

    public function delete($id)
    {
        Content::where('id', $id)->delete();

        return redirect('/admin/contents')->with('success', "Content is deleted successfully.");
    }

    public function active($id)
    {
        Content::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/contents')->with('success', "Content is activated successfully.");
    }

    public function deactive($id)
    {
        Content::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/contents')->with('success', "Content is deactivated successfully.");
    }
}
