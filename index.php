<?php get_header(); // Loads the header.php template.	?>
	
	<?php 
		if ( is_front_page() && is_home() ) {
			get_template_part( 'archive', get_post_format() ); // Default homepage (blog / archive)
		} elseif ( is_front_page() ) {
			get_template_part( 'content', get_post_format() ); // If Static homepage
		} elseif ( is_home() ) {
			get_template_part( 'archive', get_post_format() ); // Blog page (same as archive)
		} elseif ( is_archive() ){
			get_template_part( 'archive', get_post_format() ); // Archive Page
		} elseif ( is_single()  ){
			get_template_part( 'single', get_post_format() ); // Single Post
		} elseif ( is_search()  ){
		get_template_part( 'search', get_post_format() ); // Search Page
		} elseif ( is_page()  ){
			get_template_part( 'page', get_post_format() ); //  Normal pages
		} elseif ( is_404() ){
			get_template_part( '404', get_post_format() ); // 404 pages
		} else {
			get_template_part( 'content', get_post_format() ); //everything else
		}			
	?>
	
<?php get_sidebar(); // Loads the sidebar.php template.	?>

</div> <!-- /container-->

	<?php get_footer(); // Loads the footer.php template.	?>