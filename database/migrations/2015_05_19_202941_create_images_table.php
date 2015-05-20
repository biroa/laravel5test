<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id');
            $table->string('name', 150);
            $table->text('description', 150);
            $table->text('original_img_path', 255);
            $table->text('large_img_path', 255);
            $table->text('medium_img_path', 255);
            $table->text('small_img_path', 255);
            $table->string('camera', 50);
            $table->string('lens', 50);
            $table->string('focal_length', 50);
            $table->string('shutter_speed', 50);
            $table->string('aperture', 50);
            $table->string('iso', 50);
            $table->timestamps();
            $table->foreign('gallery_id')->references('id')->on('galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }

}
