@extends('layouts.default')

@section('content')
	<h1>Author's Home Page</h1>
	<ul>
	@foreach($authors as $author)
		<li><a class="btn btn-danger" href="{{ URL::to('author/' . $author->id) }}">{{ $author->name }}</a></li>
	@endforeach
	</ul>

	<a class="btn btn-primary" href="{{ URL::to('authors/new') }}">New Author</a>
@stop