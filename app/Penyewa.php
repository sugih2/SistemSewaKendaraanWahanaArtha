<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewas';
    protected $primaryKey = 'id_penyewa';
    protected $fillable = ['nama_pt', 'nama_cabang', 'alamat', 'status'];
}
