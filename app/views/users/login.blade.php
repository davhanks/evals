@extends('layouts.login')

@section('content')
<div class="login_container">
	@if($errors->has())
	<div class="alert alert-danger">
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
	@endif
	<div class="row">
		<div>
			<div id="loginForm">
			{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
			    {{ HTML::image('images/login.jpg'); }}
			 
			    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }} <br />
			    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }} <br />
			    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary'))}}
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>	
@stop