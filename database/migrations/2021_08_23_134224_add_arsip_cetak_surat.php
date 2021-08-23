<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArsipCetakSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cetak_surat', function (Blueprint $table) {
            $table->boolean('arsip')->nullable()->after('nomor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cetak_surat', function (Blueprint $table) {
            $table->dropColumn('arsip');
        });
    }
}
