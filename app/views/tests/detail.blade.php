@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<h1 id="course_name">{{ $test->name }}</h1>
	<div id="tabs">
		<ul class="nav nav-tabs" role="tablist">
		  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Description</a></li>
		  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Info</a></li>
		  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-cog"></span> Submissions</a></li>
		</ul>
		<div id="panel1">
			<div class="alert alert-success alert-dismissible" id="editSuccess">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul><li>Test edited successfully!</li></ul>
			</div>
			<hr>
			<p id="course_description">{{ $test->description }}</p>
		</div>
		<div id="panel2">
		<hr>
		<p># of Questions: {{ $test->number_of_questions }}</p>
		<p>Total Point Value: {{ $test->total_points }}</p>
		</div>
		<div id="panel3">
			<div class="errors">

			</div>
			<a class="btn btn-danger" href="{{ URL::to('tester/' . $test->id) }}"><span class="glyphicon glyphicon-plus"></span> Start Test</a>
		</div>
	</div>
</div>
@stop