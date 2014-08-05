<?php

class TesterController extends BaseController {


	public function generate_test($id) {
		return View::make('tester.testTemplate')
		->with('title', 'Test')
		->with('test', Test::where('id', '=', $id)->with('questions')->first());
	}
}