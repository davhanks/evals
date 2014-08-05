@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<h1 id="course_name">{{ $test->name }}</h1>
	<div id="tabs">
		<div id="panel1">
			<div class="alert alert-success alert-dismissible" id="editSuccess">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul><li>Test edited successfully!</li></ul>
			</div>
			<p id="course_description">{{ $test->description }}</p>
			<hr>
			{{ Form::open(array('url'=>'/tester/submit' ,'id'=>'questions-form')) }}
			@foreach($test->questions as $question)
				<strong>{{ $question->question_number }}.</strong> <strong>{{ $question->text }}</strong>

				@foreach($question->answers as $answer)
					<p>{{ Form::radio($question->id, $answer->id) }} {{ $answer->text }}</p>
				@endforeach
				<hr>

			@endforeach
			{{Form::button('<span class="glyphicon glyphicon-send"></span> Submit', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop