<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('kode_pos', 255);
            $table->string('no_hp');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->string('keterangan', 255);
            $table->double('biaya');
            $table->string('status_pemesanan', 255);
            $table->string('status_pembayaran', 255);
            $table->string('tranfer_bank', 255);
            $table->string('ket_reparasi', 255);
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
        Schema::dropIfExists('reparasi');
    }
}