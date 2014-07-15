<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
		    $table->string('first_name', 20);
		    $table->string('last_name', 20);
		    $table->string('email', 100)->unique();
		    $table->string('password', 64);
		    $table->boolean('is_staff');
		   	$table->boolean('is_superuser');
		   	$table->boolean('is_active');
		   	$table->rememberToken();
		    $table->timestamps();
		    $table->softDeletes();
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
