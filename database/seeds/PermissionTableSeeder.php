<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug', 'admin')->first();
        $lecturer_role = Role::where('slug', 'lecturer')->first();
        $student_role = Role::where('slug', 'student')->first();

        /**
         * Permissions of admin
         */
        $adminPer = new Permission();
        $adminPer->slug = 'crud-users';
        $adminPer->name = 'Manage Users';
        $adminPer->title = 'Manage all users in system';
        $adminPer->icon_class = 'fas fa-users';
        $adminPer->route_link = '/admin/manage-users';
        $adminPer->save();
        $adminPer->roles()->attach($admin_role);
        
        $adminPer1 = new Permission();
        $adminPer1->slug = 'grant-permissions';
        $adminPer1->name = 'Grant Permissions';
        $adminPer1->title = 'Grant roles and permissions for users';
        $adminPer1->icon_class = 'fas fa-user-cog';
        $adminPer1->route_link = '/admin/manage-grant-permissions';
        $adminPer1->save();
        $adminPer1->roles()->attach($admin_role);
        
        $adminPer2 = new Permission();
        $adminPer2->slug = 'crud-fields-branches';
        $adminPer2->name = 'Fields and Branches';
        $adminPer2->title = 'Create fields and edit branches';
        $adminPer2->icon_class = 'fas fa-object-group';
        $adminPer2->route_link = '/admin/manage-fields-branches';
        $adminPer2->save();
        $adminPer2->roles()->attach($admin_role);
        
        $adminPer3 = new Permission();
        $adminPer3->slug = 'crud-levels';
        $adminPer3->name = 'Levels of questions';
        $adminPer3->title = 'Manage difficulty level questions';
        $adminPer3->icon_class = 'fas fa-sort-amount-up';
        $adminPer3->route_link = '/admin/manage-levels';
        $adminPer3->save();
        $adminPer3->roles()->attach($admin_role);

        /**
         * Permissions of Lecturers
         */
        $lecPerm = new Permission();
        $lecPerm->slug = 'crud-questions';
        $lecPerm->name = 'Questions';
        $lecPerm->title = 'Create questions';
        $lecPerm->icon_class = 'fas fa-puzzle-piece';
        $lecPerm->route_link = '/lecturer/manage-questions';
        $lecPerm->save();
        $lecPerm->roles()->attach($lecturer_role);

        $lecPerm00 = new Permission();
        $lecPerm00->slug = 'init-exam';
        $lecPerm00->name = 'Init an exam';
        $lecPerm00->title = 'Create an exam for a group students';
        $lecPerm00->icon_class = 'fas fa-flag-checkered';
        $lecPerm00->route_link = '/lecturer/init-exam';
        $lecPerm00->save();
        $lecPerm00->roles()->attach($lecturer_role);

        $lecPerm01 = new Permission();
        $lecPerm01->slug = 'view-results';
        $lecPerm01->name = 'View results';
        $lecPerm01->title = 'View results of a test unit';
        $lecPerm01->icon_class = 'fas fa-list-alt';
        $lecPerm01->route_link = '/lecturer/view-results';
        $lecPerm01->save();
        $lecPerm01->roles()->attach($lecturer_role);
        
        $lecPerm2 = new Permission();
        $lecPerm2->slug = 'give-documents';
        $lecPerm2->name = 'Give Documents';
        $lecPerm2->title = 'Update resources for branches';
        $lecPerm2->icon_class = 'fas fa-book';
        $lecPerm2->route_link = '/lecturer/provide-documents';
        $lecPerm2->save();
        $lecPerm2->roles()->attach($lecturer_role);

        $lecPerm1 = new Permission();
        $lecPerm1->slug = 'review-test';
        $lecPerm1->name = 'Review Test';
        $lecPerm1->title = 'Lecturer view or export any the test';
        $lecPerm1->icon_class = 'fas fa-hand-point-right';
        $lecPerm1->route_link = '/lecturer/view-any-test';
        $lecPerm1->save();
        $lecPerm1->roles()->attach($lecturer_role);
        
        $lecPerm3 = new Permission();
        $lecPerm3->slug = 'support-student';
        $lecPerm3->name = 'View requires';
        $lecPerm3->title = 'View all proposals of Students';
        $lecPerm3->icon_class = 'far fa-envelope';
        $lecPerm3->route_link = '/lecturer/view-require-helps';
        $lecPerm3->save();
        $lecPerm3->roles()->attach($lecturer_role);

        $lecPerm0 = new Permission();
        $lecPerm0->slug = 'create-branches';
        $lecPerm0->name = 'Create Branches';
        $lecPerm0->title = 'Create new branches in field knowledge';
        $lecPerm0->icon_class = 'fas fa-layer-group';
        $lecPerm0->route_link = '/lecturer/create-fields-branches';
        $lecPerm0->save();
        $lecPerm0->roles()->attach($lecturer_role);
        
        /**
         * Permissions of Students
         */
        $studentPerm = new Permission();
        $studentPerm->slug = 'random-test'; // Thuc hien mot so cau hoi mau
        $studentPerm->name = 'Random Test';
        $studentPerm->title = 'Participate in the setting random questions';
        $studentPerm->icon_class = 'fas fa-random';
        $studentPerm->route_link = '/student/join-random-test';
        $studentPerm->save();
        $studentPerm->roles()->attach($student_role);
        
        $studentPerm1 = new Permission();
        $studentPerm1->slug = 'take-exam'; // Tham gia kiem tra tu bo de cua GV
        $studentPerm1->name = 'Take Exam';
        $studentPerm1->title = 'Join a test created by lecturers';
        $studentPerm1->icon_class = 'fas fa-puzzle-piece';
        $studentPerm1->route_link = '/student/take-exam';
        $studentPerm1->save();
        $studentPerm1->roles()->attach($student_role);
        
        $studentPerm2 = new Permission();
        $studentPerm2->slug = 'get-documents'; // co the xem va nhan cac tai lieu ma giang vien cung cap
        $studentPerm2->name = 'Get Documents';
        $studentPerm2->title = 'Get documents in branches';
        $studentPerm2->icon_class = 'fas fa-book-reader';
        $studentPerm2->route_link = '/student/get-documents';
        $studentPerm2->save();
        $studentPerm2->roles()->attach($student_role);
        
        $studentPerm3 = new Permission();
        $studentPerm3->slug = 'ask-support'; // co the yeu cau su tro giup tu giang vien
        $studentPerm3->name = 'Ask Support';
        $studentPerm3->title = 'Require helping to lecturer';
        $studentPerm3->icon_class = 'far fa-comment-dots';
        $studentPerm3->route_link = '/student/ask-support';
        $studentPerm3->save();
        $studentPerm3->roles()->attach($student_role);
        
        $studentPerm4 = new Permission();
        $studentPerm4->slug = 'create-chat-box'; // co the tao kenh tan gau
        $studentPerm4->name = 'Create chat box';
        $studentPerm4->title = 'Create a chatting channel for multi-student';
        $studentPerm4->icon_class = 'far fa-comments';
        $studentPerm4->route_link = '/student/create-a-chatbox';
        $studentPerm4->save();
        $studentPerm4->roles()->attach($student_role);
    }
}
