<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('s_id')->unsigned()->index();
                        $table->integer('cat_id')->unsigned()->index();
                        $table->integer('sub_cat_id');
                        $table->integer('user_id')->unsigned()->index();
                        $table->string('name');
                        $table->string('price');
                        $table->integer('quantity');
                        $table->string('image');
                        $table->string('thumb_image');
                        $table->integer('size');
                        $table->text('desciption');
                        $table->string('slug');
                        $table->string('hash');
                        $table->boolean('is_active');
                        $table->longText('comments');
                        $table->integer('likes');
                        $table->timestamps();
                        $table->foreign('s_id')->references('id')->on('stores')->onDelete('cascade');
                        $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                    });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
