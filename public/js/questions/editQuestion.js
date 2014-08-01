$(function() {

	$("#edit_question").submit(function(event){
		event.preventDefault();

		$.ajax({
	    url: "/questions/edit",
	    type: "POST",
	    data: $(this).serialize(),
	    cache: false,
	    dataType: "json",
		}).done(function(data) {
			if(data["success"]) {
	    	    $('#question_text').html(data["text"]);
	    	    $('#points').html(data["point_value"]);

	    	    if($('#editErrors').is(":visible")) {
	        		$('#editErrors').slideToggle("slow");
	        	}

	        	$('#panel3').slideToggle();
	        	$('#panel1').slideToggle();
	        	$('#tab3').removeClass("active");
	        	$('#tab1').addClass("active");

	        	if($('#editSuccess').is(':hidden')) {
	        		$('#editSuccess').slideToggle();
	        	}
	        	
	        }else {

	        	// Empty out old errors
				$('#errorResponse').empty();

				// For every error, add it to the errorResponse div list
				for (var key in data["errors"]) {
				  	$('#errorResponse').append('<li>' + data["errors"][key][0] + '</li>');
				}
	        	
	        	// Check if the error div is hidden and display if it is
	        	if($('#editErrors').is(":hidden")) {
	        		$('#editErrors').slideToggle("slow");
	        	}
	        	
	        }
		}).fail(function(data) {
			console.log('Request failed');
		})
	});
  			
  	// Close the error div if the x is clicked  	
	$('.close-errors-icon').click(function(){
		$('#editErrors').slideToggle("fast", "linear", function(){
			// console.log("Set user interacted function call here");
		});
	});	

	$('.close-success-icon').click(function(){
		$('#editSuccess').slideToggle("fast", "linear", function(){
			// console.log("Set user interacted function call here");
		});
	});	 	
});