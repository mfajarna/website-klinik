<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dokter', function (Blueprint $table) {
            $table->id();

            $table->string('nama_dokter')->nullable();
            $table->json('bidang_keahlian')->nullable();
            $table->string('role')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->rememberToken();
            
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
        Schema::dropIfExists('tb_dokter');
    }

    
}
