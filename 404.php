<?php
/**
 * 404 Template
 *
 * Template for `Page Not Found`
 *
 * @package Minilog
 */

get_header(); ?>

	<div class="main">
		<div class="entry-header"><?php esc_html_e( 'Nothing found', 'minilog' ); ?></div>
		<p><?php esc_html_e( 'Apologies, but no entries were found. Please try searching again.', 'minilog' ); // If there are no results, display the search bar again. ?></p>
		<center>
			<?php get_search_form(); ?>
		</center>
	</div>	<!-- /main -->
	<?php get_sidebar(); ?>
</div> <!-- /container -->
	<?php get_footer(); ?>
