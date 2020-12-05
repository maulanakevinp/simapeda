<?php

use App\StatusPenduduk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StatusPenduduk::truncate();
        StatusPenduduk::create(['nama' => 'TETAP']);
        StatusPenduduk::create(['nama' => 'TIDAK TETAP']);
        StatusPenduduk::create(['nama' => 'PENDATANG']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
