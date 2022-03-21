<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanpasienMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pemeriksaan_pasien', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('tb_pasien')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->longText('pemeriksaan')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->longText('terapi')->nullable();

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
        Schema::dropIfExists('tb_pemeriksaan_pasien');
    }
}
