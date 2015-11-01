<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('term', function(Blueprint $table)
		{
           $table->increments('id');
            $table->integer('s_id');
            $table->string('term_name')->unique();
            $table->string('url_key');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('user_id');
            $table->boolean('is_active');
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
		Schema::drop('term');
	}

}
