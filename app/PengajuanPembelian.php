<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanPembelian extends Model
{
    protected $table = 'pengajuan_pembelians';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_p_dealer', 'tanggal_p_dealer', 'harga_p_dealer', 
                        'nama_pt_karoseri', 'tanggal_p_karoseri', 'harga_p_karoseri', 
                        'dealer', 'merk', 'tipe', 'tahun', 'warna', 'deskripsi', 
                        'harga', 'bbn', 'otr', 'karoseri', 'total', 'id_sppk', 'approval'];
}
