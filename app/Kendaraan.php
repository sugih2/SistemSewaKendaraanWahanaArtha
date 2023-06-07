<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi', 'merk', 'tipe', 'jenis', 'kondisi', 'no_rangka', 'no_mesin', 'tahun_rakitan', 'warna', 'tanggal_beli', 'harga_off', 'bbn', 'karoseri', 'total', 'tahun', 'rate', 'lokasi', 'status', 'approval'];
}
