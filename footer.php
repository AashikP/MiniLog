<?php
/**
 * Footer Tempalte
 *
 * @package Minilog
 */

?>
</div> <!-- /wrapper-->
	<div class="footer">
		<div class="footer-container">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer_menu',
				'menu_class'     => 'footer-menu',
				'fallback_cb'    => '__return_false',
			)
		);
		?>
		</div>
	</div>	<!-- /footer-->
	<?php wp_footer(); // Loads scripts. Do not delete! ?> 
</body>
</html>
