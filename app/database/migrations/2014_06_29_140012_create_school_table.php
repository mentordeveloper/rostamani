<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('timezone', function(Blueprint $table) {
            $table->increments('id');
            $table->string('GMT');
            $table->string('name');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('school', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('type');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('sub_domain')->unique();
            $table->string('lang');
            $table->integer('time_zone');
            $table->boolean('status');
            $table->timestamps();
//            $table->foreign('time_zone')->references('id')->on('timezone');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('school');
        Schema::drop('timezone');
    }

}
