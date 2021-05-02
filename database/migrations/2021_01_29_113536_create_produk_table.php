<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_id')->unsigned();
            $table->string('nama_produk', 255);
            $table->integer('qty');
            $table->double('harga');
            $table->string('deskripsi', 255);
            $table->string('gambar', 255);
            $table->timestamps();
        });
       
        Schema::table('produk', function (Blueprint $table) {


            $table->foreign('kategori_id')->references('id')->on('kategori')
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
        Schema::dropIfExists('produk');
    }
}