<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STNK extends Model
{
    protected $table = 's_t_n_k_s';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi', 'tanggal_jt', 'tanggal_bayar', 'biaya', 'approval'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_polisi', 'no_polisi');
    }
}
