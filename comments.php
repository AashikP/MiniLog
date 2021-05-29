<?php
/**
 * Comment Template
 *
 * Called on every page/post that has comments enabled.
 *
 * @package Minilog
 */

?>
<div class="response">
<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : // If there are comments on the page / post. ?>
			<h3 class="comments-title">
				<?php
				printf(
					_nx( '%1$s comment on &ldquo; %2$s &rdquo;', '%1$s Comments on &ldquo; %2$s &rdquo;', get_comments_number(), 'comments title', 'minilog' ), // phpcs:ignore
					number_format_i18n( get_comments_number() ), // phpcs:ignore
					get_the_title() // phpcs:ignore
				);
				?>
			</h3>	<!-- /comments-title-->
			<ul class="comment-list">
			<?php wp_list_comments(); // List the existing comments. ?>
			</ul> <!-- /comments list-->
			<div class="pagination">
			<?php paginate_comments_links(); ?>
			</div>	<!-- /comment pagination-->
	<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'minilog' ); ?></p>
			<?php
				endif;
				comment_form(); // Comment Form.
		?>
</div> <!-- /comments-area -->
</div> <!-- /response -->
