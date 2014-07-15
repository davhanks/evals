<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->timestamps();
			$table->boolean('is_active');
			$table->integer('instructor_id')->unsigned();
		});
		

		Schema::table('courses', function($table) {
			$table->foreign('instructor_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
