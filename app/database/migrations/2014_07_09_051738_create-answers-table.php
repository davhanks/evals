<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function($table) {
			$table->increments('id');
			$table->string('text');
			$table->boolean('is_correct');
			$table->timestamps();
			$table->boolean('is_active');
			$table->integer('question_id')->unsigned();
		});
		

		Schema::table('answers', function($table) {
			$table->foreign('question_id')->references('id')->on('questions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}
