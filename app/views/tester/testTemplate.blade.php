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
			@foreach($test->questions as $question)
				<strong>{{ $question->question_number }}.</strong> <strong>{{ $question->text }}</strong>
				{{ Form::open(array('id'=>'question-' . $question->id)) }}
				@foreach($question->answers as $answer)
					<p>{{ Form::radio($question->id, $answer->id) }} {{ $answer->text }}</p>
				@endforeach
				{{ Form::close() }}
				<hr>
			@endforeach

		</div>
	</div>
</div>
@stop