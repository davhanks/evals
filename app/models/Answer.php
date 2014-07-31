<?php

class Answer extends Eloquent {

	public static $rules = array(
		'text'=>'required|min:5',
		'is_correct'=>'boolean'
	);

	public function question() {
		return $this->belongsTo('Question', 'id');
	}

}