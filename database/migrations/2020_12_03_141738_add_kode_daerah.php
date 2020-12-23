<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodeDaerah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->string('kode_desa',10)->nullable()->after('nama_desa');
            $table->string('kode_kecamatan',6)->nullable()->after('nama_kecamatan');
            $table->string('kode_kabupaten',4)->nullable()->after('nama_kabupaten');
            $table->string('kode_provinsi',2)->nullable()->after('nama_provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->dropColumn(['kode_desa','kode_kecamatan','kode_kabupaten','kode_provinsi']);
        });
    }
}
