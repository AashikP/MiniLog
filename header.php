<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div class="container">
*
* @package MiniLog
* @version 1.0
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>> <!-- Top Menu -->
	
	<div class="wrapper">
		<div class="top-nav">
			<div class="top-container">
			<div class="mini-home">
			<a href="<?php echo esc_url( home_url() ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
			</div>
			
			<div class="top-search">
			<?php get_search_form(); // Only displayed in the mobile view by default?>
			</div>		

			<div id="popout" class="mini-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container_class'=>'top-menu','fallback_cb'=>'__return_false') ); ?>
			</div>
			<a class="toggle-nav" href="#"><?php _e('Menu &#9776;', 'minilog');?></a>
			</div>
		</div>

		<!-- breadcrumbs -->
		<div class="container">
			<?php if ( function_exists( 'minilog_breadcrumb' ) ) minilog_breadcrumb(); ?>