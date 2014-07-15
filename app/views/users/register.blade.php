@extends('layouts.register')

@section('content')
	

	<div class="register_container">
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
	@if($errors->has())
	<div class="alert alert-danger">
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
	@endif
	{{ Form::open(array('url'=>'users/create', 'method'=>'post')) }}
			<h1>Registration</h1>
			
			{{ Form::text('first_name', null, array('placeholder'=>'First Name')) }} <br />
			{{ Form::text('last_name', null, array('placeholder'=>'Last Name')) }} <br />
			{{ Form::text('email', null, array('placeholder'=>'Email')) }} <br />
			{{ Form::password('password', array('placeholder'=>'Password')) }} <br />
			{{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }} <br />
			{{ Form::submit('Register', array('class'=>'btn btn-primary')) }}


		
	{{ Form::close() }}
			</div>
	</div>
</div>	
@stop