<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('grades', function(Blueprint $table) {
      $table->increments('id');
            $table->integer('s_id');
            $table->string('gr_name')->unique();
      $table->string('url_key');
      $table->integer('user_id');
      $table->boolean('is_active');
      $table->timestamps();
    });

    // Creates the user_grades (Many-to-Many relation) table
    Schema::create('users_grades', function($table) {
      $table->increments('id');
            $table->integer('s_id');
            $table->integer('grade_id')->unsigned()->index();
      $table->integer('user_id')->unsigned()->index();
      $table->boolean('is_completed');
      $table->boolean('is_active');
      $table->timestamps();
      $table->unique(array('grade_id', 'user_id'));
      $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('grades');
    Schema::drop('users_grades');
  }

}
