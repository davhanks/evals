@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<h1>Courses</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Created At</th>
					<th>Instructor</th>
					<th></th>
					<th>Active</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($courses as $course)
				<tr>
					<td>{{ $course->name }}</td>
					<td class="relative">
						<a id="ajax-id-{{ $course->id }}" class="description">Description</a>
						<div id="ajax-id-{{ $course->id }}-decription" class="description-hoverbox alert alert-info">{{ $course->description }}</div>
					</td>
					<td>{{ $course->created_at }}</td>
					<td>{{ $course->user->first_name . ' ' . $course->user->last_name}}</td>
					<td></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a class="btn btn-success" href="{{ URL::to('courses/create') }}">New Course</a>
	</div>
</div>
@stop