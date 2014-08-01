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
		<h1>View Test</h1>
		
		
		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Questions</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit Test</a></li>
			</ul>
			<div id="panel1">
				<div class="alert alert-success alert-dismissible" id="editSuccess">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<ul><li>Test edited successfully!</li></ul>
				</div>
				<h3 id="course_name">{{ $test->name }}</h3>
				<hr>
				<p id="course_description">{{ $test->description }}</p>
			</div>
			<div id="panel2">
				<a class="btn btn-success" href="{{ URL::to('questions/' . $test->id . '/new') }}"><span class="glyphicon glyphicon-plus"></span> New Question</a>
				<table class="table">
				<thead>
					<th>#</th>
					<th>Text</th>
					<th>Point Value</th>
					<th>Active</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($questions as $question)
					<tr>
						<td>{{ $question->question_number }}</td>
						<td>{{ $question->text }}</td>
						<td>{{ $question->point_value }}</td>
						<td>
							<script>
								$(function(){
									$('#cmn-toggle-{{$question->id}}-active').click(function(e){
						  			// e.preventDefault();
							  			$.post('/questions/switch_question_active', {questionID: '{{$question->id}}'},function(data){
							  				$('#response').html(data);
							  			});
						  			});
								});
							</script>
							@if($question->is_active())
								<div class="switch">
								  <input id="cmn-toggle-{{$question->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
								  <label for="cmn-toggle-{{$question->id}}-active"></label>
								</div>
							@else
								<div class="switch">
								  <input id="cmn-toggle-{{$question->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
								  <label for="cmn-toggle-{{$question->id}}-active"></label>
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
				{{ Form::open(array('url'=>'/tests/edit', 'id'=>'edit_test')); }}
				<div class="alert alert-danger" id="editErrors">
					<ul id="errorResponse"></ul><span class="glyphicon glyphicon-remove-circle close-errors-icon"></span>
				</div>
				{{ Form::input('hidden', 'testID', $test->id); }}
				{{ Form::input('text', 'name', $test->name, array('placeholder'=>'Test Name', 'class'=>'form-control')); }}<br />
				{{ Form::textarea('description', $test->description, array('placeholder'=>'Test Description', 'class'=>'form-control'));  }}<br />
				{{ Form::input('text', 'date_due', $test->date_due, array('placeholder'=>'Date Due', 'class'=>'form-control')); }}<br />
				{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')); }}
				{{ Form::close(); }}
			</div>
		</div>
		
		<a href="{{ URL::to('courses/' . $test->course_id . '/view') }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back to Course</a> 
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
{{ HTML::script('js/tests/editTest.js'); }}
@stop