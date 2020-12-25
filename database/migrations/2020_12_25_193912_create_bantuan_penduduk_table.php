<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuanPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuan_penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bantuan_id')->constrained('bantuan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('penduduk')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_kartu_peserta', 64);
            $table->string('gambar_kartu_peserta', 128)->nullable();
            $table->string('nik', 16);
            $table->string('nama', 128);
            $table->string('tempat_lahir', 64);
            $table->date('tanggal_lahir');
            $table->text('alamat');
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
        Schema::dropIfExists('bantuan_penduduk');
    }
}
