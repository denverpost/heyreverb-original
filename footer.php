<div id="footer">
   <div id="footerContent">
	    <br /><br />

<!-- Segment Pixel - Reverb - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=125026&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->  
    
<a href="http://www.denverpost.com/" target="_blank"><img src="<?php bloginfo('siteurl'); ?>/wp-content/blogs.dir/4/files/2010/10/DPlogoCombo1.gif" alt="The Denver Post" border="0" align="left" /></a>
    
	&nbsp;&nbsp;All contents Copyright <?php echo date('Y'); ?> <a href="http://www.denverpost.com" target="_blank">The Denver Post</a> or other copyright holders.<br />
	&nbsp;&nbsp;All rights reserved. This material may not be published, broadcast, rewritten or redistributed for any commercial purpose.
    <br /><br />
	<a href="http://www.denverpost.com/ethics" target="_blank">Denver Post Ethics Policy</a>  |  <a href="http://www.denverpost.com/termsofuse" target="_blank">Terms of Use</a>  |  <a href="http://www.denverpost.com/termsofuse" target="_blank">Privacy Policy</a>  
	<br /><br />
	<img src="<?php bloginfo('siteurl'); ?>/wp-content/themes/spiegelmagazine-pro/images/MNG_Logo.gif" alt="" border="0" />
	<br /><br />
	<a href="http://mediakit.denverpost.com/" target="_blank">Advertise</a>  |  <a href="http://www.denverpost.com/archives" target="_blank">Archives</a>  |  <a href="http://www.denverpost.com/contactus" target="_blank">Contact Us</a>  |  <a href="http://m.denverpost.com" target="_blank">Mobile</a>  |  <a href="http://www.denverpost.com/webfeeds" target="_blank">Feeds</a>  |  <a href="http://us.rd.yahoo.com/my/atm/DenverPost/News%20Breaking/*http://add.my.yahoo.com/rss?url=http%3A//http://feeds.denverpost.com/dp-news-breaking-local" target="_blank">My Yahoo</a>  |  <a href="http://www.denverpost.com/photostore" target="_blank">Buy Denver Post Photos</a>  |  <a href="http://www.denverpost.com/sitemap" target="_blank">Site Map</a>  |  <a href="http://www.denverpost.com/subscribe" target="_blank">Home Delivery</a>  |  <a href="http://www.denverpost.com/viva" target="_blank">Viva</a>
	</div>
</div>
</div>
<?php //if ( is_singular() ) {?>
<!-- <script type='text/javascript' src='http://www.heyreverb.com/wp-content/themes/spiegelmagazine-pro/js/init_slideshow.js?ver=2.9.2'></script> -->
<?php // } ?>
<script type="text/javascript">
document.write(unescape("%3Cscript src='" + (("https:" == document.location.protocol) ? "https://s.btstatic.com" : "http://t.btstatic.com") + "/tag.js' type='text/javascript'%3E%3C/script%3E"))
</script>

<script type="text/javascript">
_bt_site="8347458";
btServe();
</script>
<noscript>
<iframe src="https://s.thebrighttag.com/iframe?c=8347458" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

<?php $GLOBALS['dfmcat'] = '';
if ( is_category() ) {
    $category = get_the_category();
    $GLOBALS['dfmcat'][0] = $category[0]->cat_name;
} else if ( is_single() ) {
    $post_terms = wp_get_object_terms( $post->ID, 'category', array( 'fields' => 'ids' ) );
    $separator = ', ';
    $term_ids = implode( ',' , $post_terms );
    $category = get_categories(array('hierarchical'=>true,'taxonomy'=>'category','order'=>'desc','number'=>1,'include'=>$term_ids));
    $GLOBALS['dfmcat'][0] = ( ( $category[0]->category_parent != ( '' || null) ) ? get_cat_name($category[0]->category_parent) : $category[0]->cat_name );
    $GLOBALS['dfmcat'][1] = ( ( $category[0]->category_parent != ( '' || null) ) ? $category[0]->cat_name : '');
    $GLOBALS['dfmid'] = $post->ID;
    $GLOBALS['dfmby'] = get_the_author_meta('display_name', $post->post_author);
} else if ( is_tag() ) {
    $GLOBALS['dfmcat'][0] = single_tag_title( '', false );
} else if ( is_home() ) {
    $GLOBALS['dfmcat'][0] = 'Home';
} else if ( is_page() ) {
    $GLOBALS['dfmcat'][0] = get_the_title();
}
?>

<script type='text/javascript'>
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.title = "<?php echo addslashes(html_entity_decode(wp_title('', false), ENT_QUOTES, 'UTF-8') ); ?>";
    _sf_async_config.uid = 2671;
    _sf_async_config.domain = 'heyreverb.com';
    _sf_async_config.useCanonical = true;
    _sf_async_config.sections = "<?php echo $GLOBALS['dfmcat'][0]; ?>";
    _sf_async_config.authors = "<?php echo (isset($GLOBALS['dfmby']) ? $GLOBALS['dfmby'] : ''); ?>";
    /** CONFIGURATION END **/
    (function(){
      function loadChartbeat() {
        window._sf_endpt=(new Date()).getTime();
        var e = document.createElement('script');
        e.setAttribute('language', 'javascript');
        e.setAttribute('type', 'text/javascript');
        e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
        document.body.appendChild(e);
      }
      var oldonload = window.onload;
      window.onload = (typeof window.onload != 'function') ?
         loadChartbeat : function() { oldonload(); loadChartbeat(); };
    })();
</script>

<script src="http://stats.wordpress.com/e-201120.js" type="text/javascript"></script>
<?php wp_footer(); ?>
</body></html>
