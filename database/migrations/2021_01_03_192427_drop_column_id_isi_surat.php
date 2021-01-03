<?php

use App\IsiSurat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropColumnIdIsiSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isi_surat', function (Blueprint $table) {
            $table->integer('urutan')->nullable()->first();
        });

        foreach (IsiSurat::get()->groupBy('surat_id') as $isi_surat) {
            $i = 1;
            foreach ($isi_surat as $item) {
                $item->urutan = $i;
                $i++;
                $item->save();
            }
        }

        DB::unprepared("ALTER TABLE `isi_surat` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL;");
        Schema::table('isi_surat', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("ALTER TABLE isi_surat AUTO_INCREMENT=1;");
        Schema::table('isi_surat', function (Blueprint $table) {
            $table->dropColumn('urutan');
            $table->id()->first();
        });
    }
}
