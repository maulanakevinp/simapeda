<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffPemerintahanDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemerintahan_desa', function (Blueprint $table) {
            $table->unsignedBigInteger('atasan')->nullable()->after('status_pegawai_desa');
            $table->foreign('atasan')->references('id')->on('pemerintahan_desa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jabatan',128)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemerintahan_desa', function (Blueprint $table) {
            $table->dropForeign('pemerintahan_desa_atasan_foreign');
            $table->dropColumn(['atasan']);
        });
    }
}
