<?php
///////////////////////////////////////////////////////////////////////////////////////////
/////////   					THEME OPTIONS PAGE 						//////////////////
/////////////////////////////////////////////////////////////////////////////////////////
define('THEME', get_bloginfo('template_url'), true);
define('THEME_JS', THEME . '/js/', true);

$themename = "SpiegelMagazine";
$shortname = "prinz";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Select a Category"); 



$options = array (
				  
				  array( "name" => $themename." Options",
						 "type" => "title"),

				array( 	"name" => "Setup the Header",
						"desc" => "Choose if you like to use a Logo or your Blogname and Description in the Header. By default the Logo is used. You can change the Logo in the \"<a href=\"themes.php?page=custom-header\">Header</a>\" Section of your Wordpress Administration (Wordpress 3.0 or higher required).",
						"type" => "section"),
				array( 	"type" => "open"),
								
				array(	"name" => "Header Logo or Blogname?",
						"desc" => "Check this if you want to use your Blogname and Description instead of a Logo (default = Logo).",
						"id" => $shortname."_nologo",
						"std" => "false",
						"type" => "checkbox"),
						
				array( 	"type" => "close"),

				array( 	"name" => "Setup Pages and Categories Menue",
					  	"desc" => "Here you can setup the top menu bars. It is reccomended to use the WordPress custom menu functionality.",
						"type" => "section"),
				array( 	"type" => "open"),
				
				array(	"name" => "Remove default Page Menu",
						"desc" => "Check this if you want to REMOVE the horizontal page menu",
						"id" => $shortname."_pagemenuon",
						"std" => "false",
						"type" => "checkbox"),
						
				array(	"name" => __('Exclude Pages'),
						"desc" => __("Enter the IDs of the pages you want to EXCLUDE from the page menue bar"),
						"id" => $shortname."_menuepages",
						"std" => __(""),
						"type" => "text"),
				
				array(	"name" => __('Remove default Category Menu'),
						"desc" => __("Check this if you want to REMOVE the horizontal category menu"),
						"id" => $shortname."_catmenuon",
						"std" => __("false"),
						"type" => "checkbox"),
						
				array(	"name" => __('Exclude Categories'),
						"desc" => __("Enter the IDs of the categories you want to EXCLUDE from the categories menue bar.<br />The default ID 9999 is a workaround because it does not work if no ID is put here. So leave it or change it to your own IDs but do nott leave it blank. "),
						"id" => $shortname."_menuecats",
						"std" => __("9999"),
						"type" => "text"),
				
				array(	"name" => __('Use WordPress custom Menus'),
						"desc" => __("Check this if you want to USE the WordPress custom menu function in the horizontal menu bars (reccomended). You need to setup at least one custom menue in your Wordpress backend before you can use this option."),
						"id" => $shortname."_wpmenuon",
						"std" => __("false"),
						"type" => "checkbox"),
				
				array( 	"type" => "close"),



				array( 	"name" => "Setup the Leadarticle Area",
						"desc" => __("The leadarticle area provides the big image slider or specific content depending on the settings."),
						"type" => "section"),
				array( 	"type" => "open"),
										
				array(	"name" => __('WP-Cycle'),
						"desc" => __("Check this box if you want to use the <a href=\"http://wordpress.org/extend/plugins/wp-cycle/\">WP-Cycle Plugin</a>.<br />Before you can use it you need to <a href=\"themes.php?page=wp-cycle\">upload images here</a>."),
						"id" => $shortname."_wp_cycle",
						"std" => "false",
						"type" => "checkbox"),
																
				array(	"name" => __('Leadarticle category'),
						"desc" => __("Select the category that will be used as the leadarticle category (only required if you do not use the wp-cycle image slider)."),
						"id" => $shortname."_lead",
						"type" => "select",
						"options" => $wp_cats,
						"std" => "Select a Category"),
																								
				array( 	"type" => "close"),
				
						
				array( 	"name" => "Setup the featured Articles below the Slider/Leadarticle",
						"desc" => __("The featured articles are the 3 articles below the image/content slider on the homepage. They are taken from one specific category that you might call whatever you want."),
						"type" => "section"),
				array( 	"type" => "open"),

				array(	"name" => __('Featured articles category'),
						"desc" => __("Select the category that will be used as the featured article category"),
						"id" => $shortname."_featured",
						"type" => "select",
						"options" => $wp_cats,
						"std" => "Select a Category"),
						
				array( 	"type" => "close"),
				

				array( 	"name" => "Setup the homepage bottom columns",
						"desc" => __("In the lower area of the homepage two columns (left, right) with different categories are displayed. Here you can define which ones."),
						"type" => "section"),
				array( 	"type" => "open"),

				array(	"name" => __('Homepage categories left'),
						"desc" => __("Enter the IDs of the categories separated by a comma"),
						"id" => $shortname."_homecatsleft",
						"std" => __("1,2"),
						"type" => "text"),

				array(	"name" => __('Homepage categories right'),
						"desc" => __("Enter the IDs of the categories separated by a comma"),
						"id" => $shortname."_homecatsright",
						"std" => __("1,2"),
						"type" => "text"),

				array(	"name" => __('Homepage categories number of posts per category'),
						"desc" => __("Enter a number of posts per category displayed in the in the middle column of the homepage (default = 1)"),
						"id" => $shortname."_homecatsnumber",
						"std" => __("1"),
						"type" => "text"),
						
				array( 	"type" => "close"),
						
						
				array( 	"name" => "Setup the Image Dimensions",
						"desc" => __("Here you can define the dimensions (width and height in pixels) of the various images on the homepage."),
						"type" => "section"),
				array( 	"type" => "open"),

				array(	"name" => __('Leadarticle Image Width '),
						"desc" => __("Set the width of the image in the leadarticle (default = 460). Only required if you do not use the wp-cycle image slider. "),
						"id" => $shortname."_leadimage_width",
						"std" => "460",
						"type" => "text"),
				
				array(	"name" => __('Leadarticle Image Height '),
					  	"desc" => __("Set the height of the leadarticle image (default = 250). Only required if you do not use the wp-cycle image slider."),
						"id" => $shortname."_leadimage_height",
						"std" => "250",
						"type" => "text"),

				array(	"name" => __('Featured Article Images Height'),
						"desc" => __("Set the height in pixels (i.e 100 if you want it to be 100 pixels high. Default = 130). The width can not be changed for this image because that might destroy the layout."),
						"id" => $shortname."_featuredimage_height",
						"std" => __("130"),
						"type" => "text"),
				
				array(	"name" => __('Category Thumbnails Width '),
						"desc" => __("Set the width of the thumbnail images in the area below the featured articles (default = 170)."),
						"id" => $shortname."_catimage_width",
						"std" => "170",
						"type" => "text"),
				
				array(	"name" => __('Category Thumbnails Height '),
					  	"desc" => __("Set the height of the thumbnails (default = 110)."),
						"id" => $shortname."_catimage_height",
						"std" => "110",
						"type" => "text"),
						
				array(	"name" => __('Category Archive Thumbnails Width '),
						"desc" => __("Set the width of the thumbnail images in category archive pages (default = 170)."),
						"id" => $shortname."_archiveimage_width",
						"std" => "170",
						"type" => "text"),
				
				array(	"name" => __('Category Archive Thumbnails Height '),
					  	"desc" => __("Set the height of the thumbnails (default = 110)."),
						"id" => $shortname."_archiveimage_height",
						"std" => "110",
						"type" => "text"),
						
				array( 	"type" => "close"),
						
						

				array( 	"name" => "Setup the 3-column page template",
						"desc" => "The 3-column page is a special template to display content from three different categories in a very prominent way.",
						"type" => "section"),
				array( 	"type" => "open"),
										
				array(	"name" => __('3 column page left side category'),
						"desc" => __("Select the category that will be used in the left column of the 3-column page"),
						"id" => $shortname."_3col_left",
						"type" => "select",
						"options" => $wp_cats,
						"std" => "Select a Category"),
						
				array(	"name" => __('3-column page left number of posts per category'),
						"desc" => __("Enter a number of posts displayed in the in the left column of the 3-column page (default = 1)"),
						"id" => $shortname."_3col_leftnum",
						"std" => __("1"),
						"type" => "text"),
						
				array(	"name" => __('3 column page middle category'),
						"desc" => __("Select the category that will be used in the middle column of the 3-column page"),
						"id" => $shortname."_3col_middle",
						"type" => "select",
						"options" => $wp_cats,
						"std" => "Select a Category"),
						
				array(	"name" => __('3-column page middle number of posts per category'),
						"desc" => __("Enter a number of posts displayed in the in the middle column of the 3-column page (default = 1)"),
						"id" => $shortname."_3col_middlenum",
						"std" => __("1"),
						"type" => "text"),
						
				array(	"name" => __('3 column page right side category'),
						"desc" => __("Select the category that will be used in the right column of the 3-column page"),
						"id" => $shortname."_3col_right",
						"type" => "select",
						"options" => $wp_cats,
						"std" => "Select a Category"),
						
				array(	"name" => __('3-column page right number of posts per category'),
						"desc" => __("Enter a number of posts displayed in the in the right column of the 3-column page (default = 1)"),
						"id" => $shortname."_3col_rightnum",
						"std" => __("1"),
						"type" => "text"),
						
				array( 	"type" => "close"),
				
				
				array( 	"name" => "Setup the Footer",
						"desc" => "Choose if you like to use the alternative Footer. You will get an additional 4-column widgetized area.",
						"type" => "section"),
				array( 	"type" => "open"),
				
				array(	"name" => "Use alternative Footer?",
						"desc" => "Check this if you want to use the alternative Footer (default = regular Footer).",
						"id" => $shortname."_altfooter",
						"std" => "false",
						"type" => "checkbox"),
						
				array( 	"type" => "close"),
				
				
				array( 	"name" => "Google AdSense and Analytics code.",
						"type" => "section"),
				array( 	"type" => "open"),
				
				array(  "name" => __('Homepage advert code'),
						"desc" => __("Copy and paste your advert code (best fit 728x90px) into the box (e.g. Google AdSense)"),
						"id" => $shortname."_home_ads",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(
						"rows" => "12",
						"cols" => "85") ),
				
				array(  "name" => __('Google Analytics'),
						"desc" => __("Copy and paste your Google Analytics (or onother tracking) code into the box."),
						"id" => $shortname."_analytics",
						"std" => __(""),
						"type" => "textarea",
						"options" => array(
						"rows" => "12",
						"cols" => "85") ),	
				
				array( 	"type" => "close"),

							);
							

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=functions.php&saved=true");
die;

}
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=functions.php&reset=true");
die;

}
}

    add_theme_page($themename."Options", "SpiegelMagazine Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("theme-options", $file_dir."/tools/theme-options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/tools/rm_script.js", false, "1.0");
}

