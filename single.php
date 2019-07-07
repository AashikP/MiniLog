	<?php get_header(); // Loads the header.php template.	?>

	<div  id="post-<?php the_ID(); ?>"   <?php post_class( 'main' ); ?>>
	<?php while ( have_posts() ) : the_post();?>
		<div class="entry-meta">
			<?php the_time( get_option( 'date_format' ) ); ?>
			<?php _e(' by ','minilog'); ?>
			<?php esc_url(the_author_posts_link()); // Read more posts from the author	?>
		</div>	<!-- /entry-meta -->
	<div class="entry-header"><?php the_title(); ?></div>

	<?php 
		the_content(); 

		wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'minilog' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span class="page-links-number">',
		'link_after'  => '</span>',
		) );

		endwhile;?>

<!-- Display Categories and tags for the post -->
	<div class="taxonomy">
		<p><?php the_terms( $post->ID, 'category', __( 'Categories: ', 'minilog' ), '/' ); ?></p>
		<p><?php the_tags( __( 'Tags: ', 'minilog' ), '/'); ?></p>
	</div>	<!-- /taxonomy -->	

	</div>	<!-- /main -->	

	<?php get_sidebar(); ?>

	<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description , show a bio on their entries. ?>
	
	<div class="main author-info">
		<p class="author-title"><?php printf( __( 'About &ldquo;%s&rdquo;', 'minilog' ), get_the_author() );?></p>
		<div class="author-card">
			<?php	echo get_avatar( get_the_author_meta( 'user_email' ), 60 );	?>
		</div><!-- .author-card -->
		<div class="author-description">
			<p><?php the_author_meta( 'description' ); ?></p>
			<div class="author-link">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php _e('Other posts &raquo;','minilog') ?>
			</a>
			</div><!-- /author-link	-->
		</div><!-- /author-description -->
	</div><!-- /main /author-info -->
	
	<?php endif; ?>
	
	<!-- Links to access next and previous posts -->
	<div class="main">
		<?php previous_post_link( '<div class="prev_post">' . esc_html__( 'Previous Post: %link', 'minilog') . '</div>', '%title' ); ?>
		<?php next_post_link(     '<div class="next_post">' . esc_html__( 'Next Post: %link', 'minilog') . '</div>', '%title' ); ?>
	</div><!-- /posts-navigation -->

	<?php if ( comments_open() || get_comments_number() ) :
	comments_template(); // Loads the comments.php template.
	endif;?>

	</div> <!-- /container-->

<?php get_footer(); // Loads the footer.php template. ?>