<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseMenuSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(DarahSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(PendidikanSeeder::class);
        $this->call(StatusHubunganDalamKeluargaSeeder::class);
        $this->call(StatusPerkawinanSeeder::class);
        $this->call(JenisAnggaranSeeder::class);
        $this->call(KelompokJenisAnggaranSeeder::class);
        $this->call(DetailJenisAnggaranSeeder::class);
        $this->call(AkseptorKbSeeder::class);
        $this->call(AsuransiSeeder::class);
        $this->call(JenisCacatSeeder::class);
        $this->call(JenisKelahiranSeeder::class);
        $this->call(PenolongKelahiranSeeder::class);
        $this->call(SakitMenahunSeeder::class);
        $this->call(StatusPendudukSeeder::class);
        $this->call(StatusRekamSeeder::class);
        $this->call(TempatDilahirkanSeeder::class);
        $this->call(KodeSuratSeeder::class);
        $this->call(BarangSeeder::class);

    }
}
