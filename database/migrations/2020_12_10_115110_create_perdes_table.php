<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdes', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dokumen', 128);
            $table->string('dokumen', 128);
            $table->text('uraian_singkat');
            $table->string('jenis_peraturan', 128);
            $table->string('nomor_ditetapkan', 64);
            $table->date('tanggal_ditetapkan');
            $table->date('tanggal_kesepakatan');
            $table->string('nomor_dilaporkan', 64);
            $table->date('tanggal_dilaporkan');
            $table->string('nomor_diundangkan_dalam_lembaran_desa', 64);
            $table->date('tanggal_diundangkan_dalam_lembaran_desa');
            $table->string('nomor_diundangkan_dalam_berita_desa', 64);
            $table->date('tanggal_diundangkan_dalam_berita_desa');
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
        Schema::dropIfExists('perdes');
    }
}
