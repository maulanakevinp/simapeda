<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input', function (Blueprint $table) {
            $table->foreignId('penduduk_id')->constrained('penduduk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('indikator_id')->constrained('indikator')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('parameter_id')->nullable();
            $table->foreign('parameter_id')->references('id')->on('parameter')->onUpdate('cascade')->onDelete('cascade');
            $table->text('jawaban')->nullable();
            $table->foreignId('periode_id')->constrained('periode')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('input');
    }
}
