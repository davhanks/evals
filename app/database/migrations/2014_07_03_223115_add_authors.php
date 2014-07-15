<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('authors')->insert(array(
			'name'=>'David Hanks',
			'bio'=>'David Hanks is freaking awesome',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Trevor Hanks',
			'bio'=>'Trevor Hanks is also freaking awesome',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Lindsay Hanks',
			'bio'=>'Lindsay Hanks is also freaking awesome',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Jonathan Gawrych',
			'bio'=>'Jonathan Gawrych is also freaking awesome',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Bilbo Baggins',
			'bio'=>'Bilbo Baggins is also freaking awesome',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Alex Zimmerman',
			'bio'=>'Alex Zimmerman is also freaking awesome',
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
		DB::table('authors')->delete(1);
		DB::table('authors')->delete(2);
		DB::table('authors')->delete(3);
		DB::table('authors')->delete(4);
		DB::table('authors')->delete(5);
		DB::table('authors')->delete(6);
	}

}
