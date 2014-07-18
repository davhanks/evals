<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// return View::make('hello');
	return Redirect::to('users/login');
});

// Authors Routes
Route::get('authors', array('as'=>'authors', 'uses'=>'authors@get_index'));
Route::get('author/{id}', array('as'=>'author', 'uses'=>'authors@view'))
	->where('id', '[0-9]+');
Route::get('authors/new', array('as'=>'new_author', 'uses'=>'authors@get_new'));
Route::post('authors/create', 'authors@create');
Route::get('author/{id}/edit', array('as'=>'edit_author', 'uses'=>'authors@edit'))
	->where('id', '[0-9]+');
Route::put('author/update', array('uses'=>'authors@update'));


// Users routes
Route::get('users/register', array('as'=>'register_user', 'uses'=>'UsersController@get_register'));
Route::post('users/create', array('uses'=>'UsersController@post_create'));

Route::get('users/login', array('as'=>'login', 'uses'=>'UsersController@get_login'));
Route::post('users/signin', array('uses'=>'UsersController@post_sign_in'));
Route::get('users/logout', array('uses'=>'UsersController@get_logout'));

Route::get('users/dashboard', array('as'=>'dashboard', 'uses'=>'UsersController@get_dashboard'));
Route::get('users/staffdashboard', array('as'=>'staff_dashboard', 'uses'=>'UsersController@get_staff_dashboard'));
Route::get('users/list', array('as'=>'user_list', 'uses'=>'UsersController@get_user_list'));

Route::get('users/{id}/activate', array('uses'=>'UsersController@get_activate'))
	->where('id', '[0-9]+');
Route::get('users/{id}/inactivate', array('uses'=>'UsersController@get_inactivate'))
	->where('id', '[0-9]+');

Route::get('users/{id}/make_superuser', array('uses'=>'UsersController@get_make_superuser'))
	->where('id', '[0-9]+');
Route::get('users/{id}/remove_superuser', array('uses'=>'UsersController@get_remove_superuser'))
	->where('id', '[0-9]+');

Route::get('users/{id}/make_staff', array('uses'=>'UsersController@get_make_staff'))
	->where('id', '[0-9]+');
Route::get('users/{id}/remove_staff', array('uses'=>'UsersController@get_remove_staff'))
	->where('id', '[0-9]+');

//AJAX

Route::get('users/temperature', array('uses'=>'UsersController@get_temperature'));

Route::post('users/switch_active', array('uses'=>'UsersController@post_switch_active'));
Route::post('users/switch_staff', array('uses'=>'UsersController@post_switch_staff'));
Route::post('users/switch_superuser', array('uses'=>'UsersController@post_switch_superuser'));


// Courses Routes
Route::get('courses/list', array('as'=>'course_list', 'uses'=>'CoursesController@get_course_list'));
Route::get('courses/create', array('as'=>'create_course', 'uses'=>'CoursesController@get_create_course'));
Route::post('courses/create_course', array('uses'=>'CoursesController@post_create_course'));

// Tests Routes
Route::get('tests/list', array('as'=>'test_list', 'uses'=>'TestsController@get_test_list'));

// Route::post('authors', array('uses'=>'authors@post_index'));

// Route::get('authors', 'Authors@index');

// Route::get('authors', function()
// {
// 	return View::make('authors.index');
// });