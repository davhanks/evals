<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {


	public static $rules = array(
	    'first_name'=>'required|alpha|min:2',
	    'last_name'=>'required|alpha|min:2',
	    'email'=>'required|email|unique:users',
	    'password'=>'required|alpha_num|between:6,20|confirmed',
	    'password_confirmation'=>'required|alpha_num|between:6,20'
    );

    public static $signup = array(
    	'signup_id'=>'required|alpha_num'
    );

    public function sanitize($input) {
		return HTML::entities($input);
	}

	public function is_staff() {
		if ($this->is_staff == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function is_superuser() {
		if ($this->is_superuser == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function is_active() {
		if ($this->is_active == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function courses() {
		return $this->hasMany('Course');
	}

	public function settings() {
		return $this->hasOne('Setting');
	}
	public function erollments() {
		return $this->belongsToMany('Course', 'enrollments', 'student_id', 'course_id');
	}

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
