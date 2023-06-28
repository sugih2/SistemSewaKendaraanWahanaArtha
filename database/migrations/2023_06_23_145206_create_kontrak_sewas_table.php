<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrakSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak_sewas', function (Blueprint $table) {
            $table->bigIncrements('id_kontraksewa');
            $table->date('tgl_sewa');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('biaya_sewa');
            $table->string('no_polisi');
            $table->foreign('no_polisi')->references('no_polisi')->on('kendaraans')->onDelete('cascade');
            $table->string('id_penyewa');
            $table->string('id_pemakai');
            $table->string('status');
            $table->string('approval');
            $table->unsignedBigInteger('id_sppk');
            $table->foreign('id_sppk')->references('id_sppk')->on('pengajuan_sewas')->onDelete('cascade');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('kontrak_sewas');
    }
}
