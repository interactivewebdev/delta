<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('name');
        return view('home', compact('username'));
    }

    public function profile()
    {
        // Code will come here
        $countries = Country::get();
        return view('profile-edit', compact('countries'));
    }

    public function inbox()
    {
        // Code will come here
    }

    public function setting()
    {
        // Code will come here
    }
}
