<?php

class Submission extends Eloquent {


	public function user() {
		return $this->belongsTo('User', 'id');
	}

	public function test() {
		return $this->belongsTo('Test', 'id');
	}


}