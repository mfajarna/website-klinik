<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadkegiatanMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_upload_kegiatan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_kegiatan')->nullable();
            $table->longText('deskripsi_kegiatan')->nullable();
            $table->string('gambar_kegiatan', 2048)->nullable();
            $table->string('status_kegiatan')->nullable();

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
        Schema::dropIfExists('tb_upload_kegiatan');
    }
}
