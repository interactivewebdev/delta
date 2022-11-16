<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Doccategory;
use App\Models\Documents;
use App\Models\Docusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = DB::table('documents')->get();
        return view('documents', compact('documents'));
    }

    public function doc_add()
    {
        $category['parent'] = Doccategory::where('parent_id',0)->get()->toArray();
        $category['sub'] = Doccategory::whereIn('parent_id', function($query){
            $query->from('doc_category')->select('id')->where('parent_id',0);
        })->get()->toArray();
        $category['subsub'] = Doccategory::whereIn('parent_id', function($query){
            $query->from('doc_category')->select('id')->where('parent_id', function($query){
                $query->from('doc_category')->select('id')->where('parent_id',0);
            });
        })->get()->toArray();

        $country = Country::get();

        $title = "Add New Document";

        //dd($category);

        return view('document-add', compact('category', 'country', 'title'));
    }    

    public function doc_edit($id)
    {
        $category['parent'] = Doccategory::where('parent_id',0)->get()->toArray();
        $category['sub'] = Doccategory::whereIn('parent_id', function($query){
            $query->from('doc_category')->select('id')->where('parent_id',0);
        })->get()->toArray();
        $category['subsub'] = Doccategory::whereIn('parent_id', function($query){
            $query->from('doc_category')->select('id')->where('parent_id', function($query){
                $query->from('doc_category')->select('id')->where('parent_id',0);
            });
        })->get()->toArray();

        $document = Documents::where('id', $id)->first();

        $country = Country::get();

        $title = "Update Document";
        

        return view('document-add', compact('category', 'country', 'document','title'));
    }

    public function doc_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|max:155',
            'document_name' => 'required',
            'document' => 'required|max:10000',
            'country' => 'required',
            'valid_upto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('document-form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        $path = $request->file('document')->store('documents');

        if($request->id != '') {
            $sqlResponse = Documents::where('id',$request->id)->update([
                'category_id' => $validated['category_id'],
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'document_name' => $validated['document_name'],
                'document' => url('uploads/'.$path),
                'country' => $validated['country'],
                'valid_upto' => $validated['valid_upto'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = Documents::create([
                'category_id' => $validated['category_id'],
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'document_name' => $validated['document_name'],
                'document' => url('uploads/'.$path),
                'country' => $validated['country'],
                'valid_upto' => $validated['valid_upto'],
                'status' => 1
            ]);

            $action = "added";
        }       

        return redirect('/admin/document/categories')->with('success', 'Document category is '.$action.' successfully!');
    }

    public function docUsers()
    {
        $users = Docusers::get();
        return view('document.users', compact('users'));
    }

    public function docuser_add() {
        $countries = Country::get();
        return view('document.user-add', compact('countries'));
    }

    public function docuser_store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:155',
            'parent_id' => 'required',
        ]);
    }
    public function docuser_edit() {}
    public function docuser_delete($id) {
        Docusers::where('id', $id)->delete();
        return redirect('admin/document/users')->with('success', 'Document user is deleted successfully!');
    }
    public function docuser_active($id) {
        Docusers::where('id', $id)->update(['status'=>1]);
        return redirect('admin/document/users')->with('success', 'Document user is activated successfully!');
    }
    public function docuser_deactive($id) {
        Docusers::where('id', $id)->update(['status'=>0]);
        return redirect('admin/document/users')->with('success', 'Document user is deactivated successfully!');
    }

    public function docCategories()
    {
        $doc_categories = DB::table('doc_category as c1')->leftJoin('doc_category as c2', 'c1.parent_id', 'c2.id')->select('c1.*','c2.title as parent')->orderBy('id', 'desc')->get();
        return view('document.categories', compact('doc_categories'));
    }

    public function category_add()
    {
        //$categories = DB::table('doc_category')->where('parent_id',0)->get();
        $categories = DB::table('doc_category')->get();
        return view('document.category_add', compact('categories'));
    }

    public function category_edit($id) {
        //$categories = DB::table('doc_category')->where('parent_id',0)->get();
        $categories = DB::table('doc_category')->get();
        $category = DB::table('doc_category')->where('id',$id)->first();

        return view('document.category_add', compact('categories', 'category'));
    }

    public function category_store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:155',
            'parent_id' => 'required',
        ]);
        
        if($request->id != '') {
            $sqlResponse = Doccategory::where('id',$request->id)->update([
                'parent_id' => $validated['parent_id'],
                'title' => $validated['name'],
                'status' => 1
            ]);

            $action = "updated";
        }else{
            $sqlResponse = Doccategory::create([
                'parent_id' => $validated['parent_id'],
                'title' => $validated['name'],
                'status' => 1
            ]);

            $action = "added";
        }

        return redirect('/admin/document/categories')->with('success', 'Document category is '.$action.' successfully!');
    }

    public function category_delete($id) {
        Doccategory::where('id', $id)->delete();

        return redirect('/admin/document/categories')->with('success', 'Document category is deleted successfully!');
    }

    public function category_active($id) {
        Doccategory::where('id', $id)->update(['status'=>1]);

        return redirect('/admin/document/categories')->with('success', 'Document category is activated successfully!');
    }

    public function category_deactive($id) {
        Doccategory::where('id', $id)->update(['status'=>0]);

        return redirect('/admin/document/categories')->with('success', 'Document category is deactivated successfully!');
    }
}
