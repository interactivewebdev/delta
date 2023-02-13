<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataEntryController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'dataentry')->get();
        return view('dataentry.users', compact('users'));
    }

    public function add()
    {
        $title = "Add New Dataentry User";
        return view('dataentry.user-add', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6',
            'password' => 'required|min:8',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'id' => '',
        ]);

        if ($validator->fails()) {
            return redirect('admin/dataentry/user-form')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if (!$validated['id']) {
            $insertedUser = User::create([
                'username' => $validated['username'],
                'password' => $validated['password'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'type' => 'dataentry',
            ]);

            return redirect('admin/dataentry/users')->with('success', 'Dataentry user is created successfully!');
        } else {
            $insertedUser = User::where('id', $validated['id'])->update([
                'username' => $validated['username'],
                'password' => $validated['password'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'type' => 'dataentry',
            ]);

            return redirect('admin/dataentry/users')->with('success', 'Dataentry user is updated successfully!');
        }
    }

    public function edit($id)
    {
        $title = "Update Dataentry User";
        $user = User::where('id', $id)->first();
        return view('dataentry.user-add', compact('title', 'user'));
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/dataentry/users')->with('success', 'Dataentry user is deleted successfully!');
    }

    public function activate($id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return redirect('admin/dataentry/users')->with('success', 'Dataentry user is activated successfully!');
    }

    public function deactivate($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return redirect('admin/dataentry/users')->with('success', 'Dataentry user is deactivated successfully!');
    }

    public function approve($id)
    {
        User::where('id', $id)->update(['approve' => 1, 'status' => 1]);
        return redirect('admin/dataentry/users')->with('success', 'Dataentry user is approved successfully!');
    }

    public function reject($id)
    {
        User::where('id', $id)->update(['approve' => 2]);
        return redirect('admin/dataentry/users')->with('success', 'Dataentry user is rejected successfully!');
    }
}
