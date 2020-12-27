<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeranMenuSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peran_menu_submenu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peran_menu_id')->constrained('peran_menu')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('submenu_id')->constrained('submenu')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('peran_menu_submenu');
    }
}
