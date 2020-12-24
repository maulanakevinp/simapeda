<?php

use App\AkseptorKb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkseptorKbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AkseptorKb::truncate();
        AkseptorKb::create(['nama' => 'Pil', 'sex' => 2]);
        AkseptorKb::create(['nama' => 'IUD', 'sex' => 2]);
        AkseptorKb::create(['nama' => 'Suntik', 'sex' => 2]);
        AkseptorKb::create(['nama' => 'Kondom', 'sex' => 1]);
        AkseptorKb::create(['nama' => 'Susuk KB', 'sex' => 2]);
        AkseptorKb::create(['nama' => 'Sterilisasi Wanita', 'sex' => 2]);
        AkseptorKb::create(['nama' => 'Sterilisasi Pria', 'sex' => 1]);
        AkseptorKb::create(['id' => 99,'nama' => 'Lainnya', 'sex' => 3]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
