<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grup_id')->constrained('grup')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('penduduk')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('grup_penduduk');
    }
}
