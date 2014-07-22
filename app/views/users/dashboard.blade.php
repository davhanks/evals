@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>
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
		  			$.getJSON('temperature', function(data){
		  				
		  				if(data['showAlert'] == 'true'){
		  					$('#response').html('<span class="glyphicon glyphicon-exclamation-sign"></span> The temperature is: ' + data['temp'] + ' deg');
		  					$('.temperature').slideToggle("slow");
		  				}
		  				
		  				
		  			});
		  		});	

		  		$('.close-icon').click(function(){
		  			$('.temperature').slideToggle("slow", "linear", function(){
		  				// console.log("Set user interacted function call here");
		  			});
		  		});	  		
			});
		</script>

		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
@stop