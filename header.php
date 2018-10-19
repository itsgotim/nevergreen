<?php
/**
 * The header template part for our theme
 */

?><!DOCTYPE html>
<html lang="eng">
	<head>
		<meta <?php bloginfo( 'charset' ); ?>>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Tim Schorr">
		<?php wp_head(); ?>
		<!--<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">-->
	</head>
	<body <?php echo (is_front_page()) ? body_class() : body_class('pad-fix'); ?>>
		<header>
			<!--NAVBAR-->
			<nav id="navBar" class="navbar navbar-expand-md navbar-dark fixed-top <?php echo (is_admin_bar_showing()) ? 'top-fix' : ''; echo (!is_front_page()) ? ' navbar-solid' : ''; ?>">
				<div class="container">
					<h1 id="siteTitle"><a href="<?php echo get_bloginfo( 'wpurl' );?>" class="navbar-brand"><?php echo get_bloginfo( 'name' ); ?></a></h1>
					<p class="sr-only"><?php echo get_bloginfo( 'description' ); ?></p>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar" aria-controls="mainNavBar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<?php
					wp_nav_menu([
						'menu'		=> 'Main Nav',
						'theme_location'		=>	'header-menu',
						'container'					=>	'div',
						'container_id'			=>	'mainNavBar',
						'container_class'		=>	'collapse navbar-collapse',
						'menu_id'						=>	'headerMenu',
						'menu_class'				=>	'navbar-nav nav-pills ml-auto',
						'depth'							=> 	2,
						'fallback_cb'				=>	'bs4navwalker::fallback',
						'walker'						=>	new bs4navwalker()
					]);
					?>
					<!--<form class="form-inline my-2 my-md-0">
					  <input class="form-control" type="text" placeholder="Search">
					</form>-->
				</div><!--container-->
			</nav>
		
		<?php if (is_front_page()): ?>
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4 text-center">Full Height Jumbotron</h1>
					<p>Lorem ipsum dolor sit amet. This is a call to action!</p>
					<button type="button" class="btn btn-primary">Sign Up</button>
				</div>
			</div>
		<?php endif; ?>
		
		</header>
		
		<div id="content" class="container pt-5">