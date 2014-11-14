<?php
///////////////////////////////////////////////////////////////////////////////////////////
/////////   					VARIOUS FUNCTIONS    					//////////////////
//////// This file contains various functions that are needed in the theme //////////////
////////////////////////////////////////////////////////////////////////////////////////

// Sets a constant for the theme directory. Very useful sometimes.
if(!defined('WP_THEME_URL')) {
define( 'WP_THEME_URL', get_bloginfo('stylesheet_directory'));
}


// DER PRiNZ Dashboard Widget (Just for fun)
add_action('wp_dashboard_setup', 'custom_dashboard_widgets');

function custom_dashboard_widgets(){
	//first parameter is the ID of the widget (the div holding the widget will have that ID)
	//second parameter is title (shown in the header of the widget) -> see picture below
	//third parameter is the function name we are calling to get the content of our widget
	wp_add_dashboard_widget('my_custom_widget_id', 'PRiNZ SpiegelMagazine Setup', 'my_custom_widget');
}

function my_custom_widget() {
	//the content of our custom widget
	echo '<p>Do not forget to go to the ';
	echo '<a href="';
	echo bloginfo('wpurl');
	echo '/wp-admin/themes.php?page=functions.php">SpiegelMagazine Options Page</a> to make the initial settings for the theme.</p>';	
}


// Function to get WordPress image attachment and use tim thumb to rezize and crob
// usage: < ?php postimage(300,200); ? > or whatever dimensions you want
// requires tim thumb in your themes /scripts folder and at least WordPress 2.9

function postimage($width,$height) {
    $scriptpath = get_bloginfo('template_directory'); 
    $attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
    if (empty ($attachments)) {
        echo '';
    }
    else {
    $img = array_shift($attachments);
    $imagelink = wp_get_attachment_image_src($img->ID,'full');
    $image = $imagelink[0];
		echo '<a class="alignleft" href="';
		echo the_permalink();
        echo '" rel="bookmark" title="';
		echo the_title();
		echo '">';
        echo '<img src="'.$scriptpath.'/scripts/timthumb.php?src='.$image.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1" alt="';
		echo the_title();
		echo '" />';
		echo '</a>';
}
}

 //modify the excerpt lenght (Wordpress default is 55 words)
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
	if (is_archive()) {
		return 85; // This is the number of words in archive pages (e.g. category overview). 
    } else {
        return 45; // This is the number of words in all other excerpts
    }
}

// Changing excerpt more
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
    return ' <a style="text-decoration:none;" href="'.get_permalink().'" rel="nofollow">[...]</a>';
}  



// Automatically add rel=prettyPhoto to image links
define("IMAGE_EXTENSIONS", 'jpg|jpeg|png|gif|bmp|ico');		// checking for extension, divided by pipes (no leading or trailing pipe!!)

function prinz_auto_prettyPhoto($content) {
	preg_match_all('/<a(.*?)href=[\s\"\'\`](.*?)[\"\'\`](.*?)>/i', $content, $matches);	
	
	foreach ($matches[0] as $match) {
		if (preg_match('/href=[\s\"\'\`]+.*('.IMAGE_EXTENSIONS.')[\"\'\`]/i', $match)) {
			
			if (preg_match('/rel=[\s\"\'\`]prettyPhoto(.*?)[\"\'\`]/i', $match) == false) {
				$addrel = str_replace('>', ' rel=\'prettyPhoto\'>', $match);
			
				$content = str_replace($match, $addrel, $content);	
			}
		}
	}
	return $content;
}

add_filter('the_content', 'prinz_auto_prettyPhoto');


/**
* Nicer page navigation links
* @author Sergej Müller
* @param  integer  $range  Links um aktuelle Seite [optional]
*/

function the_paging_bar($range = 4) {
  /* Init */
  $count = @$GLOBALS['wp_query']->max_num_pages;
  $page = @$GLOBALS['paged'];
  $ceil = ceil($range / 2);

  /* No Paging? */
  if ($count <= 1) {
    return false;
  }

  /* First page? */
  if (!$page) {
    $page = 1;
  }

  /* Calculate limit */
  if ($count > $range) {
    if ($page <= $range) {
      $min = 1;
      $max = $range + 1;
    } elseif ($page >= ($count - $ceil)) {
      $min = $count - $range;
      $max = $count;
    } elseif ($page >= $range && $page < ($count - $ceil)) {
      $min = $page - $ceil;
      $max = $page + $ceil;
    }
  } else {
    $min = 1;
    $max = $count;
  }

  /* Output */
  if (!empty($min) && !empty($max)) {
    for($i = $min; $i <= $max; $i++){
       echo sprintf(
        '<a href="%s"%s>%d</a>',
        get_pagenum_link($i),
        ($i == $page ? ' class="active"' : ''),
        $i
      );
     }
  }
}


// Default settings for the wp-cycle image rotator plugin
add_filter('wp_cycle_defaults', 'my_theme_wp_cycle_defaults');
function my_theme_wp_cycle_defaults() {
	$defaults = array(
	'rotate' => 1,
	'effect' => 'fade',
	'delay' => 5,
	'duration' => 2,
	'img_width' => 940,
	'img_height' => 350,
	'div' => 'rotator'
	);
	return $defaults;
}


// the following useful functions were taken from here: http://yoast.com/wordpress-functions-supercharge-theme/

// Remove Really simple discovery link
remove_action('wp_head', 'rsd_link');
// Remove Windows Live Writer link
remove_action('wp_head', 'wlwmanifest_link');
// Remove the version number
remove_action('wp_head', 'wp_generator');

// allow html in user profiles
remove_filter('pre_user_description', 'wp_filter_kses');
?>