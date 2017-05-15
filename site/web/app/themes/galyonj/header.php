<?php
/**
 * Header template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */
?>

<!doctype html>
<html class="no-js" lang="<?php echo get_bloginfo( 'language' ); ?>">
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#333">

		<!-- touch icon -->
		<link rel="apple-touch-icon" href="<?php echo trailingslashit( get_template_directory_uri() );
		?>img/icons/apple-touch-icon.png">

		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/favicon.png" type="image/x-icon">

		<!-- modernizr -->
		<script src="<?php echo trailingslashit( get_template_directory_uri() ); ?>modernizr.js" async></script>

		<!-- fontawesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

		<?php wp_head(); ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-88932614-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body>
		<div class="wrapper">
			<a href="#" class="scroll-top" data-scroll><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			<div class="container">
				<div class="row">
					<header class="col-xs-12 col-sm-4 col-md-3 pull-right">
						<div class="sidebar-nav">
							<nav class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="sr-only">toggle navigation</span>
									</button>
									<a href="<?php echo home_url(); ?>" class="navbar-brand">
										<img src="<?php echo trailingslashit( get_template_directory_uri() );
										?>img/john.svg" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
									</a>
								</div>
								<div class="collapse navbar-collapse" id="navbar">
									<ul class="nav navbar-nav">
										<?php
										$defaults = array(
											'theme_location'  => 'main-nav',
											'menu'            => 'main-nav',
											'container'       => false,
											'menu_class'      => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'depth'           => 0,
											'items_wrap'      => '%3$s'
										);

										wp_nav_menu( $defaults );
										?>
										<li>
											<form action="<?php echo home_url( '/' ); ?>" class="navbar-form" role="search" method="get" id="searchform">
												<div class="input-group">
													<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search',''); ?>">
													<span class="input-group-btn">
														<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
													</span>
												</div>
											</form>
										</li>
									</ul>
								</div>
							</nav> <!-- navbar -->
						</div> <!-- sidebar-nav -->
					</header>