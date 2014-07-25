$(function() {
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
				if($('.temperature').is(":hidden")) {
					$('.temperature').slideToggle("slow");
				}
			}
		});
	});	

	$('.close-icon').click(function(){
		$('.temperature').slideToggle("slow", "linear", function(){
			// console.log("Set user interacted function call here");
		});
	});
});