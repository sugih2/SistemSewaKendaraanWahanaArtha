<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KIR extends Model
{
    protected $table = 'k_i_r_s';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi','tanggal_jt', 'tanggal_bayar', 'biaya', 'approval'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_polisi', 'no_polisi');
    }
}
