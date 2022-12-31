<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributerController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'distributor')->get();
        return view('distributers', compact('users'));
    }

    public function add()
    {
        $countries = Country::get();
        return view('distributer-add', compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/distributor-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if ($request->id != '') {
            $sqlResponse = User::where('id', $request->id)->update([
                'country' => $validated['country'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company' => $validated['company'],
                'username' => $validated['username'],
                'password' => $validated['password'],
                'status' => 1,
                'type' => 'distributor',
            ]);

            $action = "updated";
        } else {
            $sqlResponse = User::create([
                'country' => $validated['country'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company' => $validated['company'],
                'username' => $validated['username'],
                'password' => $validated['password'],
                'status' => 1,
                'type' => 'distributor',
            ]);

            $action = "added";
        }

        return redirect('/admin/distributors')->with('success', 'Distributor is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $countries = Country::get();
        $distributor = User::where('id', $id)->first();
        return view('distributer-add', compact('countries', 'distributor'));
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/distributors')->with('success', 'Distributor is deleted successfully!');
    }
    public function active($id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return redirect('admin/distributors')->with('success', 'Distributor is activated successfully!');
    }

    public function deactive($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return redirect('admin/distributors')->with('success', 'Distributor is deactivated successfully!');
    }

    public function approve($id)
    {
        User::where('id', $id)->update(['approve' => 1, 'status' => 1]);
        return redirect('admin/distributors')->with('success', 'Distributor is approved successfully!');
    }

    public function reject($id)
    {
        User::where('id', $id)->update(['approve' => 2]);
        return redirect('admin/distributors')->with('success', 'Distributor is rejected successfully!');
    }
}
