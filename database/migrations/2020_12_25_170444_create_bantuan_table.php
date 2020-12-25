<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuan', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sasaran_program')->comment('1. Penduduk, 2. Keluarga');
            $table->string('nama_program', 128);
            $table->text('keterangan');
            $table->string('asal_dana', 64);
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->boolean('status');
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
        Schema::dropIfExists('bantuan');
    }
}
