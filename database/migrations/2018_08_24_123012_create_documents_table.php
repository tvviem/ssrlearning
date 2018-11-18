<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tài liệu hỗ trợ học tập
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_name', 60); // Tua de tai lieu
            $table->string('doc_type', 30); // loai tai lieu: bai giang, giao trinh, sach
            $table->integer('publish_year')->unsigned();
            $table->integer('page_number')->unsigned(); // So trang giup phan biet tai lieu
            $table->string('url_download', 200); // URL tu cac o dia truc tuyen
            $table->string('file_cover', 40)->nullable(); // ten tap tin hinh anh bia cua tai lieu
            $table->integer('user_id')->unsigned(); // Nguoi cung cap tai lieu

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('documents');
    }
}
