<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\PageTrait;

class PageController extends BaseController
{

    use PageTrait;

    public function __construct()
    {
        
    }

	public function aboutus()
	{
		$content = $this->getItem(1);
		$page_sections = $this->getPageSections(1);

		return view('front.about', compact('content', 'page_sections'));
	}

    public function contact()
    {
        $contact = $this->getItem(2);
		$config = $this->getConfigData();
		$selectedCountries = $this->getAddressCountries();
		$addresses = $this->getList();
		
		foreach($addresses as $t)
			$t->address = nl2br($t->address);
		$default = $this->getDefaultAddress();

		$array = array();
		foreach($addresses as $row){
			$array[] = array($row->address, $row->lat, $row->lon, 4, $row->city, $row->country);
		}
		
		$locations = $array;
		//dd($default);

        return view('front.contact', compact('contact','config','default','locations','selectedCountries'));
    }
}
