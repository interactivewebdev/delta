<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Country;
use App\Models\Meetus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::get();

        return view('address.list', compact('addresses'));
    }

    public function add()
    {
        $countries = Country::get();
        $title = "Add New Address";

        return view('address.add', compact('countries', 'title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'city' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/address-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if ($request->id != '') {
            $sqlResponse = Address::where('id', $request->id)->update([
                'country' => $validated['country'],
                'city' => $validated['city'],
                'lat' => $validated['lat'],
                'lon' => $validated['lon'],
                'address' => $validated['address'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Address::create([
                'country' => $validated['country'],
                'city' => $validated['city'],
                'lat' => $validated['lat'],
                'lon' => $validated['lon'],
                'address' => $validated['address'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/addresses')->with('success', 'Address is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $countries = Country::get();
        $address = Address::where('id', $id)->first();
        $title = "Update Address";

        return view('address.add', compact('countries', 'address', 'title'));
    }

    public function delete($id)
    {
        Address::where('id', $id)->delete();

        return redirect('/admin/addresses')->with('success', "Address is deleted successfully.");

    }

    public function active($id)
    {
        Address::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/addresses')->with('success', "Address is activated successfully.");

    }

    public function deactive($id)
    {
        Address::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/addresses')->with('success', "Address is deactivated successfully.");
    }

    public function meetus_list()
    {
        $addresses = Meetus::get();

        return view('address.meetus_list', compact('addresses'));
    }

    public function meetus_add()
    {
        $title = "Add New Meetus Address";

        return view('address.meetus_add', compact('title'));
    }

    public function meetus_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'link' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/meetus-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $meetus_image = 'address/' . time() . '-full.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/address/'), $meetus_image);

        if ($request->id != '') {
            $sqlResponse = Meetus::where('id', $request->id)->update([
                'address' => $validated['address'],
                'link' => $validated['link'],
                'image' => url('uploads/' . $meetus_image),
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Meetus::create([
                'address' => $validated['address'],
                'link' => $validated['link'],
                'image' => url('uploads/' . $meetus_image),
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/meetus')->with('success', 'Meetus Address is ' . $action . ' successfully!');
    }

    public function meetus_edit($id)
    {
        $address = Meetus::where('id', $id)->first();
        $title = "Update Meetus Address";

        return view('address.meetus_add', compact('address', 'title'));
    }

    public function meetus_delete($id)
    {
        Meetus::where('id', $id)->delete();

        return redirect('/admin/meetus')->with('success', "Meetus Address is deleted successfully.");

    }

    public function meetus_active($id)
    {
        Meetus::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/meetus')->with('success', "Meetus Address is activated successfully.");

    }

    public function meetus_deactive($id)
    {
        Meetus::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/meetus')->with('success', "Meetus Address is deactivated successfully.");
    }
}
