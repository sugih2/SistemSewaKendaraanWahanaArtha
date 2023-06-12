<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kendaraan;
use App\BPKB;
use App\STNK;
use App\KIR;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Pengurus') {
            $kendaraans = Kendaraan::where('approval', 'Proses Approval')->get();
            return view('pengurus.kendaraan.index', compact('kendaraans'));
        } else {
            $kendaraans = Kendaraan::where('approval', 'Approved')->get();
            return view('admin.kendaraan.index', compact('kendaraans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kendaraan::create($request->all());
        BPKB::create($request->all());
        STNK::create($request->all());
        KIR::create($request->all());
        return redirect('kendaraan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_polisi)
    {
        $kendaraan = Kendaraan::where('no_polisi', $no_polisi)->first();
    
        // Jika kendaraan dengan nomor polisi tersebut ditemukan
        if ($kendaraan) {
            return view('pengurus.kendaraan.detail', compact('kendaraan'));
        } else {
            // Jika kendaraan tidak ditemukan, Anda dapat melakukan tindakan yang sesuai, misalnya menampilkan pesan error atau mengarahkan ke halaman lain
            abort(404, 'Kendaraan tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('pengurus.kendaraan.detail', compact('kendaraan'));
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
        //$kendaraans->update($request->all());
        //return redirect('kendaraans');
    }

    public function approved(Request $request, $no_polisi)
    {
        // Cari kendaraan berdasarkan nomor polisi
        $kendaraan = Kendaraan::where('no_polisi', $no_polisi)->first();
        $kir = KIR::where('no_polisi', $no_polisi)->first();
        $bpkb = BPKB::where('no_polisi', $no_polisi)->first();
        $stnk = STNK::where('no_polisi', $no_polisi)->first();

        // Lakukan validasi apakah kendaraan ditemukan atau tidak
        if (!$kendaraan) {
            // Jika tidak ditemukan, lakukan tindakan sesuai kebutuhan (misalnya, tampilkan pesan error)
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan');
        }

        if (!$kir) {
            // Ubah status kendaraan menjadi "Sudah Approve"
            $kendaraan->approval = 'Approved';
            $kendaraan->save();
            $bpkb->approval = 'Approved';
            $bpkb->save();
            $stnk->approval = 'Approved';
            $stnk->save();
        } else {
            // Ubah status kendaraan menjadi "Sudah Approve"
            $kendaraan->approval = 'Approved';
            $kendaraan->save();
            $bpkb->approval = 'Approved';
            $bpkb->save();
            $stnk->approval = 'Approved';
            $stnk->save();
            $kir->approval = 'Approved';
            $kir->save();
        }

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Kendaraan berhasil diapprove');
    }

    public function reject(Request $request, $no_polisi)
    {
        // Cari kendaraan berdasarkan nomor polisi
        $kendaraan = Kendaraan::where('no_polisi', $no_polisi)->first();

        // Lakukan validasi apakah kendaraan ditemukan atau tidak
        if (!$kendaraan) {
            // Jika tidak ditemukan, lakukan tindakan sesuai kebutuhan (misalnya, tampilkan pesan error)
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan');
        }

        // Ambil keterangan dari form input
        $keterangan = $request->input('keterangan');

        // Ubah status kendaraan menjadi "Reject"
        $kendaraan->status = 'Reject';

        // Simpan keterangan di kolom keterangan
        $kendaraan->keterangan = $keterangan;

        $kendaraan->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Kendaraan berhasil direject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$kendaraans->delete();
        //return redirect('kendaraans');
    }
}
