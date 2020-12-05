<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_tanah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 128);
            $table->string('kode_barang', 64);
            $table->string('nomor_register', 64);
            $table->integer('luas_tanah');
            $table->year('tahun_pengadaan');
            $table->text('letak_atau_alamat');
            $table->string('hak_tanah', 32);
            $table->string('penggunaan_barang', 64);
            $table->date('tanggal_sertifikat');
            $table->string('nomor_sertifikat', 128);
            $table->string('penggunaan', 64);
            $table->string('asal_usul', 64);
            $table->bigInteger('harga');
            $table->text('keterangan');
            $table->boolean('mutasi');
            $table->string('jenis_mutasi', 64)->nullable();
            $table->date('tahun_mutasi')->nullable();
            $table->bigInteger('harga_jual')->nullable();
            $table->string('disumbangkan', 128)->nullable();
            $table->text('keterangan_mutasi', 128)->nullable();
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
        Schema::dropIfExists('inventaris_tanah');
    }
}
