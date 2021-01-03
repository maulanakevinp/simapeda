<?php

use App\PeranMenuSubmenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeranMenuSubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PeranMenuSubmenu::truncate();
        PeranMenuSubmenu::create([
            'peran_menu_id' => 1,
            'submenu_id'    => 1,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 1,
            'submenu_id'    => 2,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 1,
            'submenu_id'    => 3,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 4,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 5,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 6,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 7,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 8,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 2,
            'submenu_id'    => 9,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 10,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 11,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 12,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 13,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 14,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 3,
            'submenu_id'    => 15,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 16,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 17,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 18,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 19,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 20,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 21,
        ]);

        PeranMenuSubmenu::create([
            'peran_menu_id' => 4,
            'submenu_id'    => 22,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
