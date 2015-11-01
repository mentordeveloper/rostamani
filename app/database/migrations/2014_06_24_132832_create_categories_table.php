<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('categories', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('s_id');
            $table->string('cat_name')->unique();
            $table->string('url_key');
            $table->integer('user_id');
            $table->date('cate_date');
            $table->integer('term_id');
            $table->longText('comments');
            $table->boolean('is_active');
            $table->timestamps();
    });

    // Creates the s (Many-to-Many relation) table
    Schema::create('pages', function($table) {
      $table->increments('id');
      $table->integer('s_id');
            $table->integer('cat_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
      $table->string('title');
      $table->text('desciption');
      $table->string('slug');
      $table->string('hash');
      $table->boolean('is_video');
      $table->boolean('is_image');
      $table->boolean('is_text');
      $table->boolean('is_audio');
            $table->boolean('is_doc');
            $table->boolean('is_active');
            $table->longText('comments');
            $table->timestamps();
      $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('categories');
    Schema::drop('pages');
  }

}
