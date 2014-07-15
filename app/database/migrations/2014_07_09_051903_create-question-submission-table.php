<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSubmissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_submissions', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('submission_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->integer('answer_id')->unsigned();
		});
		

		Schema::table('question_submissions', function($table) {
			$table->foreign('submission_id')->references('id')->on('submissions');
			$table->foreign('question_id')->references('id')->on('questions');
			$table->foreign('answer_id')->references('id')->on('answers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_submissions');
	}

}
