<?php

class Authors extends BaseController {

	// public $restful = true;

	public function get_index() {
		// $authors = ;

		return View::make('authors.index')
			->with('authors', Author::orderBy('name')->get());
	}

	public function view($id) {
		return View::make('authors.view')
			->with('author', Author::find($id));
	}

	public function post_index() {
		return View::make('authors.index');
	}

	public function get_new() {
		return View::make('authors.new');
	}

	public function create() {
		$author = new Author();
		$validation = $author->validate(Input::all());
		

		if($validation->fails()) {
			return Redirect::route('new_author')->withErrors($validation)->withInput();
		} else {

			$author->name = $author->sanitize(Input::get('name'));
			$author->bio = $author->sanitize(Input::get('bio'));
			$author->save();
			return Redirect::route('authors')
				->with('message', 'The author was successfully created!');
		}

	}

	public function edit($id) {
		return View::make('authors.edit')
			->with('author', Author::find($id));
	}

	public function update() {
		$id = Input::get('id');
		$author = Author::find($id);
		$validation = $author->validate(Input::all());

		if($validation->fails()) {
			return Redirect::route('edit_author', $id)->withErrors($validation);
		} else {
			$author->update(array(
				'name'=>Input::get('name'),
				'bio'=>Input::get('bio')
			));
			return Redirect::route('author', $id)
				->with('message', 'Author updated successfully');
		}
	}
}