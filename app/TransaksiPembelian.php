<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    protected $table = 'transaksi_pembelians';
    protected $primaryKey = 'id';
    protected $fillable = ['tanggal_transaksi_p', 'pembayaran_transaksi_p', 
                        'bukti_transaksi_p', 'id_pengajuan_pembelians', 'id_sppk', 'approval'];
}
