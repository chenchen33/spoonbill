/* JavaScript Document */

jQuery(document).ready(function() {
	jQuery('.gallery a').each(function() {
		var captionText = jQuery(this).closest('.gallery-item').find('figcaption').html();

		jQuery(this).attr({
			'data-lightbox':'slideshow',
			'title': captionText
		});
	});
});