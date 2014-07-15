<?php

class UsersController extends BaseController {
	
	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('get_dashboard')));
	    $this->beforeFilter('auth', array('only'=>array('get_staff_dashboard')));
	    $this->beforeFilter('is_staff', array('only'=>array('get_staff_dashboard')));
	    $this->beforeFilter('is_superuser', array('only'=>array('get_dashboard')));
	    $this->beforeFilter('is_superuser', array('only'=>array('get_user_list')));
	}


	public function get_register() {
		return View::make('users.register');
	}

	public function post_create() {

		$validation = Validator::make(Input::all(), User::$rules);
		if ($validation->fails()) {
			return Redirect::route('register_user')->withErrors($validation)->withInput();
		} else {
			$user = new User;
			$user->first_name = $user->sanitize(Input::get('first_name'));
			$user->last_name = $user->sanitize(Input::get('last_name'));
			$user->email = $user->sanitize(Input::get('email'));
			$user->password = $user->sanitize(Hash::make(Input::get('password')));
			$user->is_active = '1';
			$user->save();


			return Redirect::to('users/login')->with('message', 'Registration Successful!');
		}

	}

	public function get_login() {
		return View::make('users.login');
	}

	public function post_sign_in() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
		    return Redirect::to('users/login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	public function get_dashboard() {

		return View::make('users.dashboard')->with('user', Auth::user());
	}

	public function get_staff_dashboard() {

		return View::make('users.staffdashboard')->with('user', Auth::user());
	}

	public function get_user_list() {
		return View::make('users.list')->with('users', User::all());
	}

	//Temperature fetcher for displaying temperature alerts
	public function get_temperature() {
		// $url = 'http://w1.weather.gov/xml/current_obs/KSMF.xml'; 
		// $xml = simplexml_load_file($url);

		if(Request::AJAX()){
			return 'Temperature is over 100 deg';
		}
	}

	public function get_logout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'You have been logged out');
	}


	//Controller functions for changing permissions of a user
	public function get_activate($id) {
		$user = User::find($id);
		$user->is_active = '1';
		$user->save();

		return Redirect::to('users/list');
	}

	public function get_inactivate($id) {
		$user = User::find($id);
		$user->is_active = '0';
		$user->save();

		return Redirect::to('users/list');
	}

	public function get_make_superuser($id) {
		$user = User::find($id);
		$user->is_superuser = '1';
		$user->save();

		return Redirect::to('users/list');
	}

	public function get_remove_superuser($id) {
		$user = User::find($id);
		$user->is_superuser = '0';
		$user->save();

		return Redirect::to('users/list');
	}

	public function get_make_staff($id) {
		$user = User::find($id);
		$user->is_staff = '1';
		$user->save();

		return Redirect::to('users/list');
	}

	public function get_remove_staff($id) {
		$user = User::find($id);
		$user->is_staff = '0';
		$user->save();

		return Redirect::to('users/list');
	}

	
}