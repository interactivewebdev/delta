<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Docusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = DB::table('documents')->get();
        return view('documents', compact('documents'));
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
    public function docuser_store() {

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
        $doc_categories = DB::table('doc_category')->get();
        return view('document.categories', compact('doc_categories'));
    }

    public function category_add()
    {
        $categories = DB::table('doc_category')->get();
        return view('document.category_add', compact('categories'));
    }
}
