<?php

class Question extends Eloquent {

	public static $rules = array(
		'name'=>'required|min:2',
		'description'=>'required|min:10',
		'courseID'=>'numeric'
	);

	public function test() {
		$this->belongsTo('Test', 'id');
	}


}