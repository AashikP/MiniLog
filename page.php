<?php
/**
 * Page template
 *
 * Template to display pages
 *
 * @package Minilog
 */

get_header();
?>

<div class="mini-page">
<div class="entry-header"><?php the_title(); ?></div>

<?php
while ( have_posts() ) :
	the_post();
	the_content();
endwhile;
?>

</div> <!-- /mini-page-->
</div><!-- /container -->

<?php get_footer(); ?>
