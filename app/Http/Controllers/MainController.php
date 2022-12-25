<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->get('isLoggedIn') === true) {
            return redirect('/admin/dashboard');
        }

        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where(['username' => $username, 'password' => $password, 'status' => 1, 'approve' => 1]);

        if ($user->count() > 0) {
            $u = $user->first();
            $request->session()->put('username', $u->username);
            $request->session()->put('name', $u->name);
            $request->session()->put('email', $u->email);
            $request->session()->put('phone', $u->phone);
            $request->session()->put('country', $u->country);
            $request->session()->put('company', $u->company);
            $request->session()->put('usertype', $u->type);
            $request->session()->put('isLoggedIn', true);

            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin/login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {
        return $request->input();
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function requestPassword(Request $request)
    {

    }

    public function newPassword()
    {
        return view('auth.new-password');
    }

    public function changePassword(Request $request)
    {

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }
}
