<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterpoliMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dokterpoli', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('tb_dokter')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_poli');
            $table->foreign('id_poli')->references('id')->on('tb_poli')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('status')->nullable();

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
        Schema::dropIfExists('tb_dokterpoli');
    }
}
