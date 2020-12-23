<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 128);
            $table->string('kode_barang', 64);
            $table->string('nomor_register', 64);
            $table->string('kondisi_bangunan', 64);
            $table->text('kontruksi');
            $table->double('panjang');
            $table->double('lebar');
            $table->double('luas');
            $table->text('letak_atau_lokasi');
            $table->year('tahun_pengadaan');
            $table->string('nomor_kepemilikan', 128);
            $table->date('tanggal_dokumen_kepemilikan');
            $table->string('status_tanah', 128);
            $table->string('nomor_kode_tanah', 128);
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
        Schema::dropIfExists('inventaris_jalan');
    }
}
