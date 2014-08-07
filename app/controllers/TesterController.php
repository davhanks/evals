<?php

class TesterController extends BaseController {


	public function generate_test($id) {

		$submission = Submission::where('student_id', '=', Auth::user()->id)->where('is_finished', '=', 0)->first();

		if( empty($submission) ) {
			$submission = new Submission;
			$submission->is_finished = 0;
			$submission->points_earned = 0;
			$submission->student_id = Auth::user()->id;
			$submission->test_id = $id;
			$submission->save();
		}
		

		return View::make('tester.testTemplate')
		->with('title', 'Test')
		->with('submissionID', $submission->id)
		->with('test', Test::where('id', '=', $id)->with('questions')->first());
	}

	public function submit_test() {
		$input = Input::except('_token');

		if($input['userID'] != Auth::user()->id) {
			return Redirect::to('users/dashboard')->with('message', "User ID's for logged in user and user submitting test did not match!");
		}

		$testID = $input['testID'];
		$submission = Submission::find($input['submissionID']);

		unset($input['userID']);
		unset($input['testID']);
		unset($input['submissionID']);

		$questions = [];

		//TODO add logic for saving answers to each question and recording new submission questions entry in DB
		foreach($input as $key => $value) {
			array_push($questions, Question::find($key + 1)->text);
		}




		$submission->is_finished = 1;
		$submission->save();




		return $questions;
	}
}