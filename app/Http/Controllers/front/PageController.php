<?php

namespace App\Http\Controllers\front;

use App\Traits\PageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

        foreach ($addresses as $t) {
            $t->address = nl2br($t->address);
        }

        $default = $this->getDefaultAddress();

        $array = array();
        foreach ($addresses as $row) {
            $array[] = array($row->address, $row->lat, $row->lon, 4, $row->city, $row->country);
        }

        $locations = $array;
        //dd($default);

        return view('front.contact', compact('contact', 'config', 'default', 'locations', 'selectedCountries'));
    }

    public function postContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/contact-us')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        Mail::send('emails.contact', $data, function ($msg) use ($request) {
            $msg->from('info@deltabiocare.com', 'Contact Us Enquiry');

            $msg->to($request->email)->cc('visitajayar@gmail.com');
        });

        return redirect('contact-us')->with('success', 'Contact us equiry request successfully sent to DeltabioCare representative. He will contact you soon.');
    }
}
