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
				->with('courses', Course::all());
		} elseif(Auth::user()->is_staff == '1'){
			return View::make('courses.list')->with('title', 'Course List')
				->with('courses', Course::whereHas('course_id', '=', '1')->get());
		} else{
			return Redirect::to('users/dashboard')->with('message', 'Permission to view denied');
		}
		
	}

}