	<?php get_header();	// Loads the header.php template.	?>

	<div class="mini-archive">
	<?php while ( have_posts() ) : the_post(); //Check if posts are available; when available, display posts	?>

		<div class="mini-excerpt">

		<div <?php post_class(); // post class for sticky-post styling and future updates	?>>

				<?php the_post_thumbnail( 'thumbnail', array('class' => 'alignleft')); // Display thumbnail if feature image is set	?>
				
				<div class="entry-meta">
					<?php the_time( get_option( 'date_format' ) ); ?>
					<?php _e(' by ','minilog'); ?>
					<?php esc_url(the_author_posts_link()); // Read more posts from the author	?>
				</div>	<!-- /entry-meta -->
				<div class="entry-header"><a href="<?php the_permalink(); ?>"><?php the_title(); // Title info	?></a></div>

				<?php the_excerpt(); // Excerpt of the post?>
				
							
			</div> <!-- /post_class -->
		
		</div><!-- /mini-excerpt -->
		
	<?php endwhile; // have_posts() ?>

		<div class="pagination">
			<?php // Load pagination - up to 10 pages
			the_posts_pagination( array(
			'mid_size'  => 10,
			'prev_text' => __( '&laquo; Previous', 'minilog' ),
			'next_text' => __( 'Next &raquo;', 'minilog' ),
			) );	
			?>
		</div>	<!-- /pagination -->

	</div><!-- /archive ; end archive post listing -->

	<?php get_sidebar(); // Loads the sidebar.php template. ?>
	
</div><!-- /container -->

	<?php get_footer(); // Loads the footer.php template.	?>