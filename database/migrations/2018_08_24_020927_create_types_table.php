<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Phân loại câu hỏi: trắc nghiệm 1 phương án/hoặc nhiều phương án,
        //                  true/false, so khớp (matches)
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name', 30)->unique();
            $table->string('type_description', 60)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
