<?php

class Test extends Eloquent {
	
	protected $fillable = array('name', 'bio');

	public static $rules = array(
		'name'=>'required|min:2',
		'bio'=>'required|min:10'
	);

	public function validate($data) {

		return Validator::make($data, static::$rules);
	}

	public function sanitize($input) {
		return HTML::entities($input);
	}
}