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
            $kendaraans = Kendaraan::where('approval', 'Approved')->get();
            return view('pengurus.kendaraan.index', compact('kendaraans'));
        } else {
            $kendaraans = Kendaraan::where('approval', 'Approved')->get();
            return view('admin.kendaraan.index', compact('kendaraans'));
        }
    }

    public function approval()
    {
        $kendaraans = Kendaraan::where('approval', 'Proses Approval')->get();
        return view('pengurus.Kendaraan.approval', compact('kendaraans'));
    }

    public function revisi()
    {
        $kendaraans = Kendaraan::where('approval', 'Reject')->get();
        return view('admin.kendaraan.revisi', compact('kendaraans'));
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
        // Tambahkan pesan berhasil ke session
        session()->flash('success', 'Data berhasil di Tambahkan, Menunggu Approval dari Pengurus');
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
    public function edit($no_polisi)
    {
        $kendaraan = Kendaraan::where('no_polisi', $no_polisi)->first();
        $bpkb = BPKB::find($kendaraan->no_polisi);
        $bpkp = BPKB::where('no_polisi', $kendaraan->no_polisi)->first();
        $stnk = STNK::where('no_polisi', $kendaraan->no_polisi)->first();
        $kir = KIR::where('no_polisi', $kendaraan->no_polisi)->first();
        return view('admin.kendaraan.edit', compact('kendaraan', 'bpkp', 'stnk', 'kir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_polisi)
    {
        // // Validasi input jika diperlukan
        // $validatedData = $request->validate([
        //     'jenis' => 'required',
        //     'no_polisi' => 'required',
        //     'merk' => 'required',
        //     // Daftar field lainnya untuk Kendaraan
        //     'nama_bpkb' => 'required',
        //     'posisi_bpkb' => 'required',
        //     // Daftar field lainnya untuk BPKB
        //     'tanggal_jt_stnk' => 'required|date',
        //     'tanggal_bayar_stnk' => 'required|date',
        //     'biaya_stnk' => 'required',
        //     // Daftar field lainnya untuk STNK
        //     'tanggal_jt_kir' => 'required|date',
        //     'tanggal_bayar_kir' => 'required|date',
        //     'biaya_kir' => 'required',
        //     // Daftar field lainnya untuk KIR
        // ]);

        // Update data kendaraan
        $kendaraan = Kendaraan::where('no_polisi', $no_polisi)->first();
        $kendaraan->no_polisi = $request->no_polisi;
        $kendaraan->jenis = $request->jenis;
        $kendaraan->merk = $request->merk;
        $kendaraan->approval = 'Proses Approval';
        // Update field lainnya untuk Kendaraan

        // Simpan perubahan pada model Kendaraan
        $kendaraan->save();

        // Update data BPKB
        $bpkb = BPKB::where('no_polisi', $kendaraan->no_polisi)->first();
        $bpkb->nama_bpkb = $request->nama_bpkb;
        $bpkb->posisi_bpkb = $request->posisi_bpkb;
        $bpkb->approval = 'Proses Approval';
        // Update field lainnya untuk BPKB
        $bpkb->save();

        // Update data STNK
        $stnk = STNK::where('no_polisi', $kendaraan->no_polisi)->first();
        $stnk->tanggal_jt_stnk = $request->tanggal_jt_stnk;
        $stnk->tanggal_bayar_stnk = $request->tanggal_bayar_stnk;
        $stnk->biaya_stnk = $request->biaya_stnk;
        $stnk->approval = 'Proses Approval';
        // Update field lainnya untuk STNK
        $stnk->save();

        // Update data KIR
        $kir = KIR::where('no_polisi', $kendaraan->no_polisi)->first();
        $kir->tanggal_jt_kir = $request->tanggal_jt_kir;
        $kir->tanggal_bayar_kir = $request->tanggal_bayar_kir;
        $kir->biaya_kir = $request->biaya_kir;
        $kir->approval = 'Proses Approval';
        // Update field lainnya untuk KIR
        $kir->save();

        // Lakukan validasi apakah kendaraan ditemukan atau tidak
        if (!$kendaraan) {
            // Jika tidak ditemukan, lakukan tindakan sesuai kebutuhan (misalnya, tampilkan pesan error)
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan');
        }

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('kendaraan.revisi', $kendaraan->no_polisi)->with('success', 'Data kendaraan berhasil diperbarui.');
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

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Kendaraan berhasil di Approve, Tambah kendaraan Berhasil di Setujui');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Kendaraan berhasil diapprove');
    }

    public function reject(Request $request, $no_polisi)
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
            $kendaraan->approval = 'Reject';
            $kendaraan->save();
            $bpkb->approval = 'Reject';
            $bpkb->save();
            $stnk->approval = 'Reject';
            $stnk->save();
        } else {
            // Ubah status kendaraan menjadi "Sudah Approve"
            $kendaraan->approval = 'Reject';
            $kendaraan->save();
            $bpkb->approval = 'Reject';
            $bpkb->save();
            $stnk->approval = 'Reject';
            $stnk->save();
            $kir->approval = 'Reject';
            $kir->save();
        }
        $kendaraan->update($request->all());

        // Tambahkan pesan berhasil ke session
        session()->flash('reject', 'Data berhasil di Reject, Menunggu Revisi dari Admin');
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
