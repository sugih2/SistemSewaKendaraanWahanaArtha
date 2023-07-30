<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\STWahanatoCabang;
use App\KontrakSewa;
use App\Penyewa;
use App\Pemakai;
use App\Kendaraan;
use Illuminate\Support\Facades\Auth;
use App\User;

class STWahanatoCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian_kontrak_sewas = KontrakSewa::where('approval', 'Approved')->where('status', 'Proses Approval')->get();
        $stwahanatocabangs = STWahanatoCabang::all();
        $proses_stwahanatocabangs = STWahanatoCabang::where('approval', 'Proses Approval')->get();
        $reject_stwahanatocabangs = STWahanatoCabang::where('approval', 'Rejected')->get();
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return view('admin.STWahanatoCabang.index', compact('antrian_kontrak_sewas', 'stwahanatocabangs', 'reject_stwahanatocabangs'));
            } else if ($user->role == 'Pengurus') {
                return view('pengurus.STWahanatoCabang.index', compact('proses_stwahanatocabangs', 'stwahanatocabangs'));
            } else if ($user->role == 'Akuntan') {
                return view('akuntan.STWahanatoCabang.index');
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
        $id_kontraksewa = $request->input('id_kontraksewa');
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $id_kontraksewa)->first();
        $penyewa = Penyewa::where('id_penyewa', $kontraksewa->id_penyewa)->first();
        $pemakai = Pemakai::where('id_pemakai', $kontraksewa->id_pemakai)->first();
        $kendaraan = Kendaraan::where('no_polisi', $kontraksewa->no_polisi)->first();
        return view('admin.STWahanatoCabang.create', compact('kontraksewa', 'penyewa', 'pemakai', 'kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        STWahanatoCabang::create([
            'no_polisi' => $request->no_polisi,
            'id_penyewa' => $request->id_penyewa,
            'id_pemakai' => $request->id_pemakai,
            'id_kontraksewa' => $request->id_kontraksewa,
            'tgl_st' => $request->tgl_st,
            'nama_penyerah' => $request->nama_penyerah,
            'nama_penerima' => $request->nama_penerima,
            'status' => 'Proses Approval',
            'approval' => 'Proses Approval'
        ]);

        $kontraksewa = KontrakSewa::where('id_kontraksewa', $request->id_kontraksewa)->first();
        $kontraksewa->status = 'Proses Serah Terima';
        $kontraksewa->save();

        $kendaraan = Kendaraan::where('no_polisi', $request->no_polisi)->first();
        $kendaraan->status = 'Proses Serah terima';
        $kendaraan->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->route('stwahanatocabang.index')->with('success', 'Berita Acara Serah Terima Kendaraan berhasil di Tambahkan, Menunggu Approval dari Pengurus');
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
    public function edit($id_stwahanatocabang)
    {
        $stwahanatocabang = STWahanatoCabang::where('id_stwahanatocabang', $id_stwahanatocabang)->first();
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $stwahanatocabang->id_kontraksewa)->first();
        $penyewa = Penyewa::where('id_penyewa', $stwahanatocabang->id_penyewa)->first();
        $pemakai = Pemakai::where('id_pemakai', $stwahanatocabang->id_pemakai)->first();
        $kendaraan = Kendaraan::where('no_polisi', $stwahanatocabang->no_polisi)->first();
        return view('admin.STWahanatoCabang.edit', compact('stwahanatocabang', 'kontraksewa', 'penyewa', 'pemakai', 'kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_stwahanatocabang)
    {
        $stwahanatocabang = STWahanatoCabang::where('id_stwahanatocabang', $id_stwahanatocabang)->first();
        $stwahanatocabang->tgl_st = $request->tgl_st;
        $stwahanatocabang->nama_penyerah = $request->nama_penyerah;
        $stwahanatocabang->nama_penerima = $request->nama_penerima;
        $stwahanatocabang->approval = 'Proses Approval';
        $stwahanatocabang->status = 'Proses Approval';
        $stwahanatocabang->save();

        $kontraksewa = KontrakSewa::where('id_kontraksewa', $request->id_kontraksewa)->first();
        $kontraksewa->status = 'Proses Serah Terima';
        $kontraksewa->save();

        $kendaraan = Kendaraan::where('no_polisi', $request->no_polisi)->first();
        $kendaraan->status = 'Proses Serah terima';
        $kendaraan->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->route('stwahanatocabang.index')->with('success', 'Berita Acara Serah Terima Kendaraan berhasil di Revisi, Menunggu Approval dari Pengurus');
    }

    public function approved(Request $request, $id_stwahanatocabang)
    {
        $stwahanatocabang = STWahanatoCabang::where('id_stwahanatocabang', $id_stwahanatocabang)->first();
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $stwahanatocabang->id_kontraksewa)->first();
        $kendaraan = Kendaraan::where('no_polisi', $stwahanatocabang->no_polisi)->first();
        $penyewa = Penyewa::where('id_penyewa', $stwahanatocabang->id_penyewa)->first();
        $stwahanatocabang->approval = 'Approved';
        $stwahanatocabang->status = 'Sudah Serah Terima';
        $stwahanatocabang->save();

        $kontraksewa->status = 'Sewa Berjalan';
        $kontraksewa->save();

        $kendaraan->status = 'Disewa';
        $kendaraan->lokasi = $penyewa->nama_cabang;
        $kendaraan->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Serah Terima Kendaraan berhasil di Approve');
    }

    public function Reject(Request $request, $id_stwahanatocabang)
    {
        $stwahanatocabang = STWahanatoCabang::where('id_stwahanatocabang', $id_stwahanatocabang)->first();
        $kontraksewa = KontrakSewa::where('id_kontraksewa', $stwahanatocabang->id_kontraksewa)->first();
        $kendaraan = Kendaraan::where('no_polisi', $stwahanatocabang->no_polisi)->first();
        $penyewa = Penyewa::where('id_penyewa', $stwahanatocabang->id_penyewa)->first();
        $stwahanatocabang->approval = 'Rejected';
        $stwahanatocabang->keterangan = $request->keterangan;
        $stwahanatocabang->save();

        $kontraksewa->status = 'Serah Terima Rejected';
        $kontraksewa->save();

        $kendaraan->status = 'Serah Terima Rejected';
        $kendaraan->save();

        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Serah Terima Kendaraan berhasil di Reject');
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
