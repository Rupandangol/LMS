<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boks_id')->unsigned()->nullable();
            $table->integer('students_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('boks_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('students_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_students');
    }
}
