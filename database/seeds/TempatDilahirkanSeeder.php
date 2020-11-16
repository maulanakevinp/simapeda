<?php

use App\TempatDilahirkan;
use Illuminate\Database\Seeder;

class TempatDilahirkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TempatDilahirkan::truncate();
        TempatDilahirkan::create(['nama' => 'RS/RB']);
        TempatDilahirkan::create(['nama' => 'PUSKESMAS']);
        TempatDilahirkan::create(['nama' => 'POLINDES']);
        TempatDilahirkan::create(['nama' => 'RUMAH']);
        TempatDilahirkan::create(['nama' => 'LAINNYA']);
    }
}
