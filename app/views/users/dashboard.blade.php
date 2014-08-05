@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>


		<div id="tabs">
			<ul class="nav nav-tabs" role="tablist">
			  <li id="tab1" class="active"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
			  <li id="tab2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Courses</a></li>
			  <li id="tab3"><a href="#"><span class="glyphicon glyphicon-pencil"></span> Sign-up</a></li>
			</ul>
			<div id="panel1">
				<p>{{ $user->first_name }} {{ $user->last_name }}</p>
				<p>Roles: 
				@if($user->is_superuser())
					<span class="label label-primary"><i class="fa fa-user"></i> Superuser</span>, 
				@endif
				@if($user->is_staff())
					<span class="label label-success">Staff</span> 
				@endif
				</p>
				<p>Member since: {{ $user->created_at->format('M-d-Y'); }}</p>
			</div>
			<div id="panel2">
				<table class="table">
					<thead>
						<th>Name</th>
						<th>Description</th>
						<th>Progress</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($courses as $course)
						<tr>
							<td>{{ $course->name }}</td>
							<td>
								<button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{ $course->id }}">
									<span class="glyphicon glyphicon-info-sign"></span> Description
								</button>

								<div class="modal fade" id="myModal-{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								        <h4 class="modal-title" id="myModalLabel">{{ $course->name }}</h4>
								      </div>
								      <div class="modal-body">
								      	{{ $course->description }}
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								      </div>
								    </div>
								  </div>
								</div>
							</td>
							<td>
								<div class="progress">
								    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								    	0%
								    </div>
								</div>
							</td>
							<td><a class="btn btn-primary" href="">View Tests</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div id="panel3">
				{{ Form::open(array('URL'=>'/users/signup', 'id'=>'signup')); }}
				<div class="alert alert-danger alert-dismissible" id="editErrors">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<ul id="errorResponse"></ul>
				</div>
				{{ Form::Input('text', 'signup_id', null, array('class'=>'form-control', 'placeholder'=>'Sign-up ID')) }}
				{{Form::button('<span class="glyphicon glyphicon-pencil"></span> Sign-up', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
				{{ Form::close(); }}
			</div>
		</div>

		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
{{ HTML::script('js/users/signup.js') }}
@stop