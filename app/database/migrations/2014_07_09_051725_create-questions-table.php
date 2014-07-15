<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function($table) {
			$table->increments('id');
			$table->string('text');
			$table->integer('question_number')->unsigned();
			$table->integer('point_value');
			$table->timestamps();
			$table->boolean('is_active');
			$table->integer('test_id')->unsigned();
		});
		

		Schema::table('questions', function($table) {
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
		Schema::drop('questions');
	}

}
