<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImgVideoTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('post_image_video', function(Blueprint $table) {
      $table->increments('id');
      $table->string('hash');
      $table->string('path');
      $table->string('extension', 10);
      $table->boolean('is_video');
      $table->boolean('is_image');
      $table->boolean('is_active');
      $table->integer('user_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('post_image_video');
  }

}
