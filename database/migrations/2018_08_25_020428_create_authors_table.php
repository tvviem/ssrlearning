<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tập các tác giả của tài liệu
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 40); // Vinh Viem
            $table->string('last_name', 15); // Trieu
            $table->string('email', 100)->nullable(); // email author
            $table->string('work_at', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
