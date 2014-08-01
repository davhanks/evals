@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		@if(Session::has('message'))
		<div class="alert alert-success">
			<p>{{ Session::get('message') }}</p>
		</div>
		@endif
		<h1>View Question</h1>
		
		
		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Answers</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit Question</a></li>
			</ul>
			<div id="panel1">
				<div class="alert alert-success alert-dismissible" id="editSuccess">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<ul><li>Question edited successfully!</li></ul>
				</div>
				<h3 id="question_num">Question #{{ $question->question_number }}</h3>
				<hr>
				<p id="question_text">Text: {{ $question->text }}</p>
				<p id="points">Point Value: {{ $question->point_value }}</p>
			</div>
			<div id="panel2">
				<a class="btn btn-success" href="{{ URL::to('answers/' . $question->id . '/new') }}"><span class="glyphicon glyphicon-plus"></span> New Answer</a>
				<table class="table">
				<thead>
					<th>Text</th>
					<th>Is Correct</th>
					<th>Active</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($answers as $answer)
					<tr>
						<td>{{ $answer->text }}</td>
						<td>
						@if($answer->is_correct())
							<span class="label label-success">Yes</span>
						@else
							<span class="label label-danger">No</span>
						@endif
						</td>
						<td>
							<script>
								$(function(){
									$('#cmn-toggle-{{$answer->id}}-active').click(function(e){
						  			// e.preventDefault();
							  			$.post('/answers/switch_answer_active', {questionID: '{{$question->id}}'},function(data){
							  				$('#response').html(data);
							  			});
						  			});
								});
							</script>
							@if($answer->is_active())
								<div class="switch">
								  <input id="cmn-toggle-{{$answer->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
								  <label for="cmn-toggle-{{$answer->id}}-active"></label>
								</div>
							@else
								<div class="switch">
								  <input id="cmn-toggle-{{$answer->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
								  <label for="cmn-toggle-{{$answer->id}}-active"></label>
								</div>
							@endif
						</td>
						<td><a href="{{ URL::to('questions/' . $question->id . '/view') }}" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span> View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			<div id="panel3">
			<div class="errors">
				
			</div>
				{{ Form::open(array('url'=>'/questions/edit', 'id'=>'edit_question')); }}
				<div class="alert alert-danger" id="editErrors">
					<ul id="errorResponse"></ul><span class="glyphicon glyphicon-remove-circle close-errors-icon"></span>
				</div>
				{{ Form::input('hidden', 'questionID', $question->id); }}
				{{ Form::textarea('text', $question->text, array('placeholder'=>'Question Text', 'class'=>'form-control'));  }}<br />
				{{ Form::input('text', 'point_value', $question->point_value, array('placeholder'=>'Point Value', 'class'=>'form-control')); }}<br />
				
				{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')); }}
				{{ Form::close(); }}
			</div>
		</div>
		
		<a href="{{ URL::to('tests/' . $question->test_id . '/view') }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back to Test</a> 
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
{{ HTML::script('js/questions/editQuestion.js'); }}
{{ HTML::script('js/answers/isCorrect.js'); }}
@stop