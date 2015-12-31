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

	$('#in-g-form select').change( function() {
		var section = $("#in-sec").val();
		var subject = $("#in-sub").val();

		$.get('/teacher/grade/students', {
			section: section,
			subject: subject
		}, function(data) {
			var str = '';

			$.each(data, function (i,v) {
				str += '<tr>';
				str += '<td>' + (i + 1) + '</td>';
				str += '<td>' + ([v.user.firstname, v.user.middlename, v.user.lastname].join(' ')) + '</td>';
				str += '<td>';
				str += '<input class="form-control">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control">';
				str += '</td>';
				str += '</tr>';
			});

			$('#s-list').html(str);
		});
	});
});