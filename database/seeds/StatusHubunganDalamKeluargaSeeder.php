<?php

use App\StatusHubunganDalamKeluarga;
use Illuminate\Database\Seeder;

class StatusHubunganDalamKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusHubunganDalamKeluarga::truncate();
        StatusHubunganDalamKeluarga::create(['nama' => 'Adik']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Anak Angkat']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Anak Kandung']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Anak Tiri']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Ayah']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Cucu']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Famili lain']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Ibu']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Istri']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Kakak']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Kakek']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Kepala Keluarga']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Keponakan']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Lainnya']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Menantu']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Mertua']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Nenek']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Paman']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Sepupu']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Suami']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Tante']);
        StatusHubunganDalamKeluarga::create(['nama' => 'Teman']);
    }
}
