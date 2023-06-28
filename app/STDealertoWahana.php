<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STDealertoWahana extends Model
{
    protected $table = 's_t_dealerto_wahanas';
    protected $primaryKey = 'id_stdealertowahana';
    protected $fillable = ['tgl_st', 'nama_penyerah', 'nama_penerima', 'id_pengajuanpembelian', 'no_polisi', 'approval', 'keterangan'];
}
