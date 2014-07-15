<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrollments', function($table) {
			$table->increments('id');
			$table->boolean('is_active');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('course_id')->unsigned();
		});
		

		Schema::table('enrollments', function($table) {
			$table->foreign('student_id')->references('id')->on('users');
			$table->foreign('course_id')->references('id')->on('courses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enrollments');
	}

}
