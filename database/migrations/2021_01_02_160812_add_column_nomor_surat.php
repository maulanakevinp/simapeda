<?php

use App\Desa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNomorSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->boolean('penomoran_surat')->nullable();
            $table->integer('nomor_surat')->nullable();
            $table->integer('nomor_layanan_surat')->nullable();
            $table->integer('nomor_surat_masuk')->nullable();
            $table->integer('nomor_surat_keluar')->nullable();
        });

        $desa = Desa::find(1);
        if ($desa) {
            $desa->penomoran_surat = 1;
            $desa->nomor_surat = 1;
            $desa->nomor_layanan_surat = 1;
            $desa->nomor_surat_masuk = 1;
            $desa->nomor_surat_keluar = 1;
            $desa->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->dropColumn(['nomor_surat_keluar','nomor_surat_masuk','nomor_layanan_surat','nomor_surat','penomoran_surat']);
        });
    }
}
