<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 900); // max ~ 20000 char
            $table->boolean('is_actived')->nullable($value = false);
            
            $table->integer('branch_id')->unsigned(); // ID Nhanh kien thuc
            $table->integer('level_id')->unsigned(); // ID muc do kho, de
            $table->integer('type_id')->unsigned(); // ID Loai cau hoi
            $table->integer('user_id')->unsigned(); // Nguoi ra cau hoi
            
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['branch_id', 'level_id', 'type_id', 'user_id']);
            $table->index(['user_id', 'branch_id', 'level_id']);
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
        Schema::dropIfExists('questions');
    }
}
