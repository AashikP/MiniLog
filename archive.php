<?php
/**
 * Archive Tempalte
 *
 * One template to load all archive pages.
 *
 * @package Minilog
 */

get_header();
?>

<div class="mini-archive">
<?php
while (
	have_posts() ) :
	the_post();
	?>
	<div class="mini-excerpt">
	<div <?php post_class(); ?>>
			<?php
			the_post_thumbnail(
				'thumbnail',
				array(
					'class' => 'alignleft',
				)
			);
			?>
			<div class="entry-meta">
				<?php the_time( get_option( 'date_format' ) ); ?>
				<?php esc_html_e( ' by ', 'minilog' ); ?>
				<?php esc_url( the_author_posts_link() ); ?>
			</div>	<!-- /entry-meta -->
			<div class="entry-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<?php the_excerpt(); ?>
		</div> <!-- /post_class -->
	</div><!-- /mini-excerpt -->
<?php endwhile; ?>
	<div class="pagination">
		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 10,
				'prev_text' => __( '&laquo; Previous', 'minilog' ),
				'next_text' => __( 'Next &raquo;', 'minilog' ),
			)
		);
		?>
	</div>	<!-- /pagination -->
</div><!-- /archive ; end archive post listing -->
<?php get_sidebar(); ?>
</div><!-- /container -->
<?php get_footer(); ?>
