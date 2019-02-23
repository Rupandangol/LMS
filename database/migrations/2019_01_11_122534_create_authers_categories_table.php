<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthersCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authers_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authers_id')->unsigned()->nullable();
            $table->integer('categories_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('authers_id')->references('id')->on('authers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authers_categories');
    }
}
