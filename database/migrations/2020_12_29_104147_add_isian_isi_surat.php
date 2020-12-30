<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsianIsiSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isi_surat', function (Blueprint $table) {
            $table->string('isian', 128)->nullable()->after('isi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isi_surat', function (Blueprint $table) {
            $table->dropColumn(['isian']);
        });
    }
}
