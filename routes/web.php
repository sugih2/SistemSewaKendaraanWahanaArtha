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
    Route::put('/approved/{id_pengajuanpembelian}', 'PengajuanPembelianController@approved')->name('pengajuanpembelian.approved');
    Route::put('/reject/{id_pengajuanpembelian}', 'PengajuanPembelianController@reject')->name('pengajuanpembelian.reject');
    Route::get('/revisi', 'PengajuanPembelianController@revisi')->name('pengajuanpembelian.revisi');
    Route::get('/{id_pengajuanpembelian}/edit', 'PengajuanPembelianController@edit')->name('pengajuanpembelian.edit');
    Route::put('/{id_pengajuanpembelian}', 'PengajuanPembelianController@update')->name('pengajuanpembelian.update');
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


// Route Transaksi Pembelian
Route::prefix('transaksipembelian')->group(function () {
    Route::get('/create/{id_pengajuanpembelian}', [TransaksiPembelianController::class, 'create'])->name('transaksipembelian.create');
    Route::get('/approval', 'TransaksiPembelianController@approval')->name('transaksipembelian.approval');
    Route::get('/{id_transaksipembelian}/edit', 'TransaksiPembelianController@edit')->name('transaksipembelian.edit');
    Route::put('/approved/{id_pengajuanpembelian}', 'TransaksiPembelianController@approved')->name('transaksipembelian.approved');
    Route::put('/{id_transaksipembelian}/reject', 'TransaksiPembelianController@reject')->name('transaksipembelian.reject');
});


Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');