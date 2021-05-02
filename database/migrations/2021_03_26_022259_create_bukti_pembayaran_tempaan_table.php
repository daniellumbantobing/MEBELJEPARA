<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPembayaranTempaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pembayaran_tempaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tempaan_id')->unsigned();
            $table->string('nama_pengirim');
            $table->dateTime('tanggal_dikirim');
            $table->string('gambar');
            $table->timestamps();
        });
        Schema::table('bukti_pembayaran_tempaan', function (Blueprint $table) {



            $table->foreign('tempaan_id')->references('id')->on('tempaan')
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
        Schema::dropIfExists('bukti_pembayaran_tempaan');
    }
}