<?php

namespace App\Http\Controllers;

use App\TransaksiPembelian;
use App\PengajuanPembelian;
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
        $proses_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Proses Approval')->get();
        $proses_transaksi_pembelians = TransaksiPembelian::where('approval', 'Proses Approval')->get();
        $pengajuan_pembelians = PengajuanPembelian::where('approval', 'Approved')->where('status_transaksi', 'Belum Dibayar')->get();
        $all_transaksi_pembelians = TransaksiPembelian::all();
        $all_pengajuan_pembelians = PengajuanPembelian::all();
        $revisi_transaksi_pembelians = TransaksiPembelian::where('approval', 'Reject')->get();
        $revisi_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Reject')->get();
        $approved_transaksi_pembelians = TransaksiPembelian::where('approval', 'Approved')->get();
        $approved_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Approved')->get();
        return view ('admin.TransaksiPembelian.index', compact('pengajuan_pembelians', 'all_transaksi_pembelians', 'revisi_transaksi_pembelians', 'proses_pengajuan_pembelians', 'proses_transaksi_pembelians', 'revisi_pengajuan_pembelians', 'approved_transaksi_pembelians', 'approved_pengajuan_pembelians', 'all_pengajuan_pembelians'));
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
    public function create(Request $request)
    {
        
        $id_pengajuanpembelian = $request->input('id_pengajuanpembelian');
        $pengajuan_pembelian = PengajuanPembelian::findOrFail($id_pengajuanpembelian);
        // ...

        return view('admin.transaksipembelian.create', compact('pengajuan_pembelian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_pengajuanpembelian = $request->input('id_pengajuanpembelian');
        $pengajuan_pembelian = PengajuanPembelian::findOrFail($id_pengajuanpembelian);
        $pengajuan_pembelian->status_transaksi = 'Proses Bayar';
        $pengajuan_pembelian->save();
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
    public function edit($id_transaksipembelian)
    {
        $transaksi_pembelian = TransaksiPembelian::where('id_transaksipembelian', $id_transaksipembelian)->first();

        return view('admin.TransaksiPembelian.edit', compact('transaksi_pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksipembelian)
    {
        $transaksi_pembelian = TransaksiPembelian::where('id_transaksipembelian', $id_transaksipembelian)->first();
        $transaksi_pembelian->fill($request->all());
        $transaksi_pembelian->approval = 'Proses Approval';
        $transaksi_pembelian->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('transaksipembelian.index', $transaksi_pembelian->id_transaksipembelian)->with('success', 'Data Transaksi pembelian berhasil direvisi.');
    }

    public function approved(Request $request, $id_pengajuanpembelian)
    {
        $pengajuan_pembelian = PengajuanPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();
        $transaksi_pembelian = TransaksiPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();

        $pengajuan_pembelian->status_transaksi = 'Sudah Dibayar';
        $pengajuan_pembelian->save();
        $transaksi_pembelian->approval = 'Approved';
        $transaksi_pembelian->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Transaksi Pembelian Kendaraan berhasil di Approve');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Transaksi Pembelian Kendaraan diapprove');
    }

    public function reject(Request $request, $id_transaksipembelian)
    {
        $transaksi_pembelian = TransaksiPembelian::where('id_transaksipembelian', $id_transaksipembelian)->first();
        
        $transaksi_pembelian->approval = 'Reject';
        $transaksi_pembelian->save();
        $transaksi_pembelian->update($request->all());

        // Tambahkan pesan berhasil ke session
        session()->flash('reject', 'Transaksi Pembelian Kendaraan berhasil di Reject');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Transaksi Pembelian Kendaraan direject');
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
