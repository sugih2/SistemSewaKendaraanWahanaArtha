<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_polisi')->unique();
            $table->string('merk');
            $table->string('tipe');
            $table->string('jenis');
            $table->string('kondisi');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('tahun_rakitan');
            $table->string('warna');
            $table->string('lokasi');
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
        Schema::dropIfExists('kendaraans');
    }
}
