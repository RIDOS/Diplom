<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'Администратор')->first();
        $studyRole = Role::where('name', 'Учебное заведение')->first();
        $studRole = Role::where('name', 'Студент')->first();
        $orgRole = Role::where('name', 'Организация')->first();

        $admin = User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('admin')
        ]);

        $study = User::create([
            'name' => 'Study',
            'email' => 'study@study.com',
            'password' => bcrypt('study')
        ]);

        $stud = User::create([
            'name' => 'Stud',
            'email' => 'stud@stud.com',
            'password' => bcrypt('stud')
        ]);

        $organization = User::create([
            'name' => 'Organization',
            'email' => 'organization@organization.com',
            'password' => bcrypt('organization')
        ]);

        $admin->roles()->attach($adminRole);
        $study->roles()->attach($studyRole);
        $stud->roles()->attach($studRole);
        $organization->roles()->attach($orgRole);

        factory(App\User::class, 50)->create();
    }
}
