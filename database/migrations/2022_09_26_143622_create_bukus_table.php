<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buku');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('harga');
            $table->integer('exemplar');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_jurusan');
            $table->timestamps();
            $table->foreign('id_jurusan')->references('id')->on('jurusans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
