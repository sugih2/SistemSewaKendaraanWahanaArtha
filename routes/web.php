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

Route::get('/bpkb/{id}/edit', 'BpkbController@edit')->name('bpkb.edit');
Route::put('/kendaraan/{id}/approved', 'KendaraanController@approved')->name('kendaraan.approved');
Route::put('/kendaraan/{id}/reject', 'KendaraanController@reject')->name('kendaraan.reject');
Route::put('/bpkb/{id}', 'BpkbController@update')->name('bpkb.update');

Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');