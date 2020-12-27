<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
        Menu::create(['nama' => 'Profil Desa']);
        Menu::create(['nama' => 'Kelola Penduduk']);
        Menu::create(['nama' => 'Sekretariat']);
        Menu::create(['nama' => 'Menu']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
