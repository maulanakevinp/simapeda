<?php

use App\DetailCetak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropColumnIdDetailCetak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_cetak', function (Blueprint $table) {
            $table->integer('urutan')->nullable()->first();
        });

        foreach (DetailCetak::get()->groupBy('cetak_surat_id') as $detail_cetak) {
            $i = 1;
            foreach ($detail_cetak as $item) {
                $item->urutan = $i;
                $i++;
                $item->save();
            }
        }

        DB::unprepared("ALTER TABLE `detail_cetak` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL;");
        Schema::table('detail_cetak', function (Blueprint $table) {
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
        DB::unprepared("ALTER TABLE detail_cetak AUTO_INCREMENT=1;");
        Schema::table('detail_cetak', function (Blueprint $table) {
            $table->dropColumn('urutan');
            $table->id()->first();
        });
    }
}
