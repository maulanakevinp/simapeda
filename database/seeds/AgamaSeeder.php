<?php

use App\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Agama::truncate();
        Agama::create(['nama' => 'Islam']);
        Agama::create(['nama' => 'Kristen']);
        Agama::create(['nama' => 'Katholik']);
        Agama::create(['nama' => 'Hindu']);
        Agama::create(['nama' => 'Budha']);
        Agama::create(['nama' => 'Khonghucu']);
        Agama::create(['nama' => 'Lainnya']);
        Agama::create(['nama' => 'Kepercayaan Kepada Tuhan YME']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
