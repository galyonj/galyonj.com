<?php
/**
 * Footer template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */
?>
				</div>
			</div>
		</div>
		<footer aria-role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-2 pull-right footer-brand-column">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/john.svg"
							     alt="<?php bloginfo(	'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
						</a>
					</div>
					<div class="col-xs-12 col-sm-10 pull-left footer-info-column">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'social-nav',
							'menu'            => 'social-nav',
							'container'       => false,
							'menu_class'      => 'social-nav',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'depth'           => 0,
						) );
						?>
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'footer-nav',
							'menu'            => 'footer-nav',
							'container'       => false,
							'menu_class'      => 'footer-nav',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'depth'           => 0,
						) );
						?>
						<p class="small">Copyright <?php echo date('Y'); ?>. The thoughts recorded herein are my own, and
							should not be construed to represent those of my employer(s), or any other entity with which I
							may	be associated.</p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
