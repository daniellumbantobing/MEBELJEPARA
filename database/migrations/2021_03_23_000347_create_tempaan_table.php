<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('produk_id')->nullable()->unsigned();
            $table->string('nama_tempaan', 255);
            $table->string('nama_penerima', 255);
            $table->string('alamat', 255);
            $table->string('kode_pos', 255);
            $table->string('no_hp');
            $table->string('gambar1');
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('keterangan', 255);
            $table->double('biaya')->nullable();
            $table->string('status_pemesanan', 255);
            $table->string('status_pembayaran', 255);
            $table->string('transfer_bank', 255)->nullable();
            $table->double('total_biaya')->nullable();
            $table->timestamps();
        });
        Schema::table('tempaan', function (Blueprint $table) {


            $table->foreign('produk_id')->references('id')->on('produk')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tempaan');
    }
}