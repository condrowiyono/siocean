<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cashflow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashflow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petugas_id');
            $table->date('tanggal');
            $table->string('jenis');
            $table->string('uraian')->nullable();
            $table->integer('banyaknya');
            $table->integer('saldo');
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
        Schema::dropIfExists('cashflow');
    }
}
