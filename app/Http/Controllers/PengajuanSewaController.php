<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanSewa;
use Illuminate\Support\Facades\Auth;
use App\User;

class PengajuanSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_sewas = PengajuanSewa::all();
        $proses_pengajuan_sewas = PengajuanSewa::where('approval', 'Proses Approval')->get();
        $revisi_pengajuan_sewas = PengajuanSewa::where('approval', 'Reject')->get();
        if (Auth::user()->role == 'Admin') {
            return view('admin.SPPK.index', compact('pengajuan_sewas', 'revisi_pengajuan_sewas'));
        } else if (Auth::user()->role == 'Pengurus') {
            return view('pengurus.SPPK.index', compact('pengajuan_sewas', 'proses_pengajuan_sewas'));
        } else if (Auth::user()->role == 'Akuntan') {
            return view('akuntan.SPPK.index', compact('pengajuan_sewas'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.SPPK.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['approval'] = 'Proses Approval';
        $data['status'] = 'Proses Approval';

        PengajuanSewa::create($data);

        // Tambahkan pesan berhasil ke session
        session()->flash('success', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Tambahkan, Menunggu Approval dari Pengurus');
        return redirect('sppk');
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
    public function edit($id_sppk)
    {
        $pengajuan_sewa = PengajuanSewa::where('id_sppk', $id_sppk)->first();

        return view('admin.SPPK.edit', compact('pengajuan_sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sppk)
    {
        $pengajuan_sewa = PengajuanSewa::where('id_sppk', $id_sppk)->first();
        $pengajuan_sewa->fill($request->all());
        $pengajuan_sewa->approval = 'Proses Approval';
        $pengajuan_sewa->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->route('sppk.index')->with('success', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Revisi');
    }

    public function approved(Request $request, $id_sppk)
    {
        $pengajuan_sewa = PengajuanSewa::where('id_sppk', $id_sppk)->first();

        $pengajuan_sewa->approval = 'Approved';
        $pengajuan_sewa->status = 'Approved';
        $pengajuan_sewa->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Approve');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Approve');
    }
    public function reject(Request $request, $id_sppk)
    {
        $pengajuan_sewa = PengajuanSewa::where('id_sppk', $id_sppk)->first();

        $pengajuan_sewa->approval = 'Reject';
        $pengajuan_sewa->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('reject', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Reject');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('reject', 'Surat Pemesanan Penyewaan Kendaraan berhasil di Reject');
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
