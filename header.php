<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<!-- Description of the site -->
	<div class="container">
		<h1 id="logo">
			<a class="unstyled" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<small>[<?php bloginfo( 'description' ); ?>]</small>
		</h1>
	</div>

	<!-- The normal large screen display -->
	<div class="container hidden-sm hidden-xs">
		<center>
			<?php
				$defaults = array(
					'container'       => 'nav',
					'container_class' => 'navbar navbar-inverse',
					'echo'            => false,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
				);

				$menu = wp_nav_menu( $defaults);
				echo str_replace('</ul></nav>', '</ul>' . add_search_box_to_menu() . '</nav>', $menu);
			?>
		</center>
	</div>

	<!-- The small screen menu version -->
	<div class="container hidden-lg hidden-md">
		<center>
			<?php
				$defaults =  array(
			       'container' 	=> false,
			       'items_wrap' => '<div class="btn-group pull-left">%3$s</div>',
			       'echo'		=> false
				);

				$menu 		= wp_nav_menu( $defaults );
				$find 		= array('><a','li', 'class="menu');
				$replace 	= array('','a', 'class="btn btn-primary menu');
				echo str_replace( $find, $replace, $menu ) . add_search_box_to_menu("<br />", true);
			?>
		</center>
	</div>

	<!-- Where the body begins -->
	<div id="main" class="container">
		<hr class="visible-sm visible-xs" />