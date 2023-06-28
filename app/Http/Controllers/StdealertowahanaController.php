<?php

namespace App\Http\Controllers;

use App\TransaksiPembelian;
use App\PengajuanPembelian;
use App\Kendaraan;
use App\STDealertoWahana;
use App\STNK;
use App\KIR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class STDealertoWahanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pengajuan_pembelians = PengajuanPembelian::all();
        $transaksi_pembelians = TransaksiPembelian::all();
        $stdealertowahanas = STDealertoWahana::all();
        $antrian_st = TransaksiPembelian::where('approval', 'Approved')->where('status_st', 'Proses Bayar')->get();
        $proses_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Proses Approval')->get();
        $proses_transaksi_pembelians = TransaksiPembelian::where('approval', 'Proses Approval')->get();
        $proses_stdealertowahanas = STDealertoWahana::where('approval', 'Proses Approval')->get();
        $revisi_transaksi_pembelians = TransaksiPembelian::where('approval', 'Reject')->get();
        $revisi_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Reject')->get();
        $revisi_stdealertowahanas = STDealertoWahana::where('approval', 'Reject')->get();
        $approved_transaksi_pembelians = TransaksiPembelian::where('approval', 'Approved')->get();
        $approved_pengajuan_pembelians = PengajuanPembelian::where('approval', 'Approved')->get();
        $approved_stdealertowahanas = STDealertoWahana::where('approval', 'Approved')->get();
        if (Auth::user()->role == 'Admin') {
            return view('admin.stdealertowahana.index', compact('antrian_st', 'stdealertowahanas', 'approved_stdealertowahanas', 'revisi_stdealertowahanas', 'proses_stdealertowahanas', 'pengajuan_pembelians', 'transaksi_pembelians', 'proses_pengajuan_pembelians', 'proses_transaksi_pembelians', 'revisi_transaksi_pembelians', 'revisi_pengajuan_pembelians', 'approved_transaksi_pembelians', 'approved_pengajuan_pembelians'));

        } else if (Auth::user()->role == 'Pengurus') {
            return view('pengurus.stdealertowahana.index', compact('stdealertowahanas', 'approved_stdealertowahanas', 'revisi_stdealertowahanas', 'proses_stdealertowahanas', 'pengajuan_pembelians', 'transaksi_pembelians', 'proses_pengajuan_pembelians', 'proses_transaksi_pembelians', 'revisi_transaksi_pembelians', 'revisi_pengajuan_pembelians', 'approved_transaksi_pembelians', 'approved_pengajuan_pembelians'));
        } else if (Auth::user()->role == 'Akuntan') {
            return view('pengurus.stdealertowahana.index', compact('stdealertowahanas', 'approved_stdealertowahanas', 'revisi_stdealertowahanas', 'proses_stdealertowahanas', 'pengajuan_pembelians', 'transaksi_pembelians', 'proses_pengajuan_pembelians', 'proses_transaksi_pembelians', 'revisi_transaksi_pembelians', 'revisi_pengajuan_pembelians', 'approved_transaksi_pembelians', 'approved_pengajuan_pembelians'));
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
        $id_transaksipembelian = $request->input('id_transaksipembelian');
        $pengajuan_pembelian = PengajuanPembelian::findOrFail($id_transaksipembelian);

        return view('admin.stdealertowahana.create', compact('pengajuan_pembelian'));
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

    $no_polisi = $request->input('no_polisi');
    $no_mesin = $request->input('no_mesin');
    $no_rangka = $request->input('no_rangka');
    $kategori = $request->input('kategori');
    $lokasi = $request->input('lokasi');
    
    $transaksi_pembelians = TransaksiPembelian::where('id_pengajuanpembelian', $id_pengajuanpembelian)->get();
    $transaksi_pembelian = $transaksi_pembelians->first(); // Mengambil objek pertama dari kumpulan
    
    if ($transaksi_pembelian) {
        $transaksi_pembelian->status_st = 'Sudah Serah Terima';
        $transaksi_pembelian->save();
    }
    $pengajuan_pembelian = PengajuanPembelian::findOrFail($id_pengajuanpembelian);

    // Menggunakan metode create() untuk membuat objek DataKendaraan baru dan mengisi nilainya
    Kendaraan::create([
        'merk' => $pengajuan_pembelian->merk,
        'tipe' => $pengajuan_pembelian->tipe,
        'tahun' => $pengajuan_pembelian->tahun,
        'warna' => $pengajuan_pembelian->warna,
        'deskripsi' => $pengajuan_pembelian->deskripsi,
        'harga_off' => $pengajuan_pembelian->harga,
        'bbn' => $pengajuan_pembelian->bbn,
        'otr' => $pengajuan_pembelian->otr,
        'karoseri' => $pengajuan_pembelian->karoseri,
        'total' => $pengajuan_pembelian->total,
        'tanggal_beli' => $pengajuan_pembelian->created_at,
        'kategori' => $kategori,
        'no_rangka' => $no_rangka,
        'no_mesin' => $no_mesin,
        'no_polisi' => $no_polisi,
        'lokasi' => $lokasi,
        'status' => 'Proses Approval',
        'approval' => 'Proses Approval'
    ]);
    
    // Jika kategori adalah "Komersil"
    if ($kategori == "Komersil") {
        // Simpan model STNK
        $stnk = new STNK;
        $stnk->no_polisi = $no_polisi;
        $stnk->tanggal_jt_stnk = $request->tanggal_jt_stnk;
        $stnk->tanggal_bayar_stnk = $request->tanggal_bayar_stnk;
        $stnk->biaya_stnk = $request->biaya_stnk;
        $stnk->approval = 'Proses Approval';
        $stnk->save();

        // Simpan model KIR
        $kir = new KIR;
        $kir->no_polisi = $no_polisi;
        $kir->tanggal_jt_kir = $request->tanggal_jt_kir;
        $kir->tanggal_bayar_kir = $request->tanggal_bayar_kir;
        $kir->biaya_kir = $request->biaya_kir;
        $kir->approval = 'Proses Approval';
        $kir->save();
    }
    // Jika kategori adalah "Passanger"
    elseif ($kategori == "Passanger") {
        // Simpan model STNK
        $stnk = new STNK;
        $stnk->no_polisi = $no_polisi;
        $stnk->tanggal_jt_stnk = $request->tanggal_jt_stnk;
        $stnk->tanggal_bayar_stnk = $request->tanggal_bayar_stnk;
        $stnk->biaya_stnk = $request->biaya_stnk;
        $stnk->approval = 'Proses Approval';
        $stnk->save();
    }

    // Simpan objek StdealertoWahana dari request input
    StdealertoWahana::create($request->all());

    session()->flash('success', 'Berita Acara Serah Terima Kendaraan berhasil di Tambahkan, Menunggu Approval dari Pengurus');
    return redirect('stdealertowahana');
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

    public function approved(Request $request, $no_polisi)
    {
        $stdealertowahanas = STDealertoWahana::where('no_polisi', $no_polisi)->first();
        $kendaraans = Kendaraan::where('no_polisi', $no_polisi)->first();
        $stnk = STNK::where('no_polisi', $no_polisi)->first();
        $kir = KIR::where('no_polisi', $no_polisi)->first();
        $kategori = $kendaraans->kategori;

        
        $stdealertowahanas->approval = 'Approved';
        $stdealertowahanas->save();
        $kendaraans->approval = 'Approved';
        $kendaraans->status = 'Stock';
        $kendaraans->save();
        // Jika kategori adalah "Komersil"
    if ($kategori == "Komersil") {
        // Simpan model STNK
        $stnk->approval = 'Approved';
        $stnk->save();

        // Simpan model KIR
        $kir->approval = 'Approved';
        $kir->save();
    }
    // Jika kategori adalah "Passanger"
    elseif ($kategori == "Passanger") {
        // Simpan model STNK;
        $stnk->approval = 'Approved';
        $stnk->save();
    }

        // Tambahkan pesan berhasil ke session
        session()->flash('approved', 'Serah Terima Kendaraan berhasil di Approve');
        // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
        return redirect()->back()->with('success', 'Serah Terima Kendaraan diapprove');
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
