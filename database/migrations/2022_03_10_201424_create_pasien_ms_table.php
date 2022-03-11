<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('nikes')->nullable();
            $table->string('no_telp')->nullable();
            $table->longText('keluhan')->nullable();
            $table->longText('alamat')->nullable();
            $table->integer('umur')->nullable();
            $table->string('nama_orang_tua')->nullable();
 

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
        Schema::dropIfExists('tb_pasien');
    }
}
