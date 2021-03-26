<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPembayaranReparasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pembayaran_reparasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reparasi_id');
            $table->string('nama_pengirim');
            $table->dateTime('tanggal_dikirim');
            $table->string('gambar');
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
        Schema::dropIfExists('bukti_pembayaran_reparasi');
    }
}