/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

jQuery(document).ready(function($){
   $(window).bind('scroll', function() {
		if ($(window).width()>= 600 && $(window).scrollTop() > 10) {
			$('.main-navigation-wrapper').addClass('nav-fixed');
		}
		else {
			$('.main-navigation-wrapper').removeClass('nav-fixed');
		}
    });
});

( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();
