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
		{{ Form::open(array('url'=>'questions/create')); }}
		<h2>New Question</h2>
			{{ Form::input('hidden', 'testID', $testID); }}
			{{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'Question Text')); }} <br />
			{{ Form::input('text', 'point_value', null, array('class'=>'form-control', 'placeholder'=>'Point Value')) }}
			{{ Form::submit('Save', array('class'=>'btn btn-primary')); }}
		{{ Form::close() }}
	</div>
</div>
@stop