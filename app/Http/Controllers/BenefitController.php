<?php

namespace App\Http\Controllers;

use App\Models\Benefits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefits::get();

        return view('benefit.list', compact('benefits'));
    }

    public function add()
    {
        $title = "Add New Benefit";

        return view('benefit.add', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_desc' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/benefit-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $benefit_image = 'benefit/' . time() . '-full.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/benefit/'), $benefit_image);

        if ($request->id != '') {
            $sqlResponse = Benefits::where('id', $request->id)->update([
                'title' => $validated['title'],
                'image' => url('uploads/' . $benefit_image),
                'short_desc' => $validated['short_desc'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Benefits::create([
                'title' => $validated['title'],
                'image' => url('uploads/' . $benefit_image),
                'short_desc' => $validated['short_desc'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/benefits')->with('success', 'Benefit is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $benefit = Benefits::where('id', $id)->first();
        $title = "Update Benefit";

        return view('benefit.add', compact('benefit', 'title'));
    }

    public function delete($id)
    {
        Benefits::where('id', $id)->delete();

        return redirect('/admin/benefits')->with('success', "Benefit is deleted successfully.");
    }

    public function active($id)
    {
        Benefits::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/benefits')->with('success', "Benefit is activated successfully.");
    }

    public function deactive($id)
    {
        Benefits::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/benefits')->with('success', "Benefit is deactivated successfully.");
    }
}
