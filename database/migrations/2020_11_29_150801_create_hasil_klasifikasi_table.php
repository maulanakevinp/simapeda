<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilKlasifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_klasifikasi', function (Blueprint $table) {
            $table->foreignId('analisis_id')->constrained('analisis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periode')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('penduduk')->onUpdate('cascade')->onDelete('cascade');
            $table->double('akumulasi');
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
        Schema::dropIfExists('hasil_klasifikasi');
    }
}
