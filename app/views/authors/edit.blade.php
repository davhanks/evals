@extends('layouts.default')

@section('content')
	<h1>Editing {{ $author->name }}</h1>

	@if($errors->has())
		<ul>
			{{ $errors->first('name', '<li>:message</li>') }}
			{{ $errors->first('bio', '<li>:message</li>') }}
		</ul>
	@endif

	{{ Form::open(array('url'=>'author/update', 'method'=>'put')) }}
		<p>
			{{ Form::text('name', $author->name, array('placeholder'=>'Name')) }}
		</p>

		<p>
			{{ Form::textarea('bio', $author->bio) }}
		</p>

		{{ Form::hidden('id', $author->id) }}

		<p>{{ Form::submit('Update Author') }}</p>
	{{ Form::close() }}
@stop