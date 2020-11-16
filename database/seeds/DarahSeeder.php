<?php

use App\Darah;
use Illuminate\Database\Seeder;

class DarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
