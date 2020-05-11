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
//        $this->call(RolesNbelSeeder::class);
//        $this->call(UserTabelSeeder::class);
//        $this->call(SpecialitySeeder::class);
        $this->call(StudentSeeder::class);
    }
}
