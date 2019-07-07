// Toggle navigation menu for mobile devices
(function($) {
jQuery('.toggle-nav').toggle( 
    function() {
        jQuery('#popout').animate({ left: 0 }, 'slow', function() {
            jQuery('.toggle-nav').html('&#x2613;');
        });
    }, 
    function() {
        jQuery('.mini-nav').animate({ left: -200 }, 'slow', function() {
            jQuery('#popout');
			jQuery('.toggle-nav').html('Menu &#9776;');
        });
    }
);
})(jQuery);