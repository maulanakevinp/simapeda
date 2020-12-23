<?php

use App\TempatDilahirkan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempatDilahirkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TempatDilahirkan::truncate();
        TempatDilahirkan::create(['nama' => 'RS/RB']);
        TempatDilahirkan::create(['nama' => 'PUSKESMAS']);
        TempatDilahirkan::create(['nama' => 'POLINDES']);
        TempatDilahirkan::create(['nama' => 'RUMAH']);
        TempatDilahirkan::create(['nama' => 'LAINNYA']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
