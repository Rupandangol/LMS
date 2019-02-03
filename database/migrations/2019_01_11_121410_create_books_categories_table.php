<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id')->unsigned()->nullable();
            $table->integer('books_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('books_id')->references('id')->on('books')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_categories');
    }
}
