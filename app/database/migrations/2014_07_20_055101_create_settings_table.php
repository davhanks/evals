<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function($table) {
			$table->increments('id');
			$table->integer('temp_limit');
			$table->boolean('turned_on');
			$table->dateTime('seen_at')->nullable();
			$table->integer('user_id')->unsigned();
		});

		Schema::table('settings', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
