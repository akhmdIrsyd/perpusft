<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mhs');
            $table->string('nim')->unique();;
            $table->unsignedBigInteger('id_jurusan');
            $table->string('no_hp');
            $table->string('email');
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
        Schema::dropIfExists('mahasiswas');
    }
}
