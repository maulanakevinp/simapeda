<?php

use App\JenisCacat;
use Illuminate\Database\Seeder;

class JenisCacatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisCacat::truncate();
        JenisCacat::create(['nama' => 'CACAT FISIK']);
        JenisCacat::create(['nama' => 'CACAT NETRA/BUTA']);
        JenisCacat::create(['nama' => 'CACAT RUNGU/WICARA']);
        JenisCacat::create(['nama' => 'CACAT MENTAL/JIWA']);
        JenisCacat::create(['nama' => 'CACAT FISIK DAN MENTAL']);
        JenisCacat::create(['nama' => 'CACAT LAINNYA']);
        JenisCacat::create(['nama' => 'TIDAK CACAT']);
    }
}
