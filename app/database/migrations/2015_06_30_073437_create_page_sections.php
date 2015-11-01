<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePageSections extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('section_name')->nullable();
			$table->string('section_sub_heading')->nullable();
			$table->string('section_file_name')->nullable();
			$table->integer('section_seq')->default(0);
			$table->tinyInteger('section_status')->default(1);
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
		Schema::drop('page_sections');
	}

}
