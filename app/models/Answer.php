<?php

class Answer extends Eloquent {

	public static $rules = array(
		'text'=>'required',
		'is_correct'=>'boolean',
		'questionID'=>'numeric'
	);

	public function question() {
		return $this->belongsTo('Question', 'id');
	}

	public function is_active() {
		if ($this->is_active == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function is_correct() {
		if ($this->is_correct == 1) {
			return true;
		} else {
			return false;
		}
	}

}