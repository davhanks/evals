@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	@if($errors->has())
	<div class="alert alert-danger">
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
	@endif
	<div id="form">
		{{ Form::open(array('url'=>'tests/create')); }}
		<h2>New Test</h2>
			{{ Form::input('hidden', 'courseID', $courseid); }}
			{{ Form::input('text', 'name', null, array('class'=>'form-control','placeholder'=>'Test Name')); }} <br />
			{{ Form::textarea('desc', null, array('class'=>'form-control', 'placeholder'=>'Test Description')); }} <br />
		<div class="input-group date" id="datetimepicker1">
			{{ Form::text('date_due', '', array('class' => 'form-control','placeholder' => 'Due Date: MM/DD/YYY HH:MM AM/PM')) }}
			</div>
			{{ Form::submit('Save', array('class'=>'btn btn-primary')); }}
		{{ Form::close() }}
	</div>
</div>
@stop