<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{

    public function store(Request $request)
    {
        if (Auth::attempt([
            'email' =>  $request->get('email'),
            'password' => $request->get('password')
        ])){
            return Redirect::to('partnership/dashboard');
            //return Auth::user();
        }

        $request->session()->flash('auth' , TRUE);
        $request->session()->flash('alert-danger', 'invalid login or Password');
        return Redirect::back();

    }


    public function logout()
    {
        Auth::logout();
        return Redirect::to('/partnership');
    }

}
