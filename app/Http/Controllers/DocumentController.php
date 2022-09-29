<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = DB::table('documents')->get();
        return view('documents', compact('documents'));
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
