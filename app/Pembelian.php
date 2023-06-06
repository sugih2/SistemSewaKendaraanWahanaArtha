<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi', 'tanggal_beli', 'harga_off', 'bbn', 'karoseri', 'total', 'tahun', 'rate', 'approval'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_polisi', 'no_polisi');
    }
}
