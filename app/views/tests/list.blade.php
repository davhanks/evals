@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<h1>{{ $course->name }}</h1>
		<h3>Tests</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th># of Questions</th>
					<th>Points</th>
					<th>Updated At</th>
					<th>Due Date</th>
					<th>Action</th>
				</tr>
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
					<td>{{ $test->updated_at }}</td>
					<td>{{ $test->date_due }}</td>
					<td>
						@if(date('Y-m-d H:i:s') < $test->date_due)
						<a class="btn btn-primary" href="{{ URL::to('tests/' . $test->id . '/detail') }}"><span class="glyphicon glyphicon-eye-open"></span> View</a>
						@else
						<a class="btn btn-danger" href="{{ URL::to('tests/' . $test->id . '/detail') }}"><span class="glyphicon glyphicon-eye-open"></span> View</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop