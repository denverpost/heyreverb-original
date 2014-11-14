<?php load_theme_textdomain ('spiegelmagazine', TEMPLATEPATH . '/languages'); ?>
<?php include (TEMPLATEPATH.'/tools/get-theme-options.php'); 
//check for correct WP version  
global $wp_version;
if ( !version_compare( $wp_version, '3.0-beta', '>=' ) ) {
    wp_die( 'This Theme needs at least WordPress 3.0. Please update your Wordpress installation.', 'Update WordPress!');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="http://extras.denverpost.com/media/images/reverb/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://extras.denverpost.com/media/images/reverb/favicon.ico" type="image/x-icon">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
if ( is_home() )
echo '<meta name="google-site-verification" content="BAv9uNw3dhMYaNIv3FHd48tjveabTCODpYFbMsh1GsU" />'
?>

<?php
//twitter cards hack
if(is_single() || is_page()) {
  $twitter_url    = get_permalink();
  $twitter_desc   = htmlentities(get_the_excerpt());
  $twitter_title  = get_the_title();
  $twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), large);
    $twitter_thumb  = $twitter_thumbs[0];
  if(!$twitter_thumb) {
    $twitter_thumb = 'http://local.denverpost.com/common/dfm/assets/logos/small/denverpost.png';
  }
  $temp_post = get_post($post_id);
    $twitter_user_id = $temp_post->post_author;
?>
<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
<meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
<meta name="twitter:description" value="<?php echo $twitter_desc; ?>" />
<meta name="twitter:image" value="<?php echo $twitter_thumb; ?>" />
<meta name="twitter:site" value="@rvrb" />
<meta name="twitter:domain" value="heyreverb.com" />
<meta name="twitter:creator" content="@<?php the_author_meta("jabber",$twitter_user_id); ?>">
<?
}
?>
<meta name="twitter:app:name:iphone" value="Denver Post">
<meta name="twitter:app:name:ipad" value="Denver Post">
<meta name="twitter:app:name:googleplay" value="The Denver Post">
<meta name="twitter:app:id:iphone" value="id375264133">
<meta name="twitter:app:id:ipad" value="id409389010">
<meta name="twitter:app:id:googleplay" value="com.ap.denverpost" />

<meta property="fb:app_id" content="105517551922"/>
<meta property="og:title" content="<?php if ( is_single() ) { wp_title(); } else { bloginfo('name'); } ?>" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="<?php echo get_permalink() ?>" />
<meta property="og:image" content="<?php echo $twitter_thumb; ?>" />
<meta property="og:site_name" content="<?php bloginfo('name') ?>" />
<meta property="og:description" content="<?php echo $twitter_desc; ?>" />
<meta property="article:publisher" content="http://www.facebook.com/heyreverb" />
<!--<meta property="article:author" content="" />-->

<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,700,400italic,700italic|PT+Sans:400,700,400italic,700italic|PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>

<meta name="news_keywords" content="<?php
$posttags = get_the_tags();
    foreach((array)$posttags as $tag) {
        $show_tags .= $tag->name . ',';
    }{
$rel_art .= rtrim($show_tags , ',');{
}
print $rel_art;
}
?>" />

<?php 
$category = get_the_category();  //get the post category 
    
$alldeeezcats = deeez_cats($category); // category list comma separated in quotes for ad tags
//echo $alldeeezcats;
$alldeeezcats2 = deeez_cats2($category); // category list for omniture
//echo $alldeeezcats2;

//Load in omniture for gallery only
if ( is_singular() ) {
$thepagecat = strtolower(str_replace(' ', '_',$alldeeezcats2));
//echo $thepagecat;
$thepagetitle = trim(wp_title('', false));
include (TEMPLATEPATH . '/tracking/omnituresingle.php');
} 

