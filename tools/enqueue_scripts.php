<?php

//Include Scripts into the header and footer
add_action('wp_enqueue_scripts', 'prinz_scripts');
function prinz_scripts() {
	//     wp_enqueue_script('jquery');
	//     wp_enqueue_script('pretty', get_bloginfo('template_url').'/scripts/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '2.5.6', true);
	//     wp_enqueue_style('pretty', get_bloginfo('template_url').'/scripts/prettyPhoto/css/prettyPhoto.css', false, '2.5.6', 'all' );
	// wp_enqueue_script('dropdown', get_bloginfo('template_url').'/scripts/dropdowns.js', array(), false, true );
}


// Themes header
add_action('wp_head','prinz_theme_head');
function prinz_theme_head() { ?>

<script type="text/javascript">
 var $j = jQuery.noConflict();

// (function($j) {
//     $j(document).ready(function(){
//         $j("a[rel^='prettyPhoto']").prettyPhoto();
//     });
// })(jQuery);
</script>
<?php } 
?>