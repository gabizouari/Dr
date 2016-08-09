<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BusinessPartnerController extends Controller
{

    public function index()
    {
        return view('businessPartner.index');
    }

    public function show()
    {
        // show item
    }

    public function create()
    {
        // show add form
    }

    public function store(Request $request)
    {
        // save item

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
        }



        $user = new User;
        $user->create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "valid_token" => Hash::make($request->email.$request->password.date('Y-m-d H:i:s'))
        ]);


        $request->session()->flash('alert-success', 'User was successful added!');
        return Redirect::back();


    }

    public function edit()
    {
        // show edit form
    }

    public function update()
    {
        // update
    }

    public function destroy()
    {
        // delete action
    }
}
