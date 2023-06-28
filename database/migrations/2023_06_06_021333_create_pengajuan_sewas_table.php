<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_sewas', function (Blueprint $table) {
            $table->bigIncrements('id_sppk');
            $table->date('tgl_sppk');
            $table->string('nama_pt');
            $table->string('nama_cabang');
            $table->string('alamat');
            $table->string('kategori');
            $table->string('merk');
            $table->string('tipe');
            $table->string('tahun');
            $table->string('warna');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('jabatan');
            $table->string('biaya_sewa');
            $table->string('tgl_awal');
            $table->string('tgl_akhir');
            $table->string('keterangan')->nullable();
            $table->string('status');
            $table->string('approval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_sewas');
    }
}
