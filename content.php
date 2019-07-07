	<?php get_header(); // Loads the header.php template.	?>

	<div class="mini-page">
	<?php 
	
	while ( have_posts() ) : the_post();
	
	the_content();  //Load the page content
	
	endwhile; // have_posts()
	?>
	
	</div> <!-- /mini-page-->
	
</div><!-- /container -->

	<?php get_footer(); // Loads the footer.php template.	?>