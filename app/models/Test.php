<?php

class Test extends Eloquent {
	
	// protected $fillable = array('name', 'bio');

	public static $rules = array(
		'name'=>'required|min:2',
		'desc'=>'required|min:10',
		'courseID'=>'numeric',
		'date_due'=>'date'
	);

	public function validate($data) {

		return Validator::make($data, static::$rules);
	}

	public function sanitize($input) {
		return HTML::entities($input);
	}

	public function course() {
		return $this->belongsTo('Course', 'id');
	}

	public function questions() {
		return $this->hasMany('Question');
	}
}