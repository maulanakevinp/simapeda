<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->string('nama_provinsi', 64)->after('nama_kabupaten')->nullable();
            $table->string('kodepos', 8)->after('nama_provinsi')->nullable();
            $table->string('email',64)->nullable()->after('channel_id');
            $table->string('telepon',16)->nullable()->after('channel_id');
            $table->string('website',64)->nullable()->after('channel_id');
            $table->text('link_facebook')->nullable()->after('channel_id');
            $table->text('link_instagram')->nullable()->after('channel_id');
            $table->text('link_youtube')->nullable()->after('channel_id');
            $table->text('link_twitter')->nullable()->after('channel_id');
            $table->text('link_maps')->nullable()->after('channel_id');
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
            $table->dropColumn([
                'nama_provinsi',
                'kodepos',
                'email',
                'telepon',
                'website',
                'link_facebook',
                'link_instagram',
                'link_youtube',
                'link_twitter',
                'link_maps'
            ]);
        });
    }
}
