@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		@if(Session::has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<p>{{ Session::get('message') }}</p>
		</div>
		@endif
		<h1>View Course</h1>

		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Tests</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit Course</a></li>
			</ul>
			<div id="panel1">
				<div class="alert alert-success alert-dismissible" id="editSuccess">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<ul><li>Course edited successfully!</li></ul>
				</div>
				<h3 id="course_name">{{ $course->name }}</h3>
				<hr>
				<p id="course_description">{{ $course->description }}</p>
			</div>
			<div id="panel2">
				<a class="btn btn-success" href="{{ URL::to('tests/' . $course->id . '/new') }}"><span class="glyphicon glyphicon-plus"></span> New Test</a>
				<table class="table">
				<thead>
					<th>Name</th>
					<th>Description</th>
					<th># of Questions</th>
					<th>Total Points</th>
					<th>Date Due</th>
					<th>Active</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($tests as $test)
					<tr>
						<td>{{ $test->name }}</td>
						<td>
							<button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{ $test->id }}">
								<span class="glyphicon glyphicon-info-sign"></span> Description
							</button>

							<div class="modal fade" id="myModal-{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        <h4 class="modal-title" id="myModalLabel">{{ $test->name }}</h4>
							      </div>
							      <div class="modal-body">
							      	{{ $test->description }}
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>

						</td>
						<td>{{ $test->number_of_questions }}</td>
						<td>{{ $test->total_points }}</td>
						<td>{{ $test->date_due }}</td>
						<td>
							<script>
								$(function(){
									$('#cmn-toggle-{{$test->id}}-active').click(function(e){
						  			// e.preventDefault();
							  			$.post('/tests/switch_test_active', {testID: '{{$test->id}}'},function(data){
							  				$('#response').html(data);
							  			});
						  			});
								});
							</script>
							@if($test->is_active())
								<div class="switch">
								  <input id="cmn-toggle-{{$test->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
								  <label for="cmn-toggle-{{$test->id}}-active"></label>
								</div>
							@else
								<div class="switch">
								  <input id="cmn-toggle-{{$test->id}}-active" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
								  <label for="cmn-toggle-{{$test->id}}-active"></label>
								</div>
							@endif
						</td>
						<td><a href="{{ URL::to('tests/' . $test->id . '/view') }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			<div id="panel3">
			<div class="errors">
				
			</div>
				{{ Form::open(array('url'=>'/courses/edit', 'id'=>'edit_course')); }}
				<div class="alert alert-danger alert-dismissible" id="editErrors">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<ul id="errorResponse"></ul>
				</div>
				{{ Form::input('hidden', 'courseID', $course->id); }}
				{{ Form::input('text', 'name', $course->name, array('placeholder'=>'Course Name', 'class'=>'form-control')); }}<br />
				{{ Form::textarea('description', $course->description, array('placeholder'=>'Course Description', 'class'=>'form-control'));  }}<br />
				{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')); }}
				{{ Form::close(); }}
			</div>
		</div>
		<a href="{{ URL::to('courses/list') }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back to Course List</a>
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
{{ HTML::script('js/courses/editCourse.js'); }}
@stop