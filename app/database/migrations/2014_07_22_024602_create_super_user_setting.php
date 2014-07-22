<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperUserSetting extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('settings')->insert(array(
			'temp_limit'=>'95',
			'turned_on'=>'1',
			'user_id'=>1,
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('settings')->where('user_id', '=', 1)->delete();
	}

}
