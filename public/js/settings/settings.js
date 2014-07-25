$(function() {

	$("#temp_change").submit(function(event){
		event.preventDefault();

		$.ajax({
	    url: "/users/change_temp_limit",
	    type: "POST",
	    data: $(this).serialize(),
	    cache: false,
	    dataType: "json",
		}).done(function(data) {
			if(data["success"]) {
	    	    $('#temperature').html(data["temp"]);
	    	    if($('#errors').is(":visible")) {
	        		$('#errors').slideToggle("slow");
	        	}
	        	$('#tempInput').val('');
	        }else {
	        	$('#errorResponse').html('<span class="glyphicon glyphicon-exclamation-sign"></span> ' + data["errors"]["temp_limit"][0]);
	        	
	        	if($('#errors').is(":hidden")) {
	        		$('#errors').slideToggle("slow");
	        	}
	        	
	        }
		}).fail(function(data) {
			console.log('Request failed');
		})
	});
  			  	
	$('.close-errors-icon').click(function(){
		$('#errors').slideToggle("slow", "linear", function(){
			// console.log("Set user interacted function call here");
		});
	});	 	
});