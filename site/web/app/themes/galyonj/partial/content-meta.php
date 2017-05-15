<?php
/**
 * Partial to output post meta information
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 1, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

$category = get_the_category( $post->ID );
$cat_id   = get_cat_ID( $category[0]->name );
?>

<section class="meta-row">
	<ul class="post-meta">
		<li>
			<time datetime="<?php echo get_the_date( 'c'); ?>">
				<?php echo get_the_date( 'd F Y'); ?>
			</time>
		</li>
		<li>
			<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
			<a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>">
				<?php echo	$category[0]->name; ?>
			</a>
		</li>
		<li>
			<i class="fa fa-pencil" aria-hidden="true"></i>
			<a href="<?php echo home_url( '/about/' ); ?>">
				<?php the_author_meta( 'last_name' ); ?>
			</a>
		</li>
	</ul>
	<img class="img-responsive post-thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title
	(); ?>" title="<?php the_title(); ?>">
	<p class="lead"><?php echo get_the_excerpt(); ?></p>
	<hr>
</section>