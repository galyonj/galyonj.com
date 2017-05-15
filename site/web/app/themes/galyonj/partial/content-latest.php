<?php
/**
 * Partial to output the newest post on the index page
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 3, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */ ?>

<div class="latest">
	<div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 50%,rgba(0,0,0,0.5)
		100%), url('<?php the_post_thumbnail_url( 'full' ); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>
						<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<p class="lead"><?php echo get_the_excerpt(); ?></p>
</div>