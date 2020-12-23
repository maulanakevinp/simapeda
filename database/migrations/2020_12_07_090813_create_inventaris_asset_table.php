<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_asset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 128);
            $table->string('kode_barang', 64);
            $table->string('nomor_register', 64);
            $table->string('jenis_asset', 64);
            $table->string('judul_dan_pencipta_buku', 128)->nullable();
            $table->string('spesifikasi_buku', 128)->nullable();
            $table->string('asal_daerah_kesenian', 128)->nullable();
            $table->string('pencipta_kesenian', 128)->nullable();
            $table->string('bahan_kesenian', 128)->nullable();
            $table->string('jenis_hewan_ternak', 128)->nullable();
            $table->double('ukuran_hewan_ternak')->nullable();
            $table->string('jenis_tumbuhan', 128)->nullable();
            $table->double('ukuran_tumbuhan')->nullable();
            $table->integer('jumlah');
            $table->year('tahun_pengadaan');
            $table->string('penggunaan_barang', 64);
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
        Schema::dropIfExists('inventaris_asset');
    }
}
