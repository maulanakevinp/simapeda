<?php

use App\PenolongKelahiran;
use Illuminate\Database\Seeder;

class PenolongKelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PenolongKelahiran::create(['nama' => 'DOKTER']);
        PenolongKelahiran::create(['nama' => 'BIDAN']);
        PenolongKelahiran::create(['nama' => 'PERAWAT']);
        PenolongKelahiran::create(['nama' => 'DUKUN']);
        PenolongKelahiran::create(['nama' => 'LAINNYA']);
    }
}
