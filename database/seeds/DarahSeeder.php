<?php

use App\Darah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Darah::truncate();
        Darah::create(['golongan' => 'A']);
        Darah::create(['golongan' => 'A+']);
        Darah::create(['golongan' => 'A-']);
        Darah::create(['golongan' => 'B']);
        Darah::create(['golongan' => 'B+']);
        Darah::create(['golongan' => 'B-']);
        Darah::create(['golongan' => 'O']);
        Darah::create(['golongan' => 'O+']);
        Darah::create(['golongan' => 'O-']);
        Darah::create(['golongan' => 'AB']);
        Darah::create(['golongan' => 'AB+']);
        Darah::create(['golongan' => 'AB-']);
        Darah::create(['golongan' => 'Tidak Tahu']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
