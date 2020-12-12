<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTtd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->unsignedBigInteger('pemerintahan_desa_id')->nullable()->after('id');
            $table->foreign('pemerintahan_desa_id')->references('id')->on('pemerintahan_desa')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('desa_pemerintahan_desa_id_foreign');
            $table->dropColumn('pemerintahan_desa_id');
        });
    }
}
