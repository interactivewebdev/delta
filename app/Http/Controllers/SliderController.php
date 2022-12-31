<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();

        return view('slider.list', compact('sliders'));
    }

    public function add()
    {
        $title = "Add New Slider";

        return view('slider.add', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'position' => 'required',
            'order_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/slider-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $slider_image = 'slider/' . time() . '-full.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/slider/'), $slider_image);

        if ($request->id != '') {
            $sqlResponse = Slider::where('slider_id', $request->id)->update([
                'title' => $validated['title'],
                'image' => url('uploads/' . $slider_image),
                'position' => $validated['position'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Slider::create([
                'title' => $validated['title'],
                'image' => url('uploads/' . $slider_image),
                'position' => $validated['position'],
                'description' => $validated['description'],
                'order_by' => $validated['order_by'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/sliders')->with('success', 'Slider is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::where('slider_id', $id)->first();
        $title = "Update Slider";

        return view('slider.add', compact('slider', 'title'));
    }

    public function delete($id)
    {
        Slider::where('slider_id', $id)->delete();

        return redirect('/admin/sliders')->with('success', "Slider is deleted successfully.");
    }

    public function active($id)
    {
        Slider::where('slider_id', $id)->update(['status' => 1]);

        return redirect('/admin/sliders')->with('success', "Slider is activated successfully.");
    }

    public function deactive($id)
    {
        Slider::where('slider_id', $id)->update(['status' => 0]);

        return redirect('/admin/sliders')->with('success', "Slider is deactivated successfully.");
    }
}
