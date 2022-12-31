<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Benefits;
use App\Models\Content;
use App\Models\Meetus;
use App\Models\NewsBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\SubscribeTrait;
use Illuminate\Support\Facades\Cookie;

class HomeController extends BaseController
{
    use SubscribeTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $benefits = Benefits::select("*")->get();
        $about = Content::select('*')->where('id', 1)->first();
        $meetus = Meetus::select("*")
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        $news = DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id', 'c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as news_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('type', 'news')
            ->orderBy('n.order_by', 'DESC')
            ->take(2)
            ->get();

        return view('front.home', compact('benefits', 'about', 'meetus', 'news'));
    }

    public function subscribe(Request $request)
    {
        $data = $request->input();
        $this->subscribeData($data);

        $message = view('front.newsletter_subscription', compact('data'));
        $this->email->from('info@deltabiocare.com', 'New Subscription');
        //$this->email->to('visitajayar@gmail.com');
        $this->email->to('info@deltabiocare.com');

        $this->email->subject('Newsletter Subscription');
        $this->email->message($message);
        $this->email->send();

        $minutes = time() + (86400 * 1);
        return response('Request successfully sent to DeltabioCare data base.')->cookie(
            'subscribed',
            'yes',
            $minutes
        );
    }

    public function noSubscribe(Request $request)
    {
        $minutes = time() + (86400 * 1);
        return response('You are successfully unsubscribed.')->cookie(
            'subscribed',
            'not interested',
            $minutes
        );
    }

    public function register()
    {
        return view('front.register');
    }

    public function postRegister(Request $request)
    {
    }

    public function postLogin(Request $request)
    {
    }
}
