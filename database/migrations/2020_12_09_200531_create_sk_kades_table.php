<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkKadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_kades', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dokumen', 128);
            $table->string('dokumen', 128);
            $table->text('uraian_singkat');
            $table->string('nomor_keputusan_kades', 64);
            $table->date('tanggal_keputusan_kades');
            $table->string('nomor_dilaporkan', 64);
            $table->date('tanggal_dilaporkan');
            $table->text('keterangan');
            $table->boolean('aktif')->default(1);
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
        Schema::dropIfExists('sk_kades');
    }
}
