<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\BlogTrait;

class FaqController extends BaseController
{

    use BlogTrait;

    public function __construct()
    {
        
    }

    public function index(){
        $categories = $this->getFaqCategories();
		foreach($categories as $row) {
			$row->faqs = $this->getFaqByCategory($row->id);
		}

        return view('front.faq', compact('categories'));
    }
}
