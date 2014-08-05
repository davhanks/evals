<?php

class TesterController extends BaseController {


	public function generate_test($id) {
		return View::make('tester.testTemplate')
		->with('title', 'Test')
		->with('test', Test::where('id', '=', $id)->with('questions')->first());
	}

	public function submit_test() {
		$input = Input::except('_token');

		if($input['userID'] != Auth::user()->id) {
			return Redirect::to('users/dashboard')->with('message', "User ID's for logged in user and user submitting test did not match!");
		}
		return $input;
	}
}