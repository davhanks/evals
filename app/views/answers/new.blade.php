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
		{{ Form::open(array('url'=>'answers/create')); }}
		<h2>New Answer</h2>
			{{ Form::input('hidden', 'questionID', $questionID); }}
			{{ Form::input('text', 'text', null, array('class'=>'form-control','placeholder'=>'Answer Text')); }} <br />
			{{ Form::label('Correct Answer'); }}
			{{ Form::checkbox('is_correct'); }} <br />
			{{ Form::submit('Save', array('class'=>'btn btn-primary')); }}
		{{ Form::close() }}
	</div>
</div>
@stop