echo '  <title>';
if ( is_home() ) {
  // Blog's Home
  echo get_bloginfo('name') . '  &raquo; '; bloginfo('description') ; 
} elseif ( is_single() or is_page() ) {
  // Single blog post or page
  wp_title(''); echo ' - ' . get_bloginfo('name');
} elseif ( is_category() ) {
  // Archive: Category
  echo get_bloginfo('name') . ' &raquo;  '; single_cat_title();
} elseif ( is_day() ) {
  // Archive: By day
  echo get_bloginfo('name') . ' &raquo; ' . get_the_time('d') . '. ' . get_the_time('F') . ' ' . get_the_time('Y');
} elseif ( is_month() ) {
  // Archive: By month
  echo get_bloginfo('name') . ' &raquo; ' . get_the_time('F') . ' ' . get_the_time('Y');
} elseif ( is_year() ) {
  // Archive: By year
  echo get_bloginfo('name') . ' &raquo; ' . get_the_time('Y');
} elseif ( is_search() ) {
  // Search
  echo get_bloginfo('name') . ' &raquo; &lsaquo;' . wp_specialchars($s, 1) . '&rsaquo;';
} elseif ( is_404() ) {
  // 404
  echo get_bloginfo('name') . '  &raquo; 404 - ERROR';
} else {
  // Everything else. Fallback
  bloginfo('name'); wp_title();
}
echo '</title>';
?>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/nav.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/plugins.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/template-style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/print.css" type="text/css" media="print" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/galleriffic-3.css" type="text/css" /> 
<!-- leave this for stats -->
<?php wp_head(); ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lte IE 6.5]>
  <link href="http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/styles/ie6.css" type="text/css" rel="stylesheet" />
<![endif]-->
<!--[if IE 7]>
  <link href="http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/styles/ie7.css" type="text/css" rel="stylesheet" />
<![endif]-->
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<![endif]-->
<!--[if IE 8]>
  <link href="http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/styles/ie8.css" type="text/css" rel="stylesheet" />
<![endif]-->
<link rel="stylesheet" media="only screen and (max-device-width: 1024px)" href="http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/styles/ipad.css" type="text/css" />

<script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>

</head>
<body <?php body_class(); ?>>

