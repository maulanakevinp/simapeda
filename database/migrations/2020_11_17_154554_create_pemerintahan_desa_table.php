<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemerintahanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemerintahan_desa', function (Blueprint $table) {
            $table->id();
            $table->integer('urutan');
            $table->string('foto')->nullable();
            $table->string('nama',128);
            $table->string('nik',128);
            $table->string('nipd',32)->nullable();
            $table->string('nip',32)->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir',32);
            $table->date('tanggal_lahir');
            $table->tinyInteger('jenis_kelamin')->comment('1: Laki-laki, 2: Perempuan');
            $table->foreignId('agama_id')->constrained('agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pendidikan_id')->constrained('pendidikan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pangkat_atau_golongan',64)->nullable();
            $table->string('nomor_sk_pengangkatan',32)->nullable();
            $table->date('tanggal_sk_pengangkatan')->nullable();
            $table->string('nomor_sk_pemberhentian',32)->nullable();
            $table->date('tanggal_sk_pemberhentian')->nullable();
            $table->string('masa_jabatan',64)->nullable();
            $table->string('jabatan',64);
            $table->boolean('status_pegawai_desa');
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
        Schema::dropIfExists('pemerintahan_desa');
    }
}
