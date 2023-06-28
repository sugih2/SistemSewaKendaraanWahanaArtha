<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KontrakSewa;
use App\Kendaraan;
use App\PengajuanSewa;
use Illuminate\Support\Facades\Auth;
use App\User;

class KontrakSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrak_sewas = KontrakSewa::all();
        $pengajuan_sewas = PengajuanSewa::where('approval', 'Approved')->get();
        $revisi_kontrak_sewas = KontrakSewa::where('approval', 'Reject')->get();
        if (Auth::user()->role == 'Admin') {
            return view('admin.kontraksewa.index', compact('kontrak_sewas', 'pengajuan_sewas', 'revisi_kontrak_sewas'));
        } else if (Auth::user()->role == 'Pengurus') {
            return view('pengurus.KontrakSewa.index', compact('kontrak_sewas'));
        } else if (Auth::user()->role == 'Akuntan') {
            return view('akuntan.KontrakSewa.index', compact('kontrak_sewas'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_sppk = $request->input('id_sppk');
        $pengajuan_sewas = PengajuanSewa::findOrFail($id_sppk);
        $kendaraans = Kendaraan::where('status', 'Stock')->get();
        return view('admin.KontrakSewa.create', compact('kendaraans', 'pengajuan_sewas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
