<?php

class AnswersController extends BaseController {
	
	public function __construct() {

	}

	public function get_answer_new($questionID) {
		return View::make('answers.new')
		->with('title', 'New Answer')
		->with('questionID', $questionID);
	}

	public function post_answer_create() {

		$v = Validator::make(Input::all(), Answer::$rules);

		if($v->fails()) {
			return Redirect::to('answers/' . Input::get('questionID') . '/new')->withErrors($v)->withInput();
		} else {

			$answer = new Answer;
			$answer->text = e(Input::get('text'));
			if(Input::get('is_correct') == null) {
				$answer->is_correct = false;
			} else {
				$answer->is_correct = true;
			}
			
			$answer->is_active = true;
			$answer->question_id = Input::get('questionID');
			$answer->save();

			return Redirect::to('questions/' . Input::get('questionID') . '/view');
		}
	}

}