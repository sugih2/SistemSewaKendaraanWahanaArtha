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
    Route::get('/cetak_pdf', 'PengajuanPembelianController@cetak_pdf')->name('pengajuanpembelian.pdf');
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

Route::prefix('stdealertowahana')->group(function () {
    Route::get('/create/{id_transaksipembelian}', 'STDealertoWahanaController@create')->name('stdealertowahana.create');
    Route::put('/approved/{no_polisi}', 'STDealertoWahanaController@approved')->name('stdealertowahana.approved');
    Route::put('/{no_polisi}/reject', 'STDealertoWahanaController@reject')->name('stdealertowahana.reject');
    Route::get('/{no_polisi}/edit', 'STDealertoWahanaController@edit')->name('stdealertowahana.edit');
});

Route::prefix('kontraksewa')->group(function () {
    Route::get('/create', 'KontrakSewaController@create')->name('kontraksewa.create');
    Route::put('/approved/{id_kontraksewa}', 'KontrakSewaController@approved')->name('kontraksewa.approved');
    Route::put('/{id_kontraksewa}/reject','KontrakSewaController@reject')->name('kontraksewa.reject');
    Route::get('/{id_kontraksewa}/edit', 'KontrakSewaController@edit')->name('kontraksewa.edit');
});

Route::prefix('sppk')->group(function () {
    Route::get('/create', 'PengajuanSewaController@create')->name('sppk.create');
    Route::put('/approved/{id_sppk}', 'PengajuanSewaController@approved')->name('sppk.approved');
    Route::put('/{id_sppk}/reject', 'PengajuanSewaController@reject')->name('sppk.reject');
    Route::get('/{id_sppk}/edit', 'PengajuanSewaController@edit')->name('sppk.edit');
});

Route::prefix('stwahanatocabang')->group(function () {
    Route::get('/create', 'STWahanatoCabangController@create')->name('stwahanatocabang.create');
    Route::put('/approved/{id_stwahanatocabang}', 'STWahanatoCabangController@approved')->name('stwahanatocabang.approved');
    Route::put('/{id_stwahanatocabang}/reject', 'STWahanatoCabangController@Reject')->name('stwahanatocabang.reject');
    Route::get('/{id_stwahanatocabang}/edit', 'STWahanatoCabangController@edit')->name('stwahanatocabang.edit');
});

Route::prefix('pengembalian')->group(function () {
    Route::get('/create', 'PengembalianController@create')->name('pengembalian.create');
    Route::put('/approved/{id_pengembalian}', 'PengembalianController@approved')->name('pengembalian.approved');
    Route::put('{id_pengembalian}/reject', 'PengembalianController@reject')->name('pengembalian.reject');
    Route::get('{id_pengembalian}/edit', 'PengembalianController@edit')->name('pengembalian.edit');
});

Route::resource('/pengembalian', 'PengembalianController');
Route::resource('/stwahanatocabang', 'STWahanatoCabangController');
Route::resource('/sppk', 'PengajuanSewaController');
Route::resource('/kontraksewa', 'KontrakSewaController');
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');
Route::resource('/stdealertowahana', 'StdealertowahanaController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/service', 'ServiceController');
Route::resource('/bpkb', 'BpkbController');
Route::resource('/stnk', 'StnkController');
Route::resource('/kir', 'KirController');