<?php

namespace App\Http\Controllers;

use App\TransaksiPembelian;
use Illuminate\Http\Request;

class TransaksiPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi_pembelians = TransaksiPembelian::all();
        return view ('admin.transaksipembelian.index', compact('transaksi_pembelians'));
    }

    public function approval()
    {
        $transaksi_pembelians = TransaksiPembelian::where('approval', 'Proses Approval')->get();
        return view('pengurus.TransaksiPembelian.approval', compact('transaksi_pembelians'));
    }

    public function revisi()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaksipembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TransaksiPembelian::create($request->all());

        // Tambahkan pesan berhasil ke session
        session()->flash('success', 'Transaksi Pembelian Kendaraan berhasil di Tambahkan, Menunggu Approval dari Pengurus');
        return redirect('transaksipembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function approved(Request $request, $id)
    {
        // Cari kendaraan berdasarkan nomor polisi
        $transaksi_pembelian = TransaksiPembelian::where('id', $id)->first();

        
        $transaksi_pembelian->approval = 'Approved';
        $transaksi_pembelian->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Transaksi Pembelian Kendaraan berhasil di Approve');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Transaksi Pembelian Kendaraan diapprove');
    }

    public function reject(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
