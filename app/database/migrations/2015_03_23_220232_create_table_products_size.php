<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableProductsSize extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_size', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('is_parent')->default(0);
                        $table->string('size_name')->unique();
                        $table->string('url_key');
                        $table->string('is_parent_name');
                        $table->integer('user_id');
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
		Schema::drop('products_size');
	}

}
