<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_beli');
            $table->BigInteger('id_buku')->unsigned();
            $table->string('NIM_mhs');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('id_buku')->references('id')->on('bukus');
            $table->foreign('NIM_mhs')->references('nim')->on('mahasiswas')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
