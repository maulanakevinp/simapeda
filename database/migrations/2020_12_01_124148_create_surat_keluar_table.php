<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_urut');
            $table->integer('nomor_surat');
            $table->foreignId('kode_surat_id')->constrained('kode_surat')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_surat');
            $table->string('tujuan', 128);
            $table->text('isi_singkat_atau_perihal');
            $table->text('berkas');
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
        Schema::dropIfExists('surat_keluar');
    }
}
