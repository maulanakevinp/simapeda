<?php

use App\Pendidikan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pendidikan::truncate();
        Pendidikan::create(['nama' => 'Tidak/Belum Sekolah']);
        Pendidikan::create(['nama' => 'Belum Tamat SD/Sederajat']);
        Pendidikan::create(['nama' => 'Tamat SD/sederajat']);
        Pendidikan::create(['nama' => 'SLTP/sederajat']);
        Pendidikan::create(['nama' => 'SLTA/sederajat']);
        Pendidikan::create(['nama' => 'Diploma I/II']);
        Pendidikan::create(['nama' => 'Akademi/Diploma III/S. Muda']);
        Pendidikan::create(['nama' => 'Diploma IV/Strata I']);
        Pendidikan::create(['nama' => 'Strata II']);
        Pendidikan::create(['nama' => 'Strata III']);
        Pendidikan::create(['nama' => 'Belum masuk TK/Kelompok Bermain']);
        Pendidikan::create(['nama' => 'Sedang TK/Kelompok Bermain']);
        Pendidikan::create(['nama' => 'Sedang SD/sederajat']);
        Pendidikan::create(['nama' => 'Sedang SLTP/Sederajat']);
        Pendidikan::create(['nama' => 'Sedang SLTA/sederajat']);
        Pendidikan::create(['nama' => 'Sedang D-1/sederajat']);
        Pendidikan::create(['nama' => 'Sedang D-2/sederajat']);
        Pendidikan::create(['nama' => 'Sedang D-3/sederajat']);
        Pendidikan::create(['nama' => 'Sedang S-1/sederajat']);
        Pendidikan::create(['nama' => 'Sedang S-2/sederajat']);
        Pendidikan::create(['nama' => 'Tamat SLTP/sederajat']);
        Pendidikan::create(['nama' => 'Tamat SLTA/sederajat']);
        Pendidikan::create(['nama' => 'Tamat D-1/sederajat']);
        Pendidikan::create(['nama' => 'Tamat D-2/sederajat']);
        Pendidikan::create(['nama' => 'Tamat D-3/sederajat']);
        Pendidikan::create(['nama' => 'Tamat D-4/sederajat']);
        Pendidikan::create(['nama' => 'Tamat S-1/sederajat']);
        Pendidikan::create(['nama' => 'Tamat S-2/sederajat']);
        Pendidikan::create(['nama' => 'Tamat S-3/sederajat']);
        Pendidikan::create(['nama' => 'Tamat S-3/sederajat']);
        Pendidikan::create(['nama' => 'Sedang SLB A/sederajat']);
        Pendidikan::create(['nama' => 'Sedang SLB B/sederajat']);
        Pendidikan::create(['nama' => 'Sedang SLB C/sederajat']);
        Pendidikan::create(['nama' => 'Tamat SLB A/sederajat']);
        Pendidikan::create(['nama' => 'Tamat SLB B/sederajat']);
        Pendidikan::create(['nama' => 'Tamat SLB C/sederajat']);
        Pendidikan::create(['nama' => 'Tidak pernah sekolah']);
        Pendidikan::create(['nama' => 'Tidak dapat membaca dan menulis huruf Latin/Arab']);
        Pendidikan::create(['nama' => 'Tidak tamat SD/sederajat']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
