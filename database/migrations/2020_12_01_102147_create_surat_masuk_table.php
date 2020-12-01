<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_urut');
            $table->date('tanggal_penerimaan');
            $table->integer('nomor_surat');
            $table->foreignId('kode_surat_id')->constrained('kode_surat')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_surat');
            $table->string('pengirim', 128);
            $table->text('isi_singkat_atau_perihal');
            $table->text('isi_disposisi');
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
        Schema::dropIfExists('surat_masuk');
    }
}
