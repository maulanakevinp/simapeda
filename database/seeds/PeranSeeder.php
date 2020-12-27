<?php

use App\Peran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Peran::truncate();
        Peran::create(['nama' => 'Admin']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
