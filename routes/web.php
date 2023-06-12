<?php

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
    return view('auth/login');
});

Auth::routes();

// Route::get('/', 'HomeController@dashboard');
Route::get('/home', 'HomeController@dashboard')->name('home');

Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');