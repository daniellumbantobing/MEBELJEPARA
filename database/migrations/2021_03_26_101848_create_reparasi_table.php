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
            $table->integer('user_id')->unsigned();
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('kode_pos', 255);
            $table->string('no_hp');
            $table->string('jenis_kerusakan', 255);
            $table->string('gambar1');
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->string('keterangan', 255);
            $table->double('biaya')->nullable();
            $table->string('status_pemesanan', 255);
            $table->string('status_pembayaran', 255);
            $table->string('ket_reparasi', 255)->nullable();
            $table->string('transfer_bank', 255)->nullable();
            $table->timestamps();
        });
        Schema::table('reparasi', function (Blueprint $table) {



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
        Schema::dropIfExists('reparasi');
    }
}