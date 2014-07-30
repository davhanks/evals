<?php

class TestsController extends BaseController {
	public function __construct() {
	    // $this->beforeFilter('csrf', array('on'=>'post'));
	    // $this->beforeFilter('auth', array('only'=>array('get_dashboard')));
	    
	    // $this->beforeFilter('is_staff', array('only'=>array('get_staff_dashboard')));
	    // $this->beforeFilter('is_staff', array('only'=>array('get_dashboard')));
	    // $this->beforeFilter('is_superuser', array('only'=>array('get_user_list')));
	    // $this->beforeFilter('AJAX_is_superuser', array('only'=>array('post_switch_active')));
	}


	public function get_test_list() {
		if(Auth::user()->is_superuser == '1'){
			return View::make('tests.list')
				->with('title', 'Tests')
				->with('tests', Test::all());
		} elseif(Auth::user()->is_staff == '1'){
			return View::make('tests.list')
				->with('title', 'Tests')
				->with('tests', Test::where('course_id', '=', '1')->get());
		} else{
			return Redirect::to('users/dashboard')->with('message', 'Permission to view denied');
		}
		
	}

	public function get_test_new($courseid) {
		return View::make('tests.new')->with('title', 'Create New Test')->with('courseid', $courseid);
	}

	public function post_create_test() {

		$v = Validator::make(Input::all(), Test::$rules);
		if ($v->fails()) {
			return Redirect::to('tests/' . Input::get('courseID') . '/new')->withErrors($v)->withInput();
		} else {
			$test = new Test;
			$test->name = $test->sanitize(Input::get('name'));
			$test->description = $test->sanitize(Input::get('desc'));
			$test->number_of_questions = 0;
			$test->date_due = new DateTime(Input::get('date_due'));
			$test->total_points = 0;
			$test->is_active = '1';
			$test->course_id = Input::get('courseID');
			$test->save();

			return Redirect::to('courses/' . $test->course_id . '/view')->with('message', 'Test Creation Successful!');
		}

	}

	public function get_test_view($id) {
		return View::make('tests.view')
			->with('title', 'View Test')
			->with('test', Test::find($id))
			->with('questions', Question::where('test_id', '=', $id)->get());
	}

}