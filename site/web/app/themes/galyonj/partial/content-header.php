<?php
/**
 * Partial to output content title areas
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */
?>

<header class="header-row">
	<?php
	if( !is_page() ) {
		if( is_search() ) {
			global $wp_query;

			$results = $wp_query->found_posts;

			if( $results === 0 ) {
				echo '<h1>';
				printf( __( 'Nothing returned for %s&rdquo;', 'galyonj' ), get_search_query() );
				echo'</h1>';
			} else {
				if( $results > 1 ) {
					echo '<h1>';
					printf( __( $results . ' results returned for &ldquo;%s&rdquo;', 'galyonj' ), get_search_query() );
					echo'</h1>';
				} else {
					echo '<h1>';
					printf( __( $results . ' result returned for &ldquo;%s&rdquo;', 'galyonj' ), get_search_query() );
					echo'</h1>';
				}
			}
		} elseif( is_category() ) {
			echo '<h1>';
			single_cat_title();
			echo '</h1>';

			if( category_description() ) {
				echo '<p class="lead term-description">' . category_description() . '</p>';
			}
		} elseif( is_tag() ) {
			echo '<h1>';
			single_tag_title();
			echo '</h1>';

			if( tag_description() ) {
				echo '<p class="lead term-description">' . tag_description() . '</p>';
			}
		} elseif( is_404() ) {
			echo '<h1 class="display">404: page not found</h1>';
		} else {
			the_title('<h1>', '</h1>');
			if( is_single() ) {
				get_template_part('partial/content', 'meta' );
			}
		}
	} else {
		the_title('<h1>', '</h1>');
	}
	?>
</header>
