<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="container">
 *
 * @package MiniLog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
		if ( is_singular() && pings_open() ) :
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		endif;
		wp_head();
		?>
	</head>

	<body <?php body_class(); ?>> <!-- Top Menu -->
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	?>
	<header>
	<a class="screen-reader-text skip-link" href="#site-content">Skip to content</a>
	</header>
	<div class="wrapper">
		<div class="top-nav">
			<div class="top-container">
			<div class="mini-home">
			<a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
			</div>

			<div class="top-search">
			<?php get_search_form(); // Only displayed in the mobile view by default. ?>
			</div>

			<div class="top-menu">
				<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'minilog' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'top_menu',
						'menu_id'        => 'top-menu',
						'depth'          => '2',
					)
				);
				?>
				</nav><!-- #site-navigation -->
			</div>
			</div>
		</div>

		<!-- breadcrumbs -->
		<div id="site-content" class="container">
			<?php
			if ( function_exists( 'minilog_breadcrumb' ) ) {
					minilog_breadcrumb();
			}
			?>
