<?php

namespace App\Http\Controllers;

use App\PengajuanPembelian;
use App\PengajuanSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use PDF;

class PengajuanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_pembelians = PengajuanPembelian::all();
        $pengajuan_sewas = PengajuanSewa::where('approval', 'Approved')->where('status', 'Approved')->get();
        $approval_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Proses Approval')->get();
        $revisi_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Reject')->get();
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return view('admin.pengajuanpembelian.index', compact('pengajuan_pembelians', 'pengajuan_sewas', 'revisi_pengajuan_pembelians'));
            } else if ($user->role == 'Pengurus') {
                return view('pengurus.pengajuanpembelian.index', compact('pengajuan_pembelians', 'approval_pengajuan_pembelians'));
            } else if ($user->role == 'Akuntan') {
                return view('akuntan.pengajuanpembelian.index', compact('pengajuan_pembelians'));
            }
        }
        return view('auth.login');
    }

    public function revisi()
    {
        $pengajuan_pembelians = PengajuanPembelian::where('approval', 'Reject')->get();
        return view('admin.PengajuanPembelian.revisi', compact('pengajuan_pembelians'));
    }

    public function cetak_pdf()
    {
    	$pengajuan_pembelians = PengajuanPembelian::all();
 
    	$pdf = PDF::loadview('admin.PengajuanPembelian.pdf', compact('pengajuan_pembelians'));
    	return $pdf->download('laporan-pengajuanpembelian-pdf');
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
        return view('admin.pengajuanpembelian.create', compact('pengajuan_sewas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PengajuanPembelian::create($request->all());
        $id_sppk = $request->input('id_sppk');
        $id_sppk = PengajuanSewa::findOrFail($id_sppk);
        $id_sppk->status = 'Proses Pembelian';
        $id_sppk->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('success', 'Pengajuan Pembelian Kendaraan berhasil di Tambahkan, Menunggu Approval dari Pengurus');
        return redirect('pengajuanpembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_pengajuanpembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengajuanpembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pengajuanpembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengajuanpembelian)
    {
        $pengajuan_pembelian = PengajuanPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();

        return view('admin.PengajuanPembelian.edit', compact('pengajuan_pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pengajuanpembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengajuanpembelian)
    {
        $pengajuan_pembelian = PengajuanPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();
        $pengajuan_pembelian->fill($request->all());
        $pengajuan_pembelian->approval = 'Proses Approval';
        $pengajuan_pembelian->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('pengajuanpembelian.index', $pengajuan_pembelian->id_pengajuanpembelian)->with('success', 'Data pengajuan pembelian berhasil direvisi.');
    }

    public function approved(Request $request, $id_pengajuanpembelian)
    {
        // Cari kendaraan berdasarkan nomor polisi
        $pengajuan_pembelian = PengajuanPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();

        
        $pengajuan_pembelian->approval = 'Approved';
        $pengajuan_pembelian->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Pengajuan Pembelian Kendaraan berhasil di Approve');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Pengajuan Pembelian Kendaraan diapprove');
    }

    public function reject(Request $request, $id_pengajuanpembelian)
    {
        // Cari kendaraan berdasarkan nomor polisi
        $pengajuan_pembelian = PengajuanPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->first();

        $pengajuan_pembelian->approval = 'Reject';
        $pengajuan_pembelian->update($request->all());
        $pengajuan_pembelian->save();

        // Tambahkan pesan berhasil ke session
        session()->flash('reject', 'Pengajuan Pembelian Kendaraan berhasil di Reject');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Pengajuan Pembelian Kendaraan direject');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pengajuanpembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengajuanpembelian)
    {
        //
    }
}
