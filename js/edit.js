$(function() {
	//Load the tenders for editting
	$.ajax({
		url: '/api/tenders.php',
		type: 'GET',
		dataType: "json",
		success: function(response) {
			if(response.success) {
				var template = _.template($('script.edit-template').html());
				console.log('*******', response.success);
		        $('.panel-group').html(template({tenders: response.success}));
				return;
			}

			if(response.errors) {
				return;
			}	
		}
	});


	$('.edit-btn').click(function(event) {
		$(event.target).closest('.tender-panel').attr('data-edit-mode', 1);
	});


	$('.cancel-btn').click(function(event) {
		$(event.target).closest('.tender-panel').attr('data-edit-mode', 0);
	});


	$('.edit-tender').submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: '/api/edit.php',
			type: 'POST',
			dataType: "json",
			data: [$(this).serialize(), $.param({id: $(this).find('.tender-panel').attr('data-tender-id')})].join('&'),
			success: function(response) {
				if(response.success) {
					var fields = $(event.target).find(':input').serializeArray();
					$.each(fields, function(i, field) {
						$(event.target).find('.' + field.name + '-text').html(field.value);
					});
					$(event.target).find('.tender-panel').attr('data-edit-mode', 0);
					return $(event.target).find('.edit-message').addClass('alert alert-success').html(response.success);
				}

				if(response.errors) {
					return $(event.target).find('.edit-message').addClass('alert alert-danger').html(response.errors);
				}	
			}
		});

	});
});
