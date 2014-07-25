@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>
		<div class="settings">
			<p>{{ $user->first_name }} {{ $user->last_name }}</p>
			<p>Tempurature Limit: <span id="temperature">{{ $setting->temp_limit }}</span> deg</p>

			{{ Form::open(array('url'=>'users/temp_update', 'method'=>'post', 'id'=>'temp_change')) }}
				<div class="alert alert-danger" id="errors">
					<p id="errorResponse"></p><span class="glyphicon glyphicon-remove-circle close-errors-icon"></span>
				</div>
				{{ Form::text('temp_limit', null, array('placeholder'=>'Ex: 80', 'id'=>'tempInput')) }}
				{{ Form::submit('Change', array('class'=>'btn btn-xs btn-primary')) }}
			{{ Form::close() }}
		</div>

		<br />
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
@stop