<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluhanpasienMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_keluhan_pasien', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('tb_pasien')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->longText('keluhan')->nullable();

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
        Schema::dropIfExists('tb_keluhan_pasien');
    }
}