function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap rm_wrap">
<div id="prinzlogo"><img src="<?php bloginfo('template_directory')?>/tools/images/prinzlogo.png" /></div>
<h2><?php echo $themename; ?> Options</h2>
<div class="rm_opts">
<form method="post">
  <?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
  <?php break;

case "close":
?>
  </div>
  </div>
  <br />
  <?php break;

case "title":
?>
  <p>If you want to stay updated on periodic WordPress tipps & tricks please visit 
    my <a href="http://www.michaeloeser.de" title="www.michaeloeser.de">Business 
    Website (German)</a>, subscribe to my <a href="http://feeds.feedburner.com/der-prinz/feed">RSS Feed</a> or follow me on <a href="http://twitter.com/michaeloeser">Twitter.</a>   Check out my <a href="http://www.der-prinz.com" title="www.der-prinz.com">Themes 
    Website (English)</a> for themes updates and support.</a> For all kind of 
    issues concerning my themes I do offer support via the <a href="http://www.der-prinz.com/category/tutorials" title="Tutorials">Tutorials</a> and my <a href="http://www.der-prinz.com/support-forum/" title="Support Forum">Support 
    Forum</a> only.</p>
      <p><strong>INFO:</strong> All preset IDs are just examples and do match the 
    categories in my demodatabase. In most cases they will not match the IDs in 
    YOUR database!</p>
  <p>Click on the headlines to expand the options sections.</p>
  <?php break;

