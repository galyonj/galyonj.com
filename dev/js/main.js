// Initialize smooth scrolling functionality
smoothScroll.init( {
	selector: '[data-scroll]', // Selector for links (must be a valid CSS selector)
	selectorHeader: '[data-scroll-header]', // Selector for fixed headers (must be a valid CSS selector)
	speed: 666, // Integer. How fast to complete the scroll in milliseconds
	easing: 'easeOutCubic', // Easing pattern to use
	updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
	offset: 0 // Integer. How far to offset the scrolling anchor location in pixels
} );

$( document ).ready( function() {

	$( 'article p a:not( [ href*="galyonj" ] ):not( [href^="#"] )' ).attr( 'rel', 'nofollow' ).append( '<sup><i class="fa fa-external-link" aria-hidden="true"></i></sup>' );

	$( 'article img' ).not( '.img-responsive' ).addClass( 'img-responsive' );

	$( 'figure/*, .instagram-media*/' ).removeAttr( 'style' );

	$( '.malinky-ajax-pagination-loading img' ).replaceWith( '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>' );

	$( '.nav-next' ).addClass( 'pull-right' );

	$( '.scroll-top' ).hide();

	// fade in/out for scroll to top button
	$( '.scroll-top' ).hide();

	$( window ).scroll( function() {
		if( $( this ).scrollTop() > 100 ) {
			// if the window's position is greater than 100 pixels away from the top
			// of the page, fade the scroll button in
			$( '.scroll-top' ).fadeIn( 'slow' );
		} else {
			// if not, fade the button so it's out of the way
			$( '.scroll-top' ).fadeOut( 'slow' );
		}
	} );
} );

// Make the footer stay at the bottom of the browser
// window on short pages
$( window ).on( 'load resize', function() {

	// sticky footer stuff
	const window_height  = $( window ).height();
	const admin_height   = $( '#wpadminbar' ).height();
	const content_height = $( '.wrapper' ).outerHeight();
	const footer_height  = $( 'footer' ).outerHeight();

	if (content_height + footer_height < window_height) {
		if ( $( '#wpadminbar' ).length ) {
			$( '.wrapper' ).css( 'margin-bottom', window_height - ( content_height + footer_height + admin_height ) );
		} else {
			$( '.wrapper' ).css( 'margin-bottom', window_height - ( content_height + footer_height ) );
		}
	}

	// jumbotron size consistency stuff
	// fix the jumbotron aspect ratio for consistent display
	const content_width = $( 'main' ).width();
	const row_height    = $( '.jumbotron .row ' ).height();

	$( '.jumbotron').css( 'padding-top', content_width * 0.45 - row_height);
} );