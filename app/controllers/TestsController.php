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

}