<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name', 150);
            $table->string('thumbnail', 255);
            $table->integer('lg_width')->nullable();
            $table->integer('lg_height')->nullable();
            $table->integer('m_width')->nullable();
            $table->integer('m_height')->nullable();
            $table->integer('sm_width')->nullable();
            $table->integer('sm_height')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('galleries');
    }

}
