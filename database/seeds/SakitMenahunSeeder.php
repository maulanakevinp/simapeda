<?php

use App\SakitMenahun;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SakitMenahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SakitMenahun::truncate();
        SakitMenahun::create(['nama' => 'JANTUNG']);
        SakitMenahun::create(['nama' => 'LEVER']);
        SakitMenahun::create(['nama' => 'PARU-PARU']);
        SakitMenahun::create(['nama' => 'KANKER']);
        SakitMenahun::create(['nama' => 'STROKE']);
        SakitMenahun::create(['nama' => 'DIABETES MELITUS']);
        SakitMenahun::create(['nama' => 'GINJAL']);
        SakitMenahun::create(['nama' => 'MALARIA']);
        SakitMenahun::create(['nama' => 'LEPRA/KUSTA']);
        SakitMenahun::create(['nama' => 'HIV/AIDS']);
        SakitMenahun::create(['nama' => 'GILA/STRESS']);
        SakitMenahun::create(['nama' => 'TBC']);
        SakitMenahun::create(['nama' => 'ASTHMA']);
        SakitMenahun::create(['nama' => 'TIDAK ADA/TIDAK SAKIT']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
