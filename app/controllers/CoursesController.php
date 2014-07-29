<?php

class CoursesController extends BaseController {
	public function __construct() {
	    // $this->beforeFilter('csrf', array('on'=>'post'));
	    // $this->beforeFilter('auth', array('only'=>array('get_dashboard')));
	    
	    // $this->beforeFilter('is_staff', array('only'=>array('get_staff_dashboard')));
	    // $this->beforeFilter('is_staff', array('only'=>array('get_dashboard')));
	    // $this->beforeFilter('is_superuser', array('only'=>array('get_user_list')));
	    // $this->beforeFilter('AJAX_is_superuser', array('only'=>array('post_switch_active')));
	}


	public function get_course_list() {
		if(Auth::user()->is_superuser == '1'){
			return View::make('courses.list')->with('title', 'Course List')
				->with('courses', Course::with('user')->get());
		} elseif(Auth::user()->is_staff == '1'){
			return View::make('courses.list')->with('title', 'Course List')
				->with('courses', Course::where('instructor_id', '=', Auth::user()->id)->get());
		} else{
			return Redirect::to('users/dashboard')->with('message', 'Permission to view denied');
		}
		
	}

	public function get_view_course($id) {
		return View::make('courses.view')->with('title', 'View Course')->with('course', Course::find($id));
	}

	public function get_create_course() {
		return View::make('courses.create')->with('title', 'Create Course');
	}

	public function post_create_course() {

		$validation = Validator::make(Input::all(), Course::$rules);
		if ($validation->fails()) {
			return Redirect::route('create_course')->withErrors($validation)->withInput();
		} else {
			$course = new Course;
			$course->name = $course->sanitize(Input::get('name'));
			$course->description = $course->sanitize(Input::get('description'));
			$course->is_active = '1';
			$course->instructor_id = Auth::user()->id;
			$course->save();


			return Redirect::to('courses/list')->with('message', 'Course Created Successfully!');
		}
	}

	public function post_switch_active() {

		if(Request::AJAX()){
			$cid = $_POST['courseid'];
			$course = Course::find($cid);
			if($course->is_active == '1') {
				$course->is_active = '0';
				$course->save();
				return $course->name . ' is now inactive';
			} else {
				$course->is_active = '1';
				$course->save();
				return $course->name . ' is now active';
			}
		}
	}

}