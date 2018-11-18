<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;

class UsersPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_perm = Permission::where('slug','create-branches')->first(); // them quyen cho admin
        $lecturer_perm = Permission::where('slug','join-option-test')->first();// Them quyen cho lect

        $user = User::where('username', 'tvviem')->first();
        $user->permissions()->attach($admin_perm);
        $user1 = User::where('username', 'tyyen')->first();
        $user1->permissions()->attach($lecturer_perm);       
    }
}
