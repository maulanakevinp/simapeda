<?php

use Illuminate\Database\Seeder;

class DatabaseMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PeranSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(PeranMenuSeeder::class);
        $this->call(PeranMenuSubmenuSeeder::class);
    }
}
