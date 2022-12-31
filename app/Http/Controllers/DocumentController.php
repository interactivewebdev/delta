<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Doccategory;
use App\Models\Documents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Response;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = DB::table('documents as d')
            ->join('doc_category as dc', 'd.category_id', 'dc.id')
            ->join('country as c', 'c.id', 'd.country')
            ->select('dc.title as category_name', 'c.name as country_name', 'd.*');

        if (strtolower(Session::get('usertype')) == "admin") {
            $documents = $documents->get();
        } else {
            $documents = $documents->where('country', Session::get('country'))->get();
        }

        return view('documents', compact('documents'));
    }

    public function doc_add()
    {
        $category['parent'] = Doccategory::where('parent_id', 0)->get()->toArray();
        $category['sub'] = Doccategory::whereIn('parent_id', function ($query) {
            $query->from('doc_category')->select('id')->where('parent_id', 0);
        })->get()->toArray();
        $category['subsub'] = Doccategory::whereIn('parent_id', function ($query) {
            $query->from('doc_category')->select('id')->whereIn('parent_id', function ($query) {
                $query->from('doc_category')->select('id')->where('parent_id', 0);
            });
        })->get()->toArray();

        $country = Country::get();

        $title = "Add New Document";

        //dd($category);

        return view('document-add', compact('category', 'country', 'title'));
    }

    public function doc_edit($id)
    {
        $category['parent'] = Doccategory::where('parent_id', 0)->get()->toArray();
        $category['sub'] = Doccategory::whereIn('parent_id', function ($query) {
            $query->from('doc_category')->select('id')->where('parent_id', 0);
        })->get()->toArray();
        $category['subsub'] = Doccategory::whereIn('parent_id', function ($query) {
            $query->from('doc_category')->select('id')->whereIn('parent_id', function ($query) {
                $query->from('doc_category')->select('id')->where('parent_id', 0);
            });
        })->get()->toArray();

        $document = Documents::where('id', $id)->first();

        $country = Country::get();

        $title = "Update Document";

        return view('document-add', compact('category', 'country', 'document', 'title'));
    }

    public function getDocSubCategory(Request $request)
    {
        $categories = Doccategory::where(['parent_id' => $request->id, 'status' => 1])->select('id', 'title')->get();
        return Response::json($categories);
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

        $docfile = 'document/' . time() . '-full.' . $request->file('document')->getClientOriginalExtension();
        $request->file('document')->move(public_path('uploads/document/'), $docfile);

        if ($request->id != '') {
            $sqlResponse = Documents::where('id', $request->id)->update([
                'category_id' => $validated['category_id'],
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'document_name' => $validated['document_name'],
                'document' => url('uploads/' . $docfile),
                'country' => $validated['country'],
                'valid_upto' => $validated['valid_upto'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Documents::create([
                'category_id' => $validated['category_id'],
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'document_name' => $validated['document_name'],
                'document' => url('uploads/' . $docfile),
                'country' => $validated['country'],
                'valid_upto' => $validated['valid_upto'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/documents')->with('success', 'Document category is ' . $action . ' successfully!');
    }

    public function docUsers()
    {
        $users = User::where('type', 'document')->get();
        return view('document.users', compact('users'));
    }

    // public function docuser_add() {
    //     $countries = Country::get();
    //     return view('document.user-add', compact('countries'));
    // }

    // public function docuser_store(Request $request) {
    //     $validated = $request->validate([
    //         'name' => 'required|max:155',
    //         'parent_id' => 'required',
    //     ]);
    // }
    //public function docuser_edit() {}
    public function docuser_delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/document/users')->with('success', 'Document user is deleted successfully!');
    }
    public function docuser_active($id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return redirect('admin/document/users')->with('success', 'Document user is activated successfully!');
    }

    public function docuser_deactive($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return redirect('admin/document/users')->with('success', 'Document user is deactivated successfully!');
    }

    public function docuser_approve($id)
    {
        User::where('id', $id)->update(['approve' => 1, 'status' => 1]);
        return redirect('admin/document/users')->with('success', 'Document user is approved successfully!');
    }

    public function docuser_reject($id)
    {
        User::where('id', $id)->update(['approve' => 2]);
        return redirect('admin/document/users')->with('success', 'Document user is rejected successfully!');
    }

    public function docCategories()
    {
        $doc_categories = DB::table('doc_category as c1')->leftJoin('doc_category as c2', 'c1.parent_id', 'c2.id')->select('c1.*', 'c2.title as parent')->orderBy('id', 'desc')->get();
        return view('document.categories', compact('doc_categories'));
    }

    public function category_add()
    {
        //$categories = DB::table('doc_category')->where('parent_id',0)->get();
        $categories = DB::table('doc_category')->get();
        return view('document.category_add', compact('categories'));
    }

    public function category_edit($id)
    {
        //$categories = DB::table('doc_category')->where('parent_id',0)->get();
        $categories = DB::table('doc_category')->get();
        $category = DB::table('doc_category')->where('id', $id)->first();

        return view('document.category_add', compact('categories', 'category'));
    }

    public function category_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:155',
            //'parent_id' => 'required',
        ]);

        if ($request->id != '') {
            $sqlResponse = Doccategory::where('id', $request->id)->update([
                'parent_id' => $request->parent_id ? $request->parent_id : 0,
                'title' => $request->name,
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Doccategory::create([
                'parent_id' => $request->parent_id ? $request->parent_id : 0,
                'title' => $request->name,
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/document/categories')->with('success', 'Document category is ' . $action . ' successfully!');
    }

    public function category_delete($id)
    {
        Doccategory::where('id', $id)->delete();

        return redirect('/admin/document/categories')->with('success', 'Document category is deleted successfully!');
    }

    public function category_active($id)
    {
        Doccategory::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/document/categories')->with('success', 'Document category is activated successfully!');
    }

    public function category_deactive($id)
    {
        Doccategory::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/document/categories')->with('success', 'Document category is deactivated successfully!');
    }
}
