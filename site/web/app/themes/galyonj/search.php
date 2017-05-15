<?php
/**
 * Search results template
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

		get_template_part( 'partial/content', 'breadcrumbs' );
		get_template_part( 'partial/content', 'header' );

		if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<h2><a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<p>Posted on <strong><time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'd F Y'); ?></time></strong></p>
			<?php the_excerpt(); ?>

		<?php endwhile; endif; ?>

	</article>
</main>

<?php get_footer(); ?>
