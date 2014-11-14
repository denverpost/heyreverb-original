<div id="sidebar">
  <div id="sidelist">
    <?php 	/* Widgetized sidebar. If you use widgets the default stuff will be replaced */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Regular Sidebar') ) : ?>

    <?php // "More from this category" - This is where 5 headlines from the current category get printed	  
	if (is_single()) {
global $post;
$categories = get_the_category();
foreach ($categories as $category) :
?>
    <h3>
      <?php _e('More from','spiegelmagazine');?>
      <?php echo $category->name; ?> </h3>
    <ul class="more">
      <?php
$posts = get_posts('numberposts=5&category='. $category->term_id);
foreach($posts as $post) :
?>
      <li><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></li>
      <?php endforeach; ?>
    </ul>
    <?php endforeach;?>
    <?php } 
		
		// End "More from this category" ?>
      

    <!-- WP standard tag cloud -->
    <?php if ( function_exists('wp_tag_cloud') ) : ?>
    <h3>Popular Tags</h3>
    <?php wp_tag_cloud('smallest=8&largest=22'); ?>
    <?php endif; ?>
    <!-- END OF TAG CLOUD -->
    
    <!-- RSS Feeds -->
    <h3>
      <?php _e('Stay informed','spiegelmagazine');?>
    </h3>
    <ul class="feed">
      <li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
      <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS)</a></li>
    </ul>
    <!-- END OF RSS -->
    
    <?php //endif; ?>



    <!-- Recent Posts -->
    <h3>
      <?php _e('Recent Posts','spiegelmagazine');?>
    </h3>
    <ul class="recent">
      <?php wp_get_archives('type=postbypost&limit=15'); ?>
    </ul>
    <!-- END OF RECENT POSTS -->

    <!-- POLL OF THE WEEK -->
<!--
    <h3>
      <?php _e('Poll of the Week','spiegelmagazine');?>
    </h3>
    <ul class="recent">
      [Category number='1' method='excerpt' order='asc' id='8766' orderby='date']
    </ul>
-->
    <!-- END OF POLL OF THE WEEK -->

    <!-- AV CLUB -->
    <h3>
      <?php _e('A.V. Club Denver/Boulder','spiegelmagazine');?>
    </h3>

    <ul class="recent">
    <script type="text/javascript" src="http://extras.denverpost.com/cache/onion_denver.js"></script>
    </ul>
    <!-- END AV CLUB -->
    <?php endif; ?>

  </div>
  <!--END SIDELIST-->
</div>
<!--END SIDEBAR-->



