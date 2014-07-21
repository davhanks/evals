<?php

class UsersController extends BaseController {
	
	public function __construct() {
	    // $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('get_dashboard')));
	    
	    $this->beforeFilter('is_staff', array('only'=>array('get_staff_dashboard')));
	    // $this->beforeFilter('is_staff', array('only'=>array('get_dashboard')));
	    $this->beforeFilter('is_superuser', array('only'=>array('get_user_list')));
	    $this->beforeFilter('AJAX_is_superuser', array('only'=>array('post_switch_active')));
	}


	public function get_register() {
		return View::make('users.register')->with('title', 'Registration');
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
			$user->is_staff = '0';
			$user->is_superuser = '0';
			$user->save();


			return Redirect::to('users/login')->with('message', 'Registration Successful!');
		}

	}

	public function get_login() {
		return View::make('users.login')->with('title', 'Login');
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

		return View::make('users.dashboard')->with('title', 'Dashboard')->with('user', Auth::user());
	}

	public function get_staff_dashboard() {

		return View::make('users.staffdashboard')->with('title', 'Staff Dashboard')->with('user', Auth::user());
	}

	public function get_user_list() {
		return View::make('users.list')->with('title', 'User List')->with('users', User::all());
	}

	//Temperature fetcher for displaying temperature alerts
	public function get_temperature() {
		$apiKey = 'b6d7b34df7e2ee938658576b0f581fc6';
		$url ='https://api.forecast.io/forecast/b6d7b34df7e2ee938658576b0f581fc6/38.58,-121.49';
		// $url = 'http://api.openweathermap.org/data/2.5/weather?q=Sacramento';
		$JSONstr = file_get_contents($url);
		$response = json_decode($JSONstr);

		$temp = $response->currently->temperature;

		// if(Request::AJAX()){
		// 		return $temp;
		// 	}
		// $faren = ($temp-273.15)*9/5 + 32;
		if($temp >= 40){
			if(Request::AJAX()){
				return '<span class="glyphicon glyphicon-exclamation-sign"></span> The temperature is: ' . $temp . ' deg';
			}
		}

		
	}



	public function get_logout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'You have been logged out');
	}


	//Controller functions for changing permissions of a user
	public function post_switch_active() {

		if(Request::AJAX()){
			$uid = $_POST['userid'];
			$user = User::find($uid);
			if($user->is_active == '1') {
				$user->is_active = '0';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is now inactive';
			} else {
				$user->is_active = '1';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is now active';
			}
		}
	}

	public function post_switch_staff() {

		if(Request::AJAX()){
			$uid = $_POST['userid'];
			$user = User::find($uid);
			if($user->is_staff == '1') {
				$user->is_staff = '0';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is no longer staff';
			} else {
				$user->is_staff = '1';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is now staff';
			}
		}
	}

	public function post_switch_superuser() {

		if(Request::AJAX()){
			$uid = $_POST['userid'];
			$user = User::find($uid);
			if($user->is_superuser == '1') {
				$user->is_superuser = '0';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is no longer a superuser';
			} else {
				$user->is_superuser = '1';
				$user->save();
				return $user->first_name . ' ' . $user->last_name . ' is now a superuser';
			}
		}
	}



	// public function get_activate($id) {
	// 	$user = User::find($id);
	// 	$user->is_active = '1';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	// public function get_inactivate($id) {
	// 	$user = User::find($id);
	// 	$user->is_active = '0';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	// public function get_make_superuser($id) {
	// 	$user = User::find($id);
	// 	$user->is_superuser = '1';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	// public function get_remove_superuser($id) {
	// 	$user = User::find($id);
	// 	$user->is_superuser = '0';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	// public function get_make_staff($id) {
	// 	$user = User::find($id);
	// 	$user->is_staff = '1';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	// public function get_remove_staff($id) {
	// 	$user = User::find($id);
	// 	$user->is_staff = '0';
	// 	$user->save();

	// 	return Redirect::to('users/list');
	// }

	
}
