<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesNbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Администратор']);
        Role::create(['name' => 'Учебное заведение']);
        Role::create(['name' => 'Студент']);
        Role::create(['name' => 'Организация']);
    }
}
