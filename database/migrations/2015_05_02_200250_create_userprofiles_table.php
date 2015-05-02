<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateUserprofilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('first_name', 100)->nullable()->default('null');
            $table->string('last_name', 100)->nullable()->default('null');
            $table->tinyInteger('gender')->unsigned()->nullable();
            $table->string('contact_email', 150)->nullable()->default('null');
            $table->bigInteger('mobile_phone')->unsigned()->nullable();
            $table->string('address', 150)->nullable()->default('null');
            $table->string('city', 150)->nullable()->default('null');
            $table->string('county', 150)->nullable()->default('null');
            $table->string('state', 150)->nullable()->default('null');
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
        Schema::drop('userprofiles');
    }

}