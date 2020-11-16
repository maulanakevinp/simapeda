<?php

use App\StatusPenduduk;
use Illuminate\Database\Seeder;

class StatusPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPenduduk::truncate();
        StatusPenduduk::create(['nama' => 'TETAP']);
        StatusPenduduk::create(['nama' => 'TIDAK TETAP']);
        StatusPenduduk::create(['nama' => 'PENDATANG']);
    }
}
