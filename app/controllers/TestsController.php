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

	public function get_student_tests($id) {
		return View::make('tests.list')
		->with('title', 'Tests')
		->with('course', Course::find($id))
		->with('tests', Test::where('course_id', '=', $id)->get());
	}

	public function get_test_detail($id) {
		$test = Test::find($id);
		return View::make('tests.detail')
		->with('title', $test->name)
		->with('test', $test);
	}

	public function get_test_new($courseid) {
		return View::make('tests.new')
			->with('title', 'Create New Test')
			->with('courseid', $courseid);
	}

	public function post_create_test() {

		$v = Validator::make(Input::all(), Test::$rules);
		if ($v->fails()) {
			return Redirect::to('tests/' . Input::get('courseID') . '/new')->withErrors($v)->withInput();
		} else {
			$test = new Test;
			$test->name = $test->sanitize(Input::get('name'));
			$test->description = $test->sanitize(Input::get('description'));
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

	public function post_switch_active() {

		if(Request::AJAX()){
			$testID = $_POST['testID'];
			$test = Test::find($testID);
			if($test->is_active()) {
				$test->is_active = '0';
				$test->save();
				return $test->name . ' is now Inactive';
			} else {
				$test->is_active = '1';
				$test->save();
				return $test->name . ' is now Active';
			}
		}
	}

	public function post_edit_test() {

		if(Request::AJAX()) {

			$v = Validator::make(Input::all(), Test::$rules);

			if($v->fails()) {

				return Response::json(array(
					'success'=>false,
					'errors'=> $v->getMessageBag()->toArray()
				), 200);
			}

			$test = Test::find(Input::get('testID'));
			$test->name = e(Input::get('name'));
			$test->description = e(Input::get('description'));
			$test->date_due = new DateTime(Input::get('date_due'));
			$test->save();

			return json_encode(array(
					'success'=>true,
					'name'=>$test->name,
					'description'=>$test->description,
				));
		}
	}




}