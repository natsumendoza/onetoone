<?php

use App\User;
use App\Address;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {

    $user = User::findOrFail(1);

    $address = new Address(['name' => 'Mandaluyong City']);

    $user->address()->save($address);

});

Route::get('/update', function () {

    $address = Address::whereUserId(1)->first();

    $address->name = "Mandaluyong City";

    $address->save();

});

Route::get('/read', function () {

    $user = User::findOrFail(1);

    return $user->address->name;

});

Route::get('/delete', function () {

    $user = User::findOrFail(1);

    $user->address()->delete();

});