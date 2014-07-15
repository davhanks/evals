<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submissions', function($table) {
			$table->increments('id');
			$table->boolean('is_finished');
			$table->integer('points_earned');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('test_id')->unsigned();
		});
		

		Schema::table('submissions', function($table) {
			$table->foreign('student_id')->references('id')->on('users');
			$table->foreign('test_id')->references('id')->on('tests');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('submissions');
	}

}
