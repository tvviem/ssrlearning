<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
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
        /* $user = factory(App\User::class)->create([
            'username' => 'tvviem',
            'email' => 'tvviem@blu.edu.vn',
            'password' => bcrypt('123456'),
            'first_name' => 'Viêm',
            'last_name' => 'Triệu',
            'work_place' => 'bluitdev',
            'code' => '04.104',
            'path_avatar' => 'no_avatar.jpg',
            'active' => true,
            'activation_token' => 'super_user',
            'role_id' => 1
        ]); */
        $admin_role = Role::where('slug','admin')->first();
        $lecturer_role = Role::where('slug', 'lecturer')->first();
        $student_role = Role::where('slug', 'student')->first();

        $admin_perm = Permission::where('slug','create-branches')->first(); // them quyen cho admin
        $lecturer_perm = Permission::where('slug','join-option-test')->first();// Them quyen cho lect

        $admin = new User();
        $admin->username = 'tvviem';
        $admin->email = 'tvviem@blu.edu.vn';
        $admin->password = bcrypt('123456');
        $admin->first_name = 'Viem';
        $admin->last_name = 'Trieu Vinh';
        $admin->active = true;
        $admin->activation_token = str_random(60);
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm); // cho admin them dac quyen cua giang vien

        $lecturer = new User();
        $lecturer->username = 'tyyen';
        $lecturer->email = 'tyyen@blu.edu.vn';
        $lecturer->password = bcrypt('123456');
        $lecturer->first_name = 'Yen';
        $lecturer->last_name = 'Trieu Yen';
        $lecturer->active = false;
        $lecturer->activation_token = str_random(60);
        $lecturer->save();
        $lecturer->roles()->attach($lecturer_role);
        $lecturer->permissions()->attach($lecturer_perm); // Cho giang vien them quyen kiem tra
        
        $student = new User();
        $student->username = 'student';
        $student->email = 'student@blu.edu.vn';
        $student->password = bcrypt('123456');
        $student->first_name = 'student';
        $student->last_name = 'He is a';
        $student->active = false;
        $student->activation_token = str_random(60);
        $student->save();
        $student->roles()->attach($student_role);
        // $student->permissions()->attach($student_perm);
    }
}
