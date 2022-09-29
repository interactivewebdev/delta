<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('name');
        return view('home', compact('username'));
    }
}
