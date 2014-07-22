@extends('layouts.dashboard')

@section('content')
<div class="main_section">
	<div>
		<div class="alert alert-danger temperature">
			<p id="response"></p><span class="glyphicon glyphicon-remove-circle close-icon"></span>
		</div>
		<h1>Dashboard</h1>
			@foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
		<div class="settings">
			<p>{{ $user->first_name }} {{ $user->last_name }}</p>
			<p>Tempurature Limit: <span id="temperature">{{ $setting->temp_limit }}</span> deg</p>


			{{ Form::open(array('url'=>'users/temp_update', 'method'=>'post', 'id'=>'temp_change')) }}
				{{ Form::text('temp_limit', null, array('placeholder'=>'Ex: 80')) }}
				{{ Form::submit('Change', array('class'=>'btn btn-xs btn-primary')) }}
			{{ Form::close() }}
		</div>
		<script>
		  	$(function() {

		  		$("#temp_change").submit(function(event){
		  			event.preventDefault();

		  			$.ajax({
				    url: "/users/change_temp_limit",
				    type: "POST",
				    data: $(this).serialize(),
				    cache: false,
				    dataType: "json",
				    success: function(data) {
				        if(data["success"]) {
				    	    $('#temperature').html(data["temp"]);
				        }
				    }
					});
		  		});


		  		// function myFunction() {
		  		// 	$.get('temperature', function(data){
		  		// 		$('#response').html(data);
		  		// 	});
		  		// }

		  		// setInterval(myFunction, 10000);

		  		$('#ajax').click(function(e){
		  			e.preventDefault();
		  			$.getJSON('/users/temperature', function(data){
		  				
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
		<br />
		<a id="ajax" href="#" class="btn btn-warning">Weather</a>
	</div>
</div>
@stop