<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanSewa extends Model
{
    protected $table = 'pengajuan_sewas';
    protected $primaryKey = 'id_sppk';
    protected $fillable = ['tgl_sppk', 'nama_pt', 'nama_cabang', 'alamat',
                        'kategori', 'merk', 'tipe', 'tahun', 'warna',
                        'nama', 'no_hp', 'jabatan',
                        'tgl_awal', 'tgl_akhir', 'biaya_sewa', 'keterangan', 'status', 'approval'];

}
