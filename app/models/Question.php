<?php

class Question extends Eloquent {

	public static $rules = array(
		'text'=>'required|min:5',
		'point_value'=>'numeric'
	);

	public function test() {
		return $this->belongsTo('Test', 'id');
	}

	public function answers() {
		return $this->hasMany('Answer');
	}

}