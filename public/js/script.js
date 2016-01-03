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
		loadStudents();
	});

	
	var loadStudents = function() {
		var section = $("#in-sec").val();
		var subject = $("#in-sub").val();

		$.get('/teacher/grade/students', {
			section: section,
			subject: subject
		}, function(data) {
			var str = '';

			$.each(data, function (i,v) {
				str += '<tr data-user="' + v.user.id + '">';
				str += '<td>' + (i + 1) + '</td>';
				str += '<td>' + ([v.user.firstname, v.user.middlename, v.user.lastname].join(' ')) + '</td>';
				str += '<td>';
				str += '<input class="form-control inp" value="0">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control inp" value="0">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control inp" value="0">';
				str += '</td>';
				str += '<td>';
				str += '<input class="form-control inp" value="0">';
				str += '</td>';
				str += '<td>';
				str += '<p class="ave"></p>';
				str += '</td>';
				str += '</tr>';
			});

			if(data.length) {
				$('#s-list').html(str);
			}else{
				$('#s-list').html('<tr><td colspan="7">No Students</td></tr>');
			}
		});
	};

	$(this).on('input', '.inp', function () {
		var cells = $(this).closest('tr').find('input');
		var ave = $(this).closest('tr').find('.ave');

		var a = ((parseFloat(cells[0].value) + parseFloat(cells[1].value) + parseFloat(cells[2].value) + parseFloat(cells[3].value))/4);
		ave.text(a);
	});

	$('#in-g-form').submit( function (event) {
		// event.preventDefault();
		var obj = [];

		var rows = $(this).find('#s-list tr');
		var hid = $('#in-g');

		$.each(rows, function (i,v) {
			var cells = [];
			$.each($(this).find('.inp'), function(i,v) {
				cells.push(v.value);
			});



			obj.push({
				user_id: $(this).data('user'),
				q1: cells[0],
				q2: cells[1],
				q3: cells[2],
				q4: cells[3],
				ave: $(this).find('.ave').text()
			});
		});

		hid.val(JSON.stringify(obj));
	});

	loadStudents();

	$('#select-all').change( function () {
		var checkboxes = $(this).closest('table').find('tbody input[type=checkbox]');
		var status = this.checked;
		$.each(checkboxes, function() {
			this.checked = status;
		});
	});
});