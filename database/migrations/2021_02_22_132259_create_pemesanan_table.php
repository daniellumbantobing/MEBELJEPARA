<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->double('total_harga');
            $table->string('nama_prov', 255);
            $table->string('nama_kota', 255);
            $table->string('alamat', 255);
            $table->string('kode_pos', 255);
            $table->string('no_hp');
            $table->string('transfer_bank');
            $table->string('status_pemesanan', 255);
            $table->string('status_pembayaran', 255);
            $table->timestamps();
        });
        Schema::table('pemesanan', function (Blueprint $table) {



            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('pemesanan');
    }
}