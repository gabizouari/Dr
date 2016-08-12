<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail', function () {

    $data = ["data" => "content goes here"];
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('sabri.zouari@lybe.se', 'Laravel');
        $message->to('gabizouari@gmail.com');
    });

    return "done";
});


Route::get('partnership/dashboard',  'BusinessPartnerController@dashboard');
Route::get('partnership/logout','AuthenticationController@logout');

Route::resource('partnership','BusinessPartnerController');
Route::resource('authentication','AuthenticationController');