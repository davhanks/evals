@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div id="form">
		{{ Form::open(array('url'=>'tests/create')); }}
		<h2>New Test</h2>
			{{ Form::input('hidden', 'courseID', $courseid); }}
			{{ Form::input('text', 'name', null, array('placeholder'=>'Test Name')); }} <br />
			{{ Form::textarea('desc', null, array('placeholder'=>'Test Description', 'class'=>'textareaSize')); }} <br />
			{{ Form::submit('Save', array('class'=>'btn btn-primary')); }}
		{{ Form::close() }}
	</div>
</div>
@stop