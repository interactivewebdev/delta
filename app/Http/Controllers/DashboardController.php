<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        echo "hello";
    }

    public function index() {
        return view('home');
    }
}
