	<?php get_header(); // Loads the header.php template.	?>

	<div class="mini-archive">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="mini-excerpt">
			<div class="entry-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<div class="entry-meta">
				<?php the_time( get_option( 'date_format' ) ) ?>
				<?php _e(' by ','minilog'); ?>
				<?php the_author(); ?>
			</div>
			<?php the_excerpt(); // Search Results ?>
		</div>	<!-- excerpt -->
		<?php endwhile; ?>	
		
		<div class="pagination">
			<?php // Load pagination - up to 10 pages
			the_posts_pagination( array(
			'mid_size'  => 10,
			'prev_text' => __( '&laquo; Previous', 'minilog' ),
			'next_text' => __( 'Next &raquo;', 'minilog' ),
			) );	
			?>
		</div>	<!-- /pagination -->	
		
		<?php else: ?>

		<div class="mini-excerpt">
			<div class="entry-header"><?php esc_html_e( 'Nothing found', 'minilog' ); ?></div>
			<?php _e('<p>Apologies, but no entries were found. Please try searching again.</p>', 'minilog'); // If there are no results, display the search bar again.	?>
			<center>
				<?php get_search_form(); // Loads the search form ?>
			</center>			
		</div>	<!-- /excerpt -->
		<?php endif; ?>

	</div>	<!-- /archive -->
	
	<?php get_sidebar(); // Loads the sidebar.php template.	?>

</div>	<!-- /container -->

	<?php get_footer(); // Loads the footer.php template.	?>