<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
			'first_name'=>'David',
			'last_name'=>'Hanks',
			'email'=>'davidkhanks@gmail.com',
			'password'=>Hash::make('testpassword'),
			'is_staff'=>'1',
			'is_superuser'=>'1',
			'is_active'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users')->where('email', '=', 'davidkhanks@gmail.com')->delete();
	}

}
