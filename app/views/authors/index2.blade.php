@extends('layouts.default')

@section('content')
	<h1>Author's Home Page</h1>
	<ul>
	@foreach($authors as $author)
		<li>{{ HTML::linkRoute('author', $author->name, array($author->id)) }}</li>
	@endforeach
	</ul>

@stop