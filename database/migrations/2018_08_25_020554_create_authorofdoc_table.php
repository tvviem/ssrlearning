<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorofdocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_of_doc', function (Blueprint $table) {
            $table->integer('doc_id')->unsigned(); // ID tai lieu
            $table->integer('author_id')->unsigned(); // ID tac gia

            $table->foreign('doc_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->primary(['doc_id', 'author_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorofdoc');
    }
}
