@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>
		<p>{{ $user->first_name }} {{ $user->last_name }}</p>
		<p>{{ $setting->temp_limit }}</p>

		<script>
		  	$(function() {
		  		// function myFunction() {
		  		// 	$.get('temperature', function(data){
		  		// 		$('#response').html(data);
		  		// 	});
		  		// }

		  		// setInterval(myFunction, 10000);

		  		$('#ajax').click(function(e){
		  			e.preventDefault();
		  			$.get('/users/temperature', function(data){
		  				$('#response').html(data);
		  				$('.temperature').slideToggle("slow");
		  				
		  			});
		  		});	

		  		$('.close-icon').click(function(){
		  			$('.temperature').slideToggle("slow", "linear", function(){
		  				console.log("Set user interacted function call here");
		  			});
		  		});	  		
			});
		</script>

		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
		<a class="btn btn-danger" href="{{ URL::to('users/' . Auth::user()->id . '/settings') }}">Settings</a>
	</div>
</div>
@stop