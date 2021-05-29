<?php
/**
 * Sidebar template
 *
 * Will be loaded on all the templates that supports widgets.
 *
 * @package Minilog
 */

?>
<div class="sidebar">
<div class="widget-area">
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	dynamic_sidebar( 'sidebar-1' );
	// Time to add some widgets.
	else :
		the_widget(
			'WP_Widget_Text',
			array(
				'title'  => __( 'Example Widget', 'minilog' ),
				// Translators: The %s are placeholders for HTML, so the order can't be changed.
				'text'   => sprintf( __( 'This is an example widget to show how the Primary sidebar looks by default. You can add custom widgets from the %1$swidgets screen%2$s in the admin.', 'minilog' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
				'filter' => true,
			),
			array(
				'before_widget' => '<section class="widget widget_text">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
endif;
	?>

</div> <!-- /widget-area -->
</div><!-- /sidebar -->
