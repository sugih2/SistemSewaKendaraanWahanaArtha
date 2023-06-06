<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKIRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_i_r_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_polisi');
            $table->foreign('no_polisi')->references('no_polisi')->on('kendaraans')->onDelete('cascade');
            $table->date('tanggal_jt');
            $table->date('tanggal_bayar');
            $table->string('biaya');
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
        Schema::dropIfExists('k_i_r_s');
    }
}