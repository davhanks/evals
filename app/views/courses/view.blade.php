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
		<h1>View Course</h1>
		
		
		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Tests</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit Course</a></li>
			</ul>
			<div id="panel1">
				<div class="alert alert-success" id="editSuccess">
					<ul><li>Test edited successfully!</li></ul><span class="glyphicon glyphicon-remove-circle close-success-icon"></span>
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
						<td>description</td>
						<td>{{ $test->number_of_questions }}</td>
						<td>{{ $test->total_points }}</td>
						<td>{{ $test->date_due }}</td>
						<td>active placeholder</td>
						<td><a href="{{ URL::to('tests/' . $test->id . '/view') }}" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span> View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			<div id="panel3">
			<div class="errors">
				
			</div>
				{{ Form::open(array('url'=>'/courses/edit', 'id'=>'edit_course')); }}
				<div class="alert alert-danger" id="editErrors">
					<ul id="errorResponse"></ul><span class="glyphicon glyphicon-remove-circle close-errors-icon"></span>
				</div>
				{{ Form::input('hidden', 'courseID', $course->id); }}
				{{ Form::input('text', 'name', $course->name, array('placeholder'=>'Course Name', 'class'=>'form-control')); }}<br />
				{{ Form::textarea('description', $course->description, array('placeholder'=>'Course Description', 'class'=>'form-control'));  }}<br />
				{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')); }}
				{{ Form::close(); }}
			</div>
		</div>
		
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
@stop