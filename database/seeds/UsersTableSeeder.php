<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = \App\Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@greenpanda.com';
        $user->password = bcrypt('6EcXCvWy');
        $user->save();

        $user->roles()->attach($role_admin);
    }
}
