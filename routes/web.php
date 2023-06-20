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

// Route Pengajuan Pembelian
Route::prefix('pengajuanpembelian')->group(function () {
    Route::get('/approval', 'PengajuanPembelianController@approval')->name('pengajuanpembelian.approval');
    Route::put('/approved/{id}', 'PengajuanPembelianController@approved')->name('pengajuanpembelian.approved');
    Route::put('/reject/{id}', 'PengajuanPembelianController@reject')->name('pengajuanpembelian.reject');
    Route::get('/revisi', 'PengajuanPembelianController@revisi')->name('pengajuanpembelian.revisi');
    Route::get('/{id}/edit', 'PengajuanPembelianController@edit')->name('pengajuanpembelian.edit');
    Route::put('/{id}', 'PengajuanPembelianController@update')->name('pengajuanpembelian.update');
});

// Route Kendaraan
Route::prefix('kendaraan')->group(function () {
    Route::get('/revisi', 'KendaraanController@revisi')->name('kendaraan.revisi');
    Route::get('/approval', 'KendaraanController@approval')->name('kendaraan.approval');
    Route::get('/{no_polisi}/edit', 'KendaraanController@edit')->name('kendaraan.edit');
    Route::get('/approved/{no_polisi}', 'KendaraanController@approved')->name('kendaraan.approved');
    Route::put('/{id}/reject', 'KendaraanController@reject')->name('kendaraan.reject');
    Route::put('/{id}', 'KendaraanController@update')->name('kendaraan.update');
    
});
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');
