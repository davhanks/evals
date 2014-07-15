@extends('layouts.default')

@section('content')
	<h1>Add New Author</h1>


	@if($errors->has())
		<ul>
			{{ $errors->first('name', '<li>:message</li>') }}
			{{ $errors->first('bio', '<li>:message</li>') }}
		</ul>
	@endif
	{{ Form::open(array('url'=>'authors/create', 'method'=>'post')) }}
		<p>
			
			{{ Form::text('name', Input::old('name')) }}
		</p>

		<p>
			
			{{ Form::textarea('bio', Input::old('bio')) }}
		</p>

		<p>{{ Form::submit('Add Author') }}</p>
	{{ Form::close() }}
@stop