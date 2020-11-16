<?php

use App\JenisKelahiran;
use Illuminate\Database\Seeder;

class JenisKelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelahiran::truncate();
        JenisKelahiran::create(['nama' => 'TUNGGAL']);
        JenisKelahiran::create(['nama' => 'KEMBAR 2']);
        JenisKelahiran::create(['nama' => 'KEMBAR 3']);
        JenisKelahiran::create(['nama' => 'KEMBAR 4']);
    }
}
