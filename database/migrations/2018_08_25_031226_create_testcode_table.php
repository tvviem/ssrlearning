<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Bieu dien tap cac bo de kiem tra, bao gom cac cau hoi chua kich hoat
        // Bộ đề do giảng viên tạo, chỉ có họ mới biết mật mã mở đề
        Schema::create('test_code', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 16)->unique(); // Ma bo de
            $table->tinyInteger('num_of_question');
            $table->string('encode_list_id', 500); // Ma hoa cac question_id trong bo de
            $table->tinyInteger('duration'); // Thoi gian lam bai cua bo de
            
            $table->integer('user_id')->unsigned(); // Giang vien ra bo de kiem tra
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            
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
        Schema::dropIfExists('testcode');
    }
}