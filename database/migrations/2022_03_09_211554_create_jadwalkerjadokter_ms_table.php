<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalkerjadokterMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwalkerjadokter', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('hari_kerja')->nullable();
            $table->string('jam_mulai_kerja')->nullable();
            $table->string('jam_selesai_kerja')->nullable();

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
        Schema::dropIfExists('tb_jadwalkerjadokter');
    }
}
