<?php

use App\PenolongKelahiran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenolongKelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PenolongKelahiran::truncate();
        PenolongKelahiran::create(['nama' => 'DOKTER']);
        PenolongKelahiran::create(['nama' => 'BIDAN']);
        PenolongKelahiran::create(['nama' => 'PERAWAT']);
        PenolongKelahiran::create(['nama' => 'DUKUN']);
        PenolongKelahiran::create(['nama' => 'LAINNYA']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
