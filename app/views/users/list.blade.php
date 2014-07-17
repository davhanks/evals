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
				<th>Superuser</th>
				<th>Staff</th>
				<th>Active</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at }}</td>
					<td>
						<script>
							$(function(){
								$('#cmn-toggle-{{$user->id}}-superuser').click(function(e){
					  			// e.preventDefault();
						  			$.post('switch_superuser', {userid: '{{$user->id}}'},function(data){
						  				$('#response').html(data);
						  			});
					  			});
							});
						</script>
						@if(Auth::user()->id == $user->id)
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-superuser" class="cmn-toggle cmn-toggle-round" type="checkbox" disabled="disabled" checked>
							  <label for="cmn-toggle-{{$user->id}}-superuser"></label>
							</div>
						@elseif($user->is_superuser())
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-superuser" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
							  <label for="cmn-toggle-{{$user->id}}-superuser"></label>
							</div>
						@else
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-superuser" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
							  <label for="cmn-toggle-{{$user->id}}-superuser"></label>
							</div>
						@endif
					</td>
					<td>
						<script>
							$(function(){
								$('#cmn-toggle-{{$user->id}}-staff').click(function(e){
					  			// e.preventDefault();
						  			$.post('switch_staff', {userid: '{{$user->id}}'},function(data){
						  				$('#response').html(data);
						  			});
					  			});
							});
						</script>
						@if(Auth::user()->id == $user->id)
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-staff" class="cmn-toggle cmn-toggle-round" type="checkbox" disabled="disabled" checked>
							  <label for="cmn-toggle-{{$user->id}}-staff"></label>
							</div>
						@elseif($user->is_staff())
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-staff" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
							  <label for="cmn-toggle-{{$user->id}}-staff"></label>
							</div>
						@else
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}-staff" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
							  <label for="cmn-toggle-{{$user->id}}-staff"></label>
							</div>
						@endif
					</td>
				
					<td>
						<script>
							$(function(){
								$('#cmn-toggle-{{$user->id}}').click(function(e){
					  			// e.preventDefault();
						  			$.post('switch_active', {userid: '{{$user->id}}'},function(data){
						  				$('#response').html(data);
						  			});
					  			});
							});
						</script>
						@if(Auth::user()->id == $user->id)
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}" class="cmn-toggle cmn-toggle-round" type="checkbox" disabled="disabled" checked>
							  <label for="cmn-toggle-{{$user->id}}"></label>
							</div>
						@elseif($user->is_active())
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
							  <label for="cmn-toggle-{{$user->id}}"></label>
							</div>
						@else
							<div class="switch">
							  <input id="cmn-toggle-{{$user->id}}" class="cmn-toggle cmn-toggle-round" type="checkbox" unchecked>
							  <label for="cmn-toggle-{{$user->id}}"></label>
							</div>
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