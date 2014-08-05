<?php

class Question extends Eloquent {

	public static $rules = array(
		'text'=>'required|min:5',
		'point_value'=>'required|numeric|min:1'
	);

	public function test() {
		return $this->belongsTo('Test', 'id');
	}

	public function answers() {
		return $this->hasMany('Answer');
	}

	public function is_active() {

		if($this->is_active == true) {
			return true;
		} else {
			return false;
		}
	}

}