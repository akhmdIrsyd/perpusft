<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bukus', function (Blueprint $table) {
            //

            $table->string('penulis')->default('-')->change();
            $table->string('penerbit')->default('-')->change();
            $table->integer('harga')->default(0)->change();
            $table->integer('exemplar')->default(0)->change();
            $table->integer('jumlah')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bukus', function (Blueprint $table) {
            //
        });
    }
}
