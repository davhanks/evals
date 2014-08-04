@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<h1>Courses</h1>
		<a class="btn btn-success" href="{{ URL::to('courses/create') }}"><span class="glyphicon glyphicon-plus"></span> New Course</a>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Signup Id</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th>Instructor</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($users as $user)
				@foreach ($user->courses as $course)
				<tr>
					<td>{{ $course->name }}</td>
					<td>{{ $course->description }}</td>
					<td>{{ $course->signup_id }}</td>
					<td>{{ $course->created_at }}</td>
					<td>{{ $course->updated_at }}</td>
					<td>{{ $user->first_name . ' ' . $user->last_name }}</td>
					<td>
						<script>
							$(function(){
								$('#cmn-toggle-{{$course->id}}').click(function(e){
					  			// e.preventDefault();
						  			$.post('switch_active', {courseid: '{{$course->id}}'},function(data){
						  				$('#response').html(data);
						  			});
					  			});
							});
						</script>
						@if($course->is_active())
							<div class="switch">
							  <input id="cmn-toggle-{{$course->id}}" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
							  <label for="cmn-toggle-{{$course->id}}"></label>
							</div>
						@else
							<div class="switch">
							  <input id="cmn-toggle-{{$course->id}}" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
							  <label for="cmn-toggle-{{$course->id}}"></label>
							</div>
						@endif
					</td>
					<td><a href="{{ URL::to('courses/'. $course->id . '/view') }}" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span> View</a></td>
				</tr>
				@endforeach
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop