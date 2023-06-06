<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi', 'merk', 'tipe', 'jenis', 'kondisi', 'no_rangka', 'no_mesin', 'tahun_rakitan', 'warna', 'lokasi', 'status', 'approval'];

    //belum fiks
    public function kendaraan() {
        return $this->belongsTo('App\kendaraan', 'kendaraan_id', 'id');
    }
}
