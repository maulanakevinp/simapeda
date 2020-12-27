<?php

use App\PeranMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeranMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PeranMenu::truncate();
        PeranMenu::create([
            'peran_id'  => 1,
            'menu_id'   => 1,
        ]);

        PeranMenu::create([
            'peran_id'  => 1,
            'menu_id'   => 2,
        ]);

        PeranMenu::create([
            'peran_id'  => 1,
            'menu_id'   => 3,
        ]);

        PeranMenu::create([
            'peran_id'  => 1,
            'menu_id'   => 4,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
