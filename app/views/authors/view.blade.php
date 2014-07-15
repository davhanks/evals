@extends('layouts.default')

@section('content')
	<h1>{{ $author->name }}</h1>
	<p>{{ $author->bio }}</p>

	<a class="btn btn-primary" href="{{ URL::to('authors') }}">Author List</a>
	<a class="btn btn-warning" href="{{ URL::to('author/' . $author->id . '/edit') }}">Edit Author</a>
	<a class="btn btn-danger" href="{{ URL::to('author/' . $author->id . '/delete') }}">Delete Author</a>
@stop