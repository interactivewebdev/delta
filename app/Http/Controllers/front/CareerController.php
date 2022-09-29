<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('status', 1)->get();
        return view('front.careers', compact('careers'));
    }
}