case 'text':
?>
  <div class="rm_input rm_text">
    <label for="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </label>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    <small> <?php echo $value['desc']; ?> </small>
    <div class="clearfix"></div>
  </div>
  <?php
break;

case 'textarea':
?>
  <div class="rm_input rm_textarea">
    <label for="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </label>
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?>
</textarea>
    <small> <?php echo $value['desc']; ?> </small>
    <div class="clearfix"></div>
  </div>
  <?php
break;

case 'select':
?>
  <div class="rm_input rm_select">
    <label for="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </label>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
      <?php foreach ($value['options'] as $option) { ?>
      <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>> <?php echo $option; ?> </option>
      <?php } ?>
    </select>
    <small> <?php echo $value['desc']; ?> </small>
    <div class="clearfix"></div>
  </div>
  <?php
break;

case "checkbox":
?>
  <div class="rm_input rm_checkbox">
    <label for="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </label>
    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
    <small> <?php echo $value['desc']; ?> </small>
    <div class="clearfix"></div>
  </div>
  <?php break;
case "section":

$i++;

?>
  <div class="rm_section">
  <div class="rm_title">
    <h3><img src="<?php bloginfo('template_directory')?>/tools/images/trans.png" class="inactive" alt=""> <?php echo $value['name']; ?> </h3>
    <span class="submit">
    <input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
    </span> <span class="optionsdescription"><?php echo $value['desc']; ?></span>
    <div class="clearfix"></div>
  </div>
  <div class="rm_options">
  <?php break;

}
}
?>
  <input type="hidden" name="action" value="save" />
