	<?php get_header(); // Loads the header.php template. ?>

	<div class="main">
		<div class="entry-header"><?php esc_html_e( 'Nothing found', 'minilog' ); ?></div>
		<?php _e('<p>Apologies, but no entries were found. Perhaps searching can help.</p>', 'minilog'); //	Returns 404 page if there are no search results	?>
		<center>
			<?php get_search_form(); ?>
		</center>
	</div>	<!-- /main -->

	<?php get_sidebar(); // Loads the sidebar.php template. ?>

</div> <!-- /container -->

	<?php get_footer(); // Loads the footer.php template. ?>