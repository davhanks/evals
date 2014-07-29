@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>
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

		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
@stop