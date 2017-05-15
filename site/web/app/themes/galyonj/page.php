<?php
/**
 * Page template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

get_header(); ?>

	<main class="col-xs-12 col-sm-8 col-md-9 pull-left">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			if( have_posts() ) {

				while( have_posts() ) {

					the_post();

					get_template_part( 'partial/content', 'breadcrumbs' );
					get_template_part( 'partial/content', 'header' );
					the_content();

				}

			}
			?>

		</article>
	</main>

<?php get_footer(); ?>