<div id="omniture" style="display:none;">
<script language="JavaScript" type="text/javascript">
    var s_account = "denverpost"

    //reverb test tracking algorithm
    <?php if ( is_home() ) { 
    ?>var isHome = true; //testing wp functions <?php
    } else { ?>var isHome = false; //testing wp functions <?php } 
    ?>

    <?php if ( is_category() ) { 
  ?>var isCategory = true; //testing wp functions <?php
  } else { ?>var isCategory = false; //testing wp functions <?php } 
  ?>

    <?php if ( is_singular() ) { 
  ?>var isSingle = true; //testing wp functions <?php
  } else { ?>var isSingle = false; //testing wp functions <?php } 
  ?>

    <?php if ( is_page() ) { 
  ?>var isPage = true; //testing wp functions <?php
  } else { ?>var isPage = false; //testing wp functions <?php } 
  ?>

    var singleCategory = "<?php single_cat_title(); ?>"; //article site section
    var pgTitle = "<?php the_title(); ?>"; //testing wp functions
    var oChnm = "Reverb";
    var Pgnm = "";
    var oSp2nm = "";
    var oSp3nm = "";
    var oSp4nm = "";
    if (isHome) {
        oSp2nm = "Reverb Home"; //is reverb home
        Pgnm = "Reverb Home";
    } else {
        if (isCategory) {
            if (singleCategory) {
                Pgnm = "Reverb " + singleCategory; //section name available
                oSp2nm = singleCategory;
            } else {
                Pgnm = "Reverb cat undefined"; //cannot be defined
                oSp2nm = "cat undefined";
            }
        } else {
            if (isSingle) {
                if (isPage) {
                    Pgnm = "Reverb " + pgTitle; //is a static page
                    oSp2nm = pgTitle;
                } else {
                    Pgnm = "Reverb Post: " + pgTitle; //is a post
                    oSp2nm = "Posts";
                    oSp4nm = pgTitle;
                }
            }
        }
    }
    if (oSp2nm == '') {
        oSp2nm = "?";
    }
    if (oSp3nm == '') {
        oSp3nm = "?";
    }
    if (oSp4nm == '') {
        oSp4nm = "?";
    }
    if (Pgnm == '') {
        Pgnm = "D=g";
    }
    var oBrdcm2 = oChnm + "/" + oSp2nm; //Prop2
    var oBrdcm3 = oChnm + "/" + oSp2nm + "/" + oSp3nm; //Prop3
    var oBrdcm4 = oChnm + "/" + oSp2nm + "/" + oSp3nm + "/?"; //Prop4
    var oBrdcm5 = oChnm + "/" + oSp2nm + "/" + oSp3nm + "/?/" + oSp4nm; //Prop5
</script>
    <!-- SiteCatalyst code version: H.17. Copyright 1997-2005 Omniture, Inc. More info available at http://www.omniture.com -->
    <script language="JavaScript" type ="text/javascript" src="http://extras.mnginteractive.com/live/js/omniture/SiteCatalystCode_H_17.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://extras.mnginteractive.com/live/js/omniture/OmnitureHelper.js"></script>
    <script language="JavaScript" type="text/javascript">
        s.pageName = Pgnm;
        s.channel = oChnm;
        s.prop1 = "D=g";
        s.prop2 = oBrdcm2;
        s.prop3 = oBrdcm3;
        s.prop4 = oBrdcm4;
        s.prop5 = oBrdcm5;
        s.prop9 = getCiQueryString("SOURCE");
        s.eVar2 = getCiQueryString("SOURCE");
        s.campaign = getCiQueryString("EADID") + getCiQueryString("CREF");
        s.events = "event1";
        s.eVar4 = s.pageName;
        /************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
        var s_code = s.t(); if (s_code) document.write(s_code)
    </script>
    <script language="JavaScript" type="text/javascript">
        if (navigator.appVersion.indexOf('MSIE') >= 0) document.write(unescape('%3C') + '\!-' + '-');
    </script>
    <noscript>
        <img src="http://denverpost.112.2O7.net/b/ss/denverpost/1/H.17--NS/0" height="1" width="1" border="0" alt="" />
    </noscript>
    <!-- End SiteCatalyst code version: H.17. -->
</div>

<div id="page" class="clearfloat">
<iframe src="http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/tracking/reverb728x90.html" height="90px" width="100%" frameborder="0" scrolling="no" id="adPos14_iframe" class="adElement"></iframe>
<div class="clearfloat">
  <div id="logo" class="left" onclick="location.href='<?php echo get_settings('home'); ?>';" style="cursor: pointer;">
    <? if ($prinz_nologo == "false") { ?>
    <img style="border:none;background:none;outline:none;" src="<?php header_image(); ?>" width="371" height="80" alt="Logo" border="none" />
    <?php } else { ?>
    <div class="blogtitle" ><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></div>
    <div class="description">
      <?php bloginfo('description'); ?>
    </div>
    <?php } ?>
  </div>
  <div id="social" class="left">
  <div id="soc_btn_1" class="soc_btn"><a href="/reverb/contact-us/" title="Contact Us"><span>contact</span></a></div>
  <div id="soc_btn_2" class="soc_btn"><a href="http://www.facebook.com/heyreverb" target="_blank" title="Follow us on Facebook"><span>facebook</span></a></div>
  <div id="soc_btn_3" class="soc_btn"><a href="http://www.twitter.com/rvrb" target="_blank" title="Follow us on Twitter"><span>twitter</span></a></div>
  <div id="soc_btn_4" class="soc_btn"><a href="http://www.foursquare.com/user/rvrb" target="_blank" title="Follow us on Foursquare"><span>foursquare</span></a></div>
  <div id="soc_btn_5" class="soc_btn"><a href="http://feeds.denverpost.com/dp-entertainment-reverb" target="_blank" title="View our RSS Feed"><span>rss</span></a></div>
  </div>
  <div class="right">
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </div>
</div>
  <? if ($prinz_pagemenuon == "false") { // the horizontal page menu ?>
  <ul id="nav" class="clearfloat">
    <li><a href="<?php echo get_option('home'); ?>/" class="on">Home</a></li>
    <?php wp_list_pages("exclude=$prinz_menuepages;&title_li="); ?>
  </ul>
  <?php } ?>
  <? if ($prinz_catmenuon == "false") { // the horizontal categories menu ?>
  <ul id="catnav" class="clearfloat">
    <?php wp_list_categories("exclude=$prinz_menuecats;&title_li="); ?>
  </ul>
  <?php } ?>
  <? if ($prinz_wpmenuon == "true") { //the horizontal custom Wordpress menu (WP 3.0 or higher required) ?>
  <?php shailan_dropdown_menu(); ?>
  <div id="pencilTop" class="clearfloat"></div>
  <div class="adElement clearfloat" id="adPosition1" align="center" style="clear:both;">
    <!-- begin DFP Premium Ad Tag -->
      <script type='text/javascript'>
        (function() {
          var useSSL = 'https:' == document.location.protocol;
          var src = (useSSL ? 'https:' : 'http:') +
          '//www.googletagservices.com/tag/js/gpt.js';
          document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
        })();
      </script>
      <div id='sbb_reverb'>
        <script type='text/javascript'>
          googletag.defineSlot('/8013/denverpost.com/Entertainment', [970,30], 'sbb_reverb').setTargeting('pos',['sbb']).setTargeting('kv', 'reverb').addService(googletag.pubads());
          googletag.pubads().enableSyncRendering();
          googletag.enableServices();
          googletag.display('sbb_reverb');
        </script>
      </div>
      <!-- end DFP Premium Ad Tag -->
  </div>
  <div id="pencilBottom" class="clearfloat"></div>
<?php } ?>
