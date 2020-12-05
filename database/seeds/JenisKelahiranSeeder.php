<?php

use App\JenisKelahiran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        JenisKelahiran::truncate();
        JenisKelahiran::create(['nama' => 'TUNGGAL']);
        JenisKelahiran::create(['nama' => 'KEMBAR 2']);
        JenisKelahiran::create(['nama' => 'KEMBAR 3']);
        JenisKelahiran::create(['nama' => 'KEMBAR 4']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
