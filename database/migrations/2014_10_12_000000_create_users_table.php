<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 40)->unique(); // Tên đăng nhập
            $table->string('email', 100)->unique(); // cũng có thể dùng email đăng nhập
            $table->string('password', 80); // have built-in bcrypt in laravel
            
            $table->string('first_name', 15); // tên: Viêm
            $table->string('last_name', 45); // họ va Lot: Trieu Vinh
            $table->string('work_place', 40)->nullable(); // họ: noi cong tac hoac lop
            $table->string('code', 14)->nullable(); // Mã sinh viên hoặc mã giảng viên
            $table->string('path_avatar', 80)->nullable($value='profile.png'); // Tên tập tin hình ảnh
            
            $table->boolean('active')->default(false); // Kích hoạt chưa
            $table->string('activation_token', 100);
            
            // $table->integer('role_id')->unsigned();
            // $table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
