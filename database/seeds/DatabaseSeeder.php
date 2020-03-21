<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DenominationsTableSeeder::class); //PrizeBond Denominations
        $this->call(RolesAndPermissionsSeeder::class); //PrizeBond Denominations
    }
}
