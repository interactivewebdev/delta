<?php

namespace App\Http\Controllers\front;

use App\Models\Benefits;
use App\Models\Content;
use App\Models\Country;
use App\Models\Doccategory;
use App\Models\Documents;
use App\Models\Meetus;
use App\Models\User;
use App\Traits\SubscribeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'subscribed', 'yes', $minutes
        );
    }

    public function noSubscribe(Request $request)
    {
        $minutes = time() + (86400 * 1);
        return response('You are successfully unsubscribed.')->cookie('subscribed', 'not interested', $minutes
        );
    }

    public function register()
    {
        $countries = Country::all();
        return view('front.register', compact('countries'));
    }

    public function postLogin(Request $request)
    {
        dd($request);
    }

    public function postRegister(Request $request)
    {
        $inputData = $request->input();

        $userExists = DB::table('doc_user')->where('username', $request->input('username'))->count();

        if ($userExists <= 0) {
            unset($inputData['_token']);
            DB::table('doc_user')->insert($inputData);

            return redirect('page/thanks')->with('message', 'You are successfully registered.');
        } else {
            return redirect('user/register')->with('    ', 'Username is already exists.');
        }
    }

    public function distRegister()
    {
        $countries = Country::all();
        return view('front.distributor-register', compact('countries'));
    }

    public function postDistLogin(Request $request)
    {
        $user = User::where(['username' => $request->username, 'password' => $request->password]);

        if ($user->count() > 0) {
            $data = $user->first()->toArray();
            $request->session()->put('user_type', $data['type']);
            $request->session()->put('dst_name', $data['name']);
            $request->session()->put('distributor', $data);
            if($data['type'] == "document")
            $request->session()->put('distributor_logged_in', true);

            return redirect('/distributor/' . $data['id'] . '/profile');
        } else {
            return back()->withInput();
        }
    }

    public function distLogout()
    {
        Session::forget('dst_name');
        Session::forget('distributor');
        Session::forget('distributor_logged_in');

        return redirect('/');
    }

    public function postDistRegister(Request $request)
    {
        $inputData = $request->input();

        $userExists = DB::table('distributor')->where('username', $request->input('username'))->count();

        if ($userExists <= 0) {
            unset($inputData['_token']);
            DB::table('distributor')->insert($inputData);

            return redirect('page/thanks')->with('message', 'You are successfully registered.');
        } else {
            return redirect('user/register')->with('    ', 'Username is already exists.');
        }
    }

    public function thanks()
    {
        $response['message'] = session('message');
        return view('front.thanks', compact('response'));
    }

    public function distributor_profile($id)
    {
        $distributor = User::where('id', $id)->first();
        $country = Country::where('id', $distributor->country)->first();
        $documents = Documents::where('country', $distributor->country)->get();

        $categories = Doccategory::where('parent_id', 0)->get()->toArray();

        foreach ($categories as $key => $c) {
            $categories[$key]['categories'] = Doccategory::where('parent_id', $c['id'])->get()->toArray();

            foreach ($categories[$key]['categories'] as $key1 => $c1) {
                $categories[$key]['categories'][$key1]['categories'] = Doccategory::where('parent_id', $c1['id'])->get()->toArray();
            }
        }

        return view('front.distributor_profile', compact('distributor', 'country', 'documents', 'categories'));
    }
}
