<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pemesanan_id')->unsigned();
            $table->string('nama_pengirim');
            $table->dateTime('tanggal_dikirim');
            $table->string('gambar');
            $table->timestamps();
        });
        Schema::table('bukti_pembayaran', function (Blueprint $table) {

            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_pembayaran');
    }
}