'use strict'; // eslint-disable-line

(function($) { // eslint-disable-line
	var frame;
	$('.upload-infobox-img').on('click', function(event) {
		event.preventDefault();
		var delImgLink = $(this).next('.delete-infobox-img'),
			imgContainer = $(this),
			imgIdInput = '.infobox-img-' + $(this).attr('id').substr($(this).attr('id').length - 1);

		frame = wp.media({
			title: 'Select icon',
			button: {
				text: 'Set icon',
			},
			multiple: false,
		});

		if (frame) {
			frame.on('select', function() {
				var attachment = frame.state().get('selection').first().toJSON();
				imgContainer.html('');
				imgContainer.append('<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>');
				$(imgIdInput).val(attachment.id);
				delImgLink.removeClass( 'hidden' );
				imgContainer.blur();
			});
		}

		frame.open();
	});

	$('.delete-infobox-img').on('click', function(event) {
		event.preventDefault();

		var imgContainer = $(this).prev('.upload-infobox-img'),
			imgIdInput = '.infobox-img-' + imgContainer.attr('id').substr(imgContainer.attr('id').length - 1);

		imgContainer.html('');
		imgContainer.text('Set icon');
		$(this).addClass('hidden');
		$(imgIdInput).val('-1');
	});

})(jQuery);
