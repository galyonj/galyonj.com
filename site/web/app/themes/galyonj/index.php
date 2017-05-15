<?php
/**
 * Index template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

get_header();?>

<main class="col-xs-12 col-sm-8 col-md-9 pull-left">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-container">
			<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post();

					if( !is_paged() ) {

						if( 0 === $wp_query->current_post ) {

							get_template_part( 'partial/content', 'latest' );


						} else {

							get_template_part( 'partial/content', 'loop' );

						}

					} else {

						get_template_part( 'partial/content', 'loop' );

					}
				}

				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '<i class="fa fa-caret-left" aria-hidden="true"></i>' , 'galyonj' ),
					'next_text' => __( '<i class="fa fa-caret-right" aria-hidden="true"></i>', 'galyonj' )
				) );
			}
			?>
		</div>
	</article>
</main>

<?php get_footer(); ?>
