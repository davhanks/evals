@extends('layouts.default')

@section('content')

<div class="main_section">
	<div class="row">
		<div class="col-md-5 col-md-offset-1">
	@if($errors->has())
	<div class="alert alert-danger">
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
	@endif
	{{ Form::open(array('url'=>'courses/create_course', 'method'=>'post')) }}
			<h1>Registration</h1>
			
			{{ Form::text('name', null, array('placeholder'=>'Course Name')) }} <br />
			{{ Form::textarea('description', null, array('placeholder'=>'Description')) }} <br />

			{{ Form::submit('Create Course', array('class'=>'btn btn-primary')) }}


		
	{{ Form::close() }}
			</div>
	</div>
</div>
@stop