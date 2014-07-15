@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<h1>Dashboard</h1>
		<table class="table">
			<thead>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Member Since</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at }}</td>
					<td>
						@if($user->is_superuser())
							<a class="btn btn-danger btn-xs" href="{{ URL::to('users/' . $user->id . '/remove_superuser') }}">Remove Superuser</a>
						@else
							<a class="btn btn-success btn-xs" href="{{ URL::to('users/' . $user->id . '/make_superuser') }}">Make Superuser</a>
						@endif
						@if($user->is_staff())
							<a class="btn btn-danger btn-xs" href="{{ URL::to('users/' . $user->id . '/remove_staff') }}">Remove Staff</a>
						@else
							<a class="btn btn-success btn-xs" href="{{ URL::to('users/' . $user->id . '/make_staff') }}">Make Staff</a>
						@endif
					
						@if($user->is_active())
							<a class="btn btn-danger btn-xs" href="{{ URL::to('users/' . $user->id . '/inactivate') }}">Inactivate</a>
						@else
							
						<a class="btn btn-success btn-xs" href="{{ URL::to('users/' . $user->id . '/activate') }}">Activate</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<script>
		  	$(function() {
		  		// function myFunction() {
		  		// 	alert("hello");
		  		// }

		  		// setInterval(myFunction, 3000);
		  		$('#ajax').click(function(e){
		  			e.preventDefault();
		  			$.get('categories', function(data){
		  				$('#response').html(data);
		  			});
		  		});

		  	});
		</script>	

		<p id="response"></p>
		<div><a id="ajax" href="#" class="btn btn-warning">AJAX</a></div>
		<a class="btn btn-danger" href="{{ URL::to('tests/list') }}">Tests</a>
	</div>
</div>
@stop