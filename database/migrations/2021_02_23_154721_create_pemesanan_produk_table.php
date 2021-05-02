<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pemesanan_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('produk_id')->unsigned();
            $table->string('nama_produk', 255);
            $table->integer('qty');
            $table->double('harga');
            $table->timestamps();
        });

        Schema::table('pemesanan_produk', function (Blueprint $table) {

            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pemesanan_produk');
    }
}