<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('number_of_questions')->unsigned();
			$table->dateTime('date_due');
			$table->integer('total_points');
			$table->timestamps();
			$table->boolean('is_active');
			$table->integer('course_id')->unsigned();
		});
		

		Schema::table('tests', function($table) {
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
		Schema::drop('tests');
	}

}
