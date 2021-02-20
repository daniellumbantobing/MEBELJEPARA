<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depan', 255);
            $table->string('nama_belakang', 255);
            $table->integer('no_hp')->nullable();
            $table->string('email')->unique();
            $table->string('nama_prov', 255)->nullable();
            $table->string('nama_kota', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('password', 255);
            $table->string('avatar', 255)->nullable();
            $table->string('role', 255);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}