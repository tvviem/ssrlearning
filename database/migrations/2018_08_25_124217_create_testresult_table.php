<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestresultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ghi nhận kết quả sau cùng của sinh viên
        Schema::create('test_result', function (Blueprint $table) {
            $table->integer('user_id')->unsigned(); // ID nguoi dung (sinh vien)
            $table->integer('test_code_id')->unsigned(); // ID bo de
            $table->float('result', 2, 2)->nullable(); // khi tham gia chua ghi nhan ket qua

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test_code_id')->references('id')->on('test_code')->onDelete('cascade');
            $table->index(['user_id', 'test_code_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testresult');
    }
}
