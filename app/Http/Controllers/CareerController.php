<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::get();

        return view('career.list', compact('careers'));
    }

    public function add()
    {
        $title = "Add New Job/Career";

        return view('career.add', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'positions' => 'required',
            'place' => 'required',
            'job_type' => 'required',
            'experience' => 'required',
            'functional_area' => 'required',
            'job_description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/career-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if ($request->id != '') {
            $sqlResponse = Career::where('id', $request->id)->update([
                'title' => $validated['title'],
                'positions' => $validated['positions'],
                'place' => $validated['place'],
                'job_type' => $validated['job_type'],
                'experience' => $validated['experience'],
                'functional_area' => $validated['functional_area'],
                'job_description' => $validated['job_description'],
                'status' => 1,
            ]);

            $action = "updated";
        } else {
            $sqlResponse = Career::create([
                'title' => $validated['title'],
                'positions' => $validated['positions'],
                'place' => $validated['place'],
                'job_type' => $validated['job_type'],
                'experience' => $validated['experience'],
                'functional_area' => $validated['functional_area'],
                'job_description' => $validated['job_description'],
                'status' => 1,
            ]);

            $action = "added";
        }

        return redirect('/admin/careers')->with('success', 'Career is ' . $action . ' successfully!');
    }

    public function edit($id)
    {
        $career = Career::where('id', $id)->first();
        $title = "Update Career";

        return view('career.add', compact('career', 'title'));
    }

    public function delete($id)
    {
        Career::where('id', $id)->delete();

        return redirect('/admin/careers')->with('success', "Career is deleted successfully.");

    }

    public function active($id)
    {
        Career::where('id', $id)->update(['status' => 1]);

        return redirect('/admin/careers')->with('success', "Career is activated successfully.");

    }

    public function deactive($id)
    {
        Career::where('id', $id)->update(['status' => 0]);

        return redirect('/admin/careers')->with('success', "Career is deactivated successfully.");

    }
}
