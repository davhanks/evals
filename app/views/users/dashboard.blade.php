@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>


		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Answers</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit Question</a></li>
			</ul>
			<div id="panel1">
				<p>{{ $user->first_name }} {{ $user->last_name }}</p>
				<p>Roles: 
				@if($user->is_superuser())
					<span class="label label-primary"><i class="fa fa-user"></i> Superuser</span>, 
				@endif
				@if($user->is_staff())
					<span class="label label-success">Staff</span> 
				@endif
				</p>
				<p>Member since: {{ $user->created_at->format('M-d-Y'); }}</p>
			</div>
			<div id="panel2">
				<a class="btn btn-success" href=""><span class="glyphicon glyphicon-plus"></span> New Answer</a>
				<table class="table">
					<thead>
						<th>Text</th>
						<th>Is Correct</th>
						<th>Active</th>
						<th>Action</th>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
			<div id="panel3">
				{{ Form::open(array('URL'=>'/users/signup', 'id'=>'signup')); }}
				{{ Form::Input('text', 'signup', null, array('class'=>'form-control', 'placeholder'=>'Sign-up ID')) }}
				{{Form::button('<span class="glyphicon glyphicon-pencil"></span> Sign-up', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
				{{ Form::close(); }}
			</div>
		</div>
		

		<a href="{{ URL::to('users/signup') }}" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span> Course Sign-up</a>
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
{{ HTML::script('js/users/signup.js') }}
@stop