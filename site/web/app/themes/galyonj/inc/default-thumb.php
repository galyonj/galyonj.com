<?php
/**
 * Set a default featured image as a fallback
 * in the event that one has not been set by the post author
 */

function default_post_thumbnail( $html ) {

	if( empty( $html ) ) {
		$html = '<img src="' . trailingslashit( get_stylesheet_directory_uri() ) . 'img/default-img.jpg">';
	}

	return $html;
}
add_filter( 'post_thumbnail_html', 'default_post_thumbnail' );