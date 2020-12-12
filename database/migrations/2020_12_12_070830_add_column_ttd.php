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
            $table->unsignedBigInteger('ditandatangani')->nullable()->after('id');
            $table->foreign('ditandatangani')->references('id')->on('pemerintahan_desa')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('desa_ditandatangani_foreign');
            $table->dropColumn('ditandatangani');
        });
    }
}
