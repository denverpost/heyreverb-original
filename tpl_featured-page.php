<?php
/*
Template Name: Featured Page
*/
?>
<?php get_header(); ?>
<div id="featured-page">

<div id="featured-top">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="featured-leftcol"><?php postimage(320,180); ?>

  <h2>
    <?php $values = get_post_custom_values("featuredpageheadline"); echo $values[0]; ?>
  </h2>
  <span id="featured-text">
  <?php $values = get_post_custom_values("featuredpagetext"); echo $values[0]; ?>
  </span> </div>
  
<div id="featured-rightcol">
  <div id="home_middle_widget">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured Page Topright') ) : ?>      

  <h3><?php _e('Recent Posts','spiegelmagazine');?></h3>
  <div id="featured-recent">
    <ul class="recent">
      <?php wp_get_archives('type=postbypost&limit=5'); ?>
    </ul>
  </div>
  	<?php endif; ?>
</div>
</div>
</div>
<div id="featured-content">
  
  <div class="featured_post" id="post-<?php the_ID(); ?>">
    <h2>
      <?php the_title(); ?>
    </h2>
    
    <div class="entry">
      <?php the_content("<p class=\"serif\">" . __('Read the rest of this page', 'spiegelmagazine') ." &raquo;</p>"); ?>
	  <?php wp_link_pages("<p><strong>" . __('Pages', 'spiegelmagazine') . ":</strong>", '</p>', __('number','spiegelmagazine')); ?>
    </div>
    
  </div>
  
  <?php endwhile; endif; ?>
  
  <?php edit_post_link('Edit', '<p>', '</p>'); ?>
  
</div>

<div id="featured-sidebar">

    <?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Featured Page Textwidgets') ) : ?>
                    
    <h3><?php _e('Textwidgets','spiegelmagazine');?></h3>
    <p>This is another widgetized area. You can use Textwidgets here to describe some things but you can use any other type of Widget here as well.</p>
    <?php endif; ?>

</div>
</div>
<?php get_footer(); ?>
