<?php

use App\SakitMenahun;
use Illuminate\Database\Seeder;

class SakitMenahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