</form>
<form method="post">
  <p class="submit">
    <input name="reset" type="submit" value="Reset" />
    <input type="hidden" name="action" value="reset" />
  </p>
</form>
<div style="font-size:9px; margin-bottom:10px;">Original Optionspanel by <a href="http://net.tutsplus.com/tutorials/wordpress/how-to-create-a-better-wordpress-options-panel">nettuts+</a><br />
  Icons by <a href="http://dryicons.com/free-icons/preview/colorful-stickers-part-2-icons-set/">dryicons</a></div>
</div>
<?php
}

///////////////////////////////////////////////////////////////////////////////////////////
/////////   					THEME OPTIONS PAGE END					//////////////////
/////////////////////////////////////////////////////////////////////////////////////////


// Prepare for localization
load_theme_textdomain ('spiegelmagazine', TEMPLATEPATH . '/languages');

// include the Scripts into header and Footer
include(TEMPLATEPATH."/tools/enqueue_scripts.php");

// include various functions
include(TEMPLATEPATH."/tools/various-functions.php");

// include new Wordpress 3.0 functions
include(TEMPLATEPATH."/tools/wp3-stuff.php");

// include the ignorePosts function for the "more from" Widgets
include(TEMPLATEPATH."/tools/ignore-post-function.php");

// include the widgetized areas (The Widgets)
include(TEMPLATEPATH."/tools/widgetized-areas.php");

// include the WP-Cycle Plugin
include(TEMPLATEPATH."/tools/wp-cycle/wp-cycle.php");

// Register Custom Widgets
require_once(TEMPLATEPATH."/tools/custom-widgets.php");

function home_top_box_content($post) {
  $box = '';
  // $home_content_top_img = apply_filters('the_content', get_post_meta($post->ID, 'home_content_top_img', $single = true) );
  // $box .= "<div>$home_content_top_img</div>";
  $box .= "<p>$post->post_excerpt</p>";
  print "$box";
}

