$(document).ready( function () {
	$('#scrollToTop').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);
	    return false;
	});
	
	$('#acType').change( function() {
		if($(this).val() == 'student') {
			$('#sYl').show();
			$('#pos').hide();
		}else {
			$('#sYl').hide();
			$('#pos').show();
		}
	});

	$('#pos').hide();
});