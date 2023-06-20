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

Route::get('/pengajuanpembelian/approval', 'PengajuanPembelianController@approval')->name('pengajuanpembelian.approval');
Route::get('/pengajuanpembelian/approved/{id}', 'PengajuanPembelianController@approved')->name('pengajuanpembelian.approved');
Route::put('/pengajuanpembelian/{id}/reject', 'PengajuanPembelianController@reject')->name('pengajuanpembelian.reject');
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');

Route::get('/transaksipembelian/approval', 'TransaksiPembelianController@approval')->name('transaksipembelian.approval');
Route::get('/transaksipembelian/approved/{id}', 'TransaksiPembelianController@approved')->name('transaksipembelian.approved');
Route::put('/transaksipembelian/{id}/reject', 'TransaksiPembelianController@reject')->name('transaksipembelian.reject');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');

Route::get('/kendaraan/revisi', 'KendaraanController@revisi')->name('kendaraan.revisi');
Route::get('/kendaraan/approval', 'KendaraanController@approval')->name('kendaraan.approval');
Route::get('/kendaraan/{no_polisi}/edit', 'KendaraanController@edit')->name('kendaraan.edit');
Route::get('/kendaraan/approved/{no_polisi}', 'KendaraanController@approved')->name('kendaraan.approved');
Route::put('/kendaraan/{id}/reject', 'KendaraanController@reject')->name('kendaraan.reject');
Route::put('/kendaraan/{id}', 'KendaraanController@update')->name('kendaraan.update');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');