function generate_thumb($thumb){ 
// By Matt Leyba and Jason Armour
if (isset($thumb))
	/*---------------Start Director Setup ------------------------*/
	// Include DirectorAPI class file
	include('http://www.heyreverb.com/wp-content/plugins/ssp-slideshow/classes/DirectorPHP.php');
	$director = new Director('hosted-9c9cf54218f185433472b1e031a9b8c3', 'reverb.slideshowpro.com');
	//echo('Connected!');
	
	 if ($thumb != "") {
       	// Separate our comma separated list $thumb into an array
        $thumbnaildata = explode(",", $thumb);
	}	
	
	# When your application is live, it is a good idea to enable caching.
	# You need to provide a string specific to this page and a time limit 
	# for the cache. Note that in most cases, Director will be able to ping
	# back to clear the cache for you after a change is made, so don't be 
	# afraid to set the time limit to a high number.
	$director->cache->set('10122010', '+60 minutes');
	
	# We can also request the album preview at a certain size
	#$director->format->preview(array('width' => "0", 'height' => '0', 'crop' => 0, 'quality' => 85, 'sharpening' => 1));
	$artlicleBig = array('name' => 'artlicleBig', 'width' => "610", 'height' => '384', 'crop' => 1, 'quality' => 80, 'sharpening' => 1);
	$artlicleMed = array('name' => 'artlicleMed', 'width' => "282", 'height' => '178', 'crop' => 1, 'quality' => 80, 'sharpening' => 1);
	$artlicleSm = array('name' => 'artlicleSm', 'width' => "150", 'height' => '150', 'crop' => 1, 'quality' => 80, 'sharpening' => 1);
	$artlicleTh = array('name' => 'artlicleTh', 'width' => "150", 'height' => '150', 'crop' => 1, 'quality' => 80, 'sharpening' => 1);
	$homeSlider = array('name' => 'homeSlider', 'width' => "960", 'height' => '400', 'crop' => 1, 'quality' => 95, 'sharpening' => 1);
	$director->format->add($artlicleBig);
	$director->format->add($artlicleMed);
	$director->format->add($artlicleSm);
	$director->format->add($artlicleTh);
	$director->format->add($homeSlider);
    /*-----------End Director Setup -----------------------------*/	 

	// Check to see if user wanted to use a specific image or if we should use the first one as a default
	$x = $thumbnaildata[1] -1;
	if ($x == -1) {
		$x = 0;
	}

    $album = $director->album->get($thumbnaildata[0]);
	$caption = $album->contents->content[$x]->caption;
	$album_name = $album->name;
	
	/*my array of formats*/
	$imginfo = Array (
		'articleBig_url' => $album->contents->content[$x]->artlicleBig->url ."\" width=\"" . $album->contents->content[$x]->artlicleBig->width . "\" height=\"" . $album->contents->content[$x]->artlicleBig->height . "\" alt=\"" . $album_name . "\" /><div class=\"wp-caption\" style=\"margin-right:4px;width:610px;\"><p class=\"wp-caption-text\">".$caption."</p></div>",
		'articleMed_url' =>  $album->contents->content[$x]->artlicleMed->url ."\" width=\"" . $album->contents->content[$x]->artlicleMed->width . "\" height=\"" . $album->contents->content[$x]->artlicleMed->height . "\" alt=\"" . $album_name . "\" /><div class=\"wp-caption\" style=\"margin-right:4px;width:282px;\"><p class=\"wp-caption-text\">".$caption."</p></div>",
		'articleSm_url' =>  $album->contents->content[$x]->artlicleSm->url ."\" width=\"" . $album->contents->content[$x]->artlicleSm->width . "\" height=\"" . $album->contents->content[$x]->artlicleSm->height . "\" alt=\"" . $album_name . "\" />",
		'articleTh_url' =>  $album->contents->content[$x]->artlicleTh->url ."\" width=\"" . $album->contents->content[$x]->artlicleTh->width . "\" height=\"" . $album->contents->content[$x]->artlicleTh->height . "\" alt=\"" . $album_name . "\" />",
		'homeSlider_url' =>  $album->contents->content[$x]->homeSlider->url );
    return $imginfo;
}

add_action('wp_print_scripts', 'enqueueMyScripts');
function enqueueMyScripts(){
if ( is_singular() ) {
	wp_enqueue_script('galleriffic', THEME_JS .'jquery.galleriffic.js', array('jquery'));
	wp_enqueue_script('history', THEME_JS .'jquery.history.js', array('jquery'));
	wp_enqueue_script('opaicty', THEME_JS .'jquery.opacityrollover.js', array('jquery'));
	wp_enqueue_script('gallerifficinit', THEME_JS .'init_slideshow.js', array('galleriffic'), '', true);
	}

}

// comma seperated category list for ad tags
function deeez_cats($category){
$comma_holder = "";
$cat_string = "";
	foreach ($category as $categorysingle) {
	$cat_string .= $comma_holder . '"' . $categorysingle->name . '"';
	$comma_holder = ",";
	}
	return $cat_string;
}

// comma seperated category list for omniture tags
function deeez_cats2($category){
$space_holder = "";
$cat_string = "";
	foreach ($category as $categorysingle) {
	$cat_string .= $space_holder . $categorysingle->name;
	$space_holder = "_";
	}
	return $cat_string;
}

function getCatVal($num){
    $temp=get_the_category();
    $count=count($temp);// Getting the total number of categories the post is filed in.
    for($i=0;$i<$num&&$i<$count;$i++){
        //Formatting our output.
        $cat_string.=$temp[$i]->cat_name;
        if($i!=$num-1&&$i+1<$count)
        //Adding a ',' if it's not the last category.
        //You can add your own separator here.
        $cat_string.=', ';
    }
    echo $cat_string;
}

