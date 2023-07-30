<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = ['tgl_pengembalian', 'alasan', 'id_kontraksewa', 'status', 'approval', 'keterangan'];
}
