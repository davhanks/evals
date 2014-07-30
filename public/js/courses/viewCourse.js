$(function() {
	$('li').click(function() {
		$('li').each(function() {
			$('li').removeClass('active');
		});
		$(this).addClass('active');
	});

	$('#tab1').click(function() {
		// $('#panel1').slideToggle();
		// $('#panel2').hide();
		// $('#panel3').hide();

		if($('#panel1').is(":hidden")) {
    		$('#panel1').slideToggle("fast");
    	}
    	if($('#panel3').is(":visible")) {
    		$('#panel3').slideToggle("fast");
    	}
    	if($('#panel2').is(":visible")) {
    		$('#panel2').slideToggle("fast");
    	}
	});

	$('#tab2').click(function() {
		// $('#panel2').slideToggle();
		// $('#panel1').hide();
		// $('#panel3').hide();

		if($('#panel2').is(":hidden")) {
    		$('#panel2').slideToggle("fast");
    	}
    	if($('#panel1').is(":visible")) {
    		$('#panel1').slideToggle("fast");
    	}
    	if($('#panel3').is(":visible")) {
    		$('#panel3').slideToggle("fast");
    	}

    	if($('#editSuccess').is(':visible')) {
    		$('#editSuccess').slideToggle();
    	}
	});

	$('#tab3').click(function() {
		// $('#panel3').slideToggle();
		// $('#panel1').hide();
		// $('#panel2').hide();

		if($('#panel3').is(":hidden")) {
    		$('#panel3').slideToggle("fast");
    	}
    	if($('#panel1').is(":visible")) {
    		$('#panel1').slideToggle("fast");
    	}
    	if($('#panel2').is(":visible")) {
    		$('#panel2').slideToggle("fast");
    	}

    	if($('#editSuccess').is(':visible')) {
    		$('#editSuccess').slideToggle();
    	}

	});
});