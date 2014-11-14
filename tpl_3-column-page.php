<?php
/*
Template Name: 3-Column-Page
*/
?>
<?php include (TEMPLATEPATH.'/tools/get-theme-options.php'); ?>
<?php get_header(); ?>
<div id="pageleft"> 
  <?php 
   $three_col_query_left = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_left')).'&showposts='.$prinz_3col_leftnum); ?>
  <?php while ($three_col_query_left->have_posts()) : $three_col_query_left->the_post(); ?>
  <h3> 
    <?php 
	wp_list_categories('include='.get_cat_id(get_option('prinz_3col_left')).'&title_li=&style=none'); ?>
  </h3>
  <?php // here the thumbnail image gets automatically generated fron the posts own image gallery ?>
  <?php postimage(282,159); ?>
  <div class="clearfix"></div>
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','spiegelmagazine')?> <?php the_title(); ?>" class="title"> 
    <?php 
	the_title(); ?>
    </a></h2>
  <?php 
	the_excerpt() ; ?>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('3-Col Page Left') ) : ?>
  <strong> <br />
  <?php _e('More from this category','spiegelmagazine');?>
  <br />
  <br />
  </strong> 
  <?php 
// this is where the last three headlines are pulled from the category	   
   $three_col_headings_query_left = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_left')).'&showposts=3&offset=1'); ?>
  <ul class="recent">
    <?php while ($three_col_headings_query_left->have_posts()) : $three_col_headings_query_left->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"> 
      <?php the_title(); ?>
      </a></li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</div>
<!-- END LEFT COLUMN -->
<div id="pagemiddle"> 
  <?php 
   $three_col_query_middle = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_middle')).'&showposts='.$prinz_3col_middlenum); ?>
  <?php while ($three_col_query_middle->have_posts()) : $three_col_query_middle->the_post(); ?>
  <h3> 
    <?php 
	wp_list_categories('include='.get_cat_id(get_option('prinz_3col_middle')).'&title_li=&style=none'); ?>
  </h3>
  <?php // here the thumbnail image gets automatically generated fron the posts own image gallery ?>
  <?php postimage(282,159); ?>
  <div class="clearfix"></div>
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','spiegelmagazine')?> <?php the_title(); ?>" class="title"> 
    <?php 
	the_title(); ?>
    </a></h2>
  <?php 
	the_excerpt() ; ?>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('3-Col Page Middle') ) : ?>
  <strong> <br />
  <?php _e('More from this category','spiegelmagazine');?>
  <br />
  <br />
  </strong> 
  <?php 
// this is where the last three headlines are pulled from the category	   
   $three_col_headings_query_middle = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_middle')).'&showposts=3&offset=1'); ?>
  <ul class="recent">
    <?php while ($three_col_headings_query_middle->have_posts()) : $three_col_headings_query_middle->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"> 
      <?php the_title(); ?>
      </a></li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</div>
<!-- END MIDDLE COLUMN -->
<div id="pageright"> 
  <?php 
   $three_col_query_right = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_right')).'&showposts='.$prinz_3col_rightnum); ?>
  <?php while ($three_col_query_right->have_posts()) : $three_col_query_right->the_post(); ?>
  <h3> 
    <?php 
	wp_list_categories('include='.get_cat_id(get_option('prinz_3col_right')).'&title_li=&style=none'); ?>
  </h3>
  <?php // here the thumbnail image gets automatically generated fron the posts own image gallery ?>
  <?php postimage(282,159); ?>
  <div class="clearfix"></div>
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','spiegelmagazine')?> <?php the_title(); ?>" class="title"> 
    <?php 
	the_title(); ?>
    </a></h2>
  <?php 
	the_excerpt() ; ?>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('3-Col Page Right') ) : ?>
  <strong> <br />
  <?php _e('More from this category','spiegelmagazine');?>
  <br />
  <br />
  </strong> 
  <?php 
// this is where the last three headlines are pulled from the category	   
   $three_col_headings_query_right = new WP_Query('cat='.get_cat_id(get_option('prinz_3col_right')).'&showposts=3&offset=1'); ?>
  <ul class="recent">
    <?php while ($three_col_headings_query_right->have_posts()) : $three_col_headings_query_right->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"> 
      <?php the_title(); ?>
      </a></li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</div>
<!-- END RIGHT COLUMN -->
<?php get_footer(); ?>
