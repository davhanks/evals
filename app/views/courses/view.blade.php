@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
				<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
			</div>
		<h1>User List</h1>
		<a class="btn btn-success" href="{{ URL::to('tests/' . $course->id . '/new') }}"><span class="glyphicon glyphicon-plus"></span> New Test</a>
		<table class="table">
			<thead>
				<th>Name</th>
				<th>Description</th>
				<th># of Questions</th>
				<th>Date Due</th>
				<th>Total Points</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Active</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
		<a class="btn btn-danger" href="{{ URL::to('tests/list') }}">Tests</a>
		<a class="btn btn-success" href="{{ URL::to('courses/list') }}">Courses</a>
	</div>
</div>
@stop