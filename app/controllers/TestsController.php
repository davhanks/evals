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
		return View::make('tests.list')->with('tests', Test::all());
	}

}