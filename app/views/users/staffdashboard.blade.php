@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
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

		<a class="btn btn-danger" href="{{ URL::to('tests/list') }}">Tests</a>
	</div>
</div>
@stop