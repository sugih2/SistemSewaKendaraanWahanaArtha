<?php

namespace App;
use App\Models\BPKB;
use App\Models\KIR;
use App\Models\STNK;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    protected $primaryKey = 'id';
    protected $fillable = ['no_polisi', 'merk', 'tipe', 'kategori', 'kondisi', 'no_rangka', 'no_mesin', 
                        'tahun_rakitan', 'warna', 'tanggal_beli', 'harga_off', 'bbn', 'otr', 'karoseri', 'total', 
                        'rate', 'harga_sewa', 'lokasi', 'status', 'approval', 'keterangan'];

    public function bpkb()
    {
        return $this->hasOne('App\BPKB', 'no_polisi', 'no_polisi');
    }

    public function kir()
    {
        return $this->hasOne('App\KIR', 'no_polisi', 'no_polisi');
    }

    public function stnk()
    {
        return $this->hasOne('App\STNK', 'no_polisi', 'no_polisi');
    }
    
}