// Select an image, if possible -- or default to Reverb logo, to display in the Open Graph tag in the header +++ added by Dan Schneider, 1/2013
function get_representative_images() {
    global $post;
    $images = array('http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/images/logo.png');
    if ( has_post_thumbnail($post->ID) ) { // check if the post has a Post Thumbnail assigned to it.
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
        array_unshift($images, $image_url[0]);
    }
    return $images;
}

// Add MRSS content for images to RSS feed
function flipboard_namespace() {
    echo 'xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:georss="http://www.georss.org/georss"';
}
add_filter( 'rss2_ns', 'flipboard_namespace' );

function flipboard_attached_images() {
    global $post;
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => -1,
        'post_parent' => $post->ID
    ) );
    if ( $attachments ) {
        foreach ( $attachments as $att ) {
            $img_attr = wp_get_attachment_image_src( $att->ID, 'full' );
            ?>
            <media:content url="<?php echo $img_attr[0]; ?>" width="<?php echo $img_attr[1]; ?>" height="<?php echo $img_attr[2]; ?>" medium="image" type="<?php echo $att->post_mime_type; ?>">
                <media:title type="plain"><![CDATA[<?php echo html_entity_decode( $att->post_title ); ?>]]></media:title>
                <media:copyright>The Denver Post</media:copyright>
                <media:description type="plain"><![CDATA[<?php echo $att->post_excerpt; ?>]]></media:description>
            </media:content>
            <media:thumbnail url="<?php echo $img_attr[0]; ?>" width="<?php echo $img_attr[1]; ?>" height="<?php echo $img_attr[2]; ?>" />
            <?php
        }
    }
}
add_filter( 'rss2_item', 'flipboard_attached_images' );

function override_curly_quotes($content) {
    global $post;
    if (is_feed()) {
        remove_filter( 'the_content', 'wptexturize' );
        remove_filter( 'the_excerpt', 'wptexturize' );
        remove_filter( 'the_title', 'wptexturize' );
        return $content;
    } else {
        return $content;
    }
}
add_filter('the_content', 'override_curly_quotes', 7);
add_filter('the_excerpt', 'override_curly_quotes', 7);
add_filter('the_title', 'override_curly_quotes', 7);

function dublin_core_adds() {
    ?>
        <dc:publisher><![CDATA[ <?php echo get_bloginfo('name'); ?> ]]></dc:publisher>
        <dc:source><![CDATA[ <?php echo site_url(); ?> ]]></dc:source>
    <?php
}
add_filter('rss2_item','dublin_core_adds');

function add_post_featured_image_as_rss_item_enclosure() {
	if ( ! has_post_thumbnail() )
		return;

	//$thumbnail_size = apply_filters( 'rss_enclosure_image_size', 'large' );
	$thumbnail_id = get_post_thumbnail_id( $post->ID );
	//$thumbnail = image_get_intermediate_size( $thumbnail_id, 'large' );
	$filesize = filesize( get_attached_file( $thumbnail_id ) );
	echo $filesize;
	$thumbnail = wp_get_attachment_url($thumbnail_id, 'full', false, '');

	if ( empty( $thumbnail ) )
		return;

	$upload_dir = wp_upload_dir();

	printf( 
		'<enclosure url="%s" length="%s" type="%s" />',
		//$thumbnail['url'],
		$thumbnail,
		filesize( $filesize ),
		//filesize( path_join( $upload_dir['basedir'], $thumbnail['path'] ) ), 
		get_post_mime_type( $thumbnail_id ) 
	);
}
add_action( 'rss2_item', 'add_post_featured_image_as_rss_item_enclosure' );

// add a full-text RSS feed as an option
function full_feed() {
	add_filter('pre_option_rss_use_excerpt', '__return_zero');
	load_template( ABSPATH . WPINC . '/feed-rss2.php' );
}
add_feed('full', 'full_feed');

// allow script tags in editor
function allow_script_tags( $allowedposttags ){
  $allowedposttags['script'] = array(
      'src' => true,
      'height' => true,
      'width' => true,
    );
  return $allowedposttags;
}
add_filter('wp_kses_allowed_html','allow_script_tags', 1);

?>