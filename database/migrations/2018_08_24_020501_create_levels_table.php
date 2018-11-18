<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Phân loại mức đồ khó của câu hỏi
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level', 20)->unique(); // Muc do: de, kho, vua, cuc kho
            $table->string('level_description', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
