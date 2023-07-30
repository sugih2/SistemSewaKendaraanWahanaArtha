<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KontrakSewa;
use App\Kendaraan;
use App\PengajuanSewa;
use App\Penyewa;
use App\Pemakai;
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
        $penyewas = penyewa::all();
        $pemakais = Pemakai::all();
        $kendaraans = Kendaraan::all();
        $pengajuan_sewas = PengajuanSewa::where('approval', 'Approved')->where('status', 'Proses Pembelian')->get();
        $proses_kontrak_sewas = KontrakSewa::where('approval', 'Proses Approval')->get();
        $revisi_kontrak_sewas = KontrakSewa::where('approval', 'Reject')->get();
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return view('admin.kontraksewa.index', compact('kontrak_sewas', 'pengajuan_sewas', 'revisi_kontrak_sewas'));
            } else if ($user->role == 'Pengurus') {
                return view('pengurus.KontrakSewa.index', compact('kontrak_sewas', 'proses_kontrak_sewas', 'penyewas', 'pemakais', 'kendaraans'));
            } else if ($user->role == 'Akuntan') {
                return view('akuntan.KontrakSewa.index', compact('kontrak_sewas'));
            }
        }
        return view('auth.login');
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
        // Cari atau buat data penyewa berdasarkan nama_pt dan nama_cabang
        $penyewa = Penyewa::firstOrCreate([
            'nama_pt' => $request->nama_pt,
            'nama_cabang' => $request->nama_cabang
        ], [
            'alamat' => $request->alamat,
            'status' => 'Proses Approval'
        ]);

        // Cari atau buat data pemakai berdasarkan nama dan jabatan
        $pemakai = Pemakai::firstOrCreate(
            ['nama' => $request->nama, 'jabatan' => $request->jabatan],
            [
                'no_hp' => $request->no_hp,
                'id_penyewa' => $penyewa->id_penyewa,
                'status' => 'Proses Approval'
            ]
        );

        // Buat KontrakSewa baru dan simpan ke database dengan menggunakan id penyewa dan pemakai yang telah dibuat
        $kontrakSewa = KontrakSewa::create([
            'no_polisi' => $request->no_polisi,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'tgl_sewa' => $request->tgl_sewa,
            'biaya_sewa' => $request->biaya_sewa,
            'id_penyewa' => $penyewa->id_penyewa,
            'id_pemakai' => $pemakai->id_pemakai,
            'id_sppk' => $request->id_sppk,
            'status' => 'Proses Approval',
            'approval' => 'Proses Approval'
        ]);

        $kendaraans = Kendaraan::where('no_polisi', $request->no_polisi)->first();
        $kendaraans->status = 'Proses Kontrak Sewa';
        $kendaraans->save();

        $sppks = PengajuanSewa::where('id_sppk', $request->id_sppk)->first();
        $sppks->status = 'Sudah Kontrak Sewa';
        $sppks->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->route('kontraksewa.index')->with('success', 'Kontrak Sewa berhasil dibuat, menunggu approval dari pengurus');
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
    public function edit($id_kontraksewa)
    {
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $id_kontraksewa)->first();
        $pengajuansewa = PengajuanSewa::where('id_sppk', $kontraksewa->id_sppk)->first();
        $penyewa = penyewa::where('id_penyewa', $kontraksewa->id_penyewa)->first();
        $pemakai = Pemakai::where('id_pemakai', $kontraksewa->id_pemakai)->first();
        $kendaraans = Kendaraan::where('status', 'Stock')->get();
        return view('admin.kontraksewa.edit', compact('kontraksewa', 'pengajuansewa', 'penyewa', 'pemakai', 'kendaraans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kontraksewa)
    {
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Kontrak Sewa berhasil di Revisi, Menunggu approval dari Pengurus');
    }

    public function reject(Request $request, $id_kontraksewa)
    {
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $id_kontraksewa)->first();
        $penyewa = Penyewa::where('id_penyewa', $kontraksewa->id_penyewa)->first();
        $pemakai = Pemakai::where('id_pemakai', $kontraksewa->id_pemakai)->first();
        $kendaraan = Kendaraan::where('no_polisi', $kontraksewa->no_polisi)->first();

        $kontraksewa->approval = 'Reject';
        $kontraksewa->keterangan = $request->keterangan;
        $kontraksewa->save();
        $penyewa->status = 'Reject';
        $penyewa->save();
        $pemakai->status = 'Reject';
        $pemakai->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('reject', 'Kontrak Sewa berhasil di Reject');

    }

    public function approved(Request $request, $id_kontraksewa)
    {
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $id_kontraksewa)->first();
        $penyewa = Penyewa::where('id_penyewa', $kontraksewa->id_penyewa)->first();
        $pemakai = Pemakai::where('id_pemakai', $kontraksewa->id_pemakai)->first();
        $kendaraan = Kendaraan::where('no_polisi', $kontraksewa->no_polisi)->first();

        $kontraksewa->approval = 'Approved';
        $kontraksewa->save();
        $penyewa->status = 'Sudah Kontrak Sewa';
        $penyewa->save();
        $pemakai->status = 'Sudah Kontrak Sewa';
        $penyewa->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Kontrak Sewa berhasil di Approve');
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
