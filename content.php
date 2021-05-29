<?php
/**
 * Content Tempalte
 *
 * Fallback template - just in case.
 *
 * @package Minilog
 */

get_header(); ?>

<div class="mini-page">
<?php
while (
	have_posts() ) :
	the_post();
	the_content();  // Load the page content.
endwhile;
?>

</div> <!-- /mini-page-->
</div><!-- /container -->

<?php get_footer(); ?>
