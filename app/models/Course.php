<?php

class Course extends Eloquent {
	
	// protected $fillable = array('name', 'bio');

	public static $rules = array(
		'name'=>'required|min:2',
		'description'=>'required|min:10',
		'courseID'=>'alpha_num'
	);

	public function validate($data) {

		return Validator::make($data, static::$rules);
	}

	public function sanitize($input) {
		return HTML::entities($input);
	}

	public function user() {
		return $this->belongsTo('User', 'id');
	}

	public function tests() {
		return $this->hasMany('Test');
	}

	public function is_active() {
		if ($this->is_active == 1) {
			return true;
		} else {
			return false;
		}
	}
}
