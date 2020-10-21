<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Http::put('http://192.168.2.23/api/7lA86r1P9LnQKPLhyFiU2sJGIgX54Nn1U0CuIlc3/lights/3/state', [
    //     'on' => true,
    //     'hue' => 65535,
    //     'sat' => 255,
    //     'bri' => 20,
    // ]);

    return view('welcome');
});
