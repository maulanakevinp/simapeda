<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisPeralatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_peralatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 128);
            $table->string('kode_barang', 64);
            $table->string('nomor_register', 64);
            $table->string('merk_atau_type', 128);
            $table->text('ukuran_atau_cc');
            $table->text('bahan');
            $table->year('tahun_pembelian');
            $table->string('nomor_pabrik', 128);
            $table->string('nomor_rangka', 128);
            $table->string('nomor_mesin', 128);
            $table->string('nomor_polisi', 128);
            $table->string('bpkb', 128);
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
        Schema::dropIfExists('inventaris_peralatan');
    }
}
