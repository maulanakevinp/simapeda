<?php

use App\StatusPerkawinan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StatusPerkawinan::truncate();
        StatusPerkawinan::create(['nama' => 'Belum Kawin']);
        StatusPerkawinan::create(['nama' => 'Kawin']);
        StatusPerkawinan::create(['nama' => 'Cerai Hidup']);
        StatusPerkawinan::create(['nama' => 'Cerai Mati']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
