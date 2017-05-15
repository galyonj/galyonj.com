<?php
/**
 * Partial to output the main loop
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 3, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */ ?>

<div class="post-repeater">
	<a href="<?php the_permalink(); ?>" title="Read <?php the_title();?>">
		<img src="<?php the_post_thumbnail_url( 'full' ); ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title();?>">
	</a>
	<h2><a href="<?php the_permalink(); ?>" title="Read <?php the_title();?>"><?php the_title();?></a></h2>
	<?php the_excerpt(); ?>
</div>