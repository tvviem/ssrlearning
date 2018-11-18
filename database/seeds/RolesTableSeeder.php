<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permission = Permission::where('slug','crud-users')->first();
        $admin_permission1 = Permission::where('slug','grant-privilege')->first();
        $admin_permission2 = Permission::where('slug','crud-fields')->first();
        $admin_permission3 = Permission::where('slug','update-delete-branches')->first();
        
        $lecturer_permission = Permission::where('slug', 'create-branches')->first();
        $lecturer_permission1 = Permission::where('slug', 'crud-questions')->first();
        $lecturer_permission2 = Permission::where('slug', 'crud-test-code')->first();
        $lecturer_permission3 = Permission::where('slug', 'provide-documents')->first();
        $lecturer_permission4 = Permission::where('slug', 'export-results')->first();
        
        $student_permission = Permission::where('slug', 'join-option-test')->first();
        $student_permission1 = Permission::where('slug', 'join-test-code')->first();
        $student_permission2 = Permission::where('slug', 'get-documents')->first();
        
        //RoleTableSeeder.php
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Manage general';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);
        $admin_role->permissions()->attach($admin_permission1);
        $admin_role->permissions()->attach($admin_permission2);
        $admin_role->permissions()->attach($admin_permission3);

        $lecturer_role = new Role();
        $lecturer_role->slug = 'lecturer';
        $lecturer_role->name = 'Manage question, branch, testcode, documents';
        $lecturer_role->save();
        $lecturer_role->permissions()->attach($lecturer_permission);
        $lecturer_role->permissions()->attach($lecturer_permission1);
        $lecturer_role->permissions()->attach($lecturer_permission2);
        $lecturer_role->permissions()->attach($lecturer_permission3);
        $lecturer_role->permissions()->attach($lecturer_permission4);

        $student_role = new Role();
        $student_role->slug = 'student';
        $student_role->name = 'Join test, get documents';
        $student_role->save();
        $student_role->permissions()->attach($student_permission);
        $student_role->permissions()->attach($student_permission1);
        $student_role->permissions()->attach($student_permission2);
    }
}
