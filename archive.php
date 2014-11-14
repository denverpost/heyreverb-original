<?php include (TEMPLATEPATH.'/tools/get-theme-options.php'); ?>
<?php get_header(); ?>
<div id="contentWrapper">
<div id="content">
  <?php is_tag(); ?>
  <?php if (have_posts()) : ?>
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <h2 class="pagetitle"><?printf( __('%s','spiegelmagazine'), single_cat_title('', false)); ?></h2>
  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
  <h2 class="pagetitle">
    <?php _e('Posts Tagged','spiegelmagazine'); ?>
    &#8216;
    <?php single_tag_title(); ?>
    &#8217;</h2>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <h2 class="pagetitle"><?printf( __('Archive for %s','spiegelmagazine'), get_the_time(__('F jS, Y','spiegelmagazine'))); ?></h2>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <h2 class="pagetitle"><?printf( __('Archive for %s','spiegelmagazine'), get_the_time(__('F Y','spiegelmagazine'))); ?></h2>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <h2 class="pagetitle"><?printf( __('Archive for %s','spiegelmagazine'), get_the_time('Y')); ?></h2>
  <?php /* If this is a search */ } elseif (is_search()) { ?>
  <h2 class="pagetitle">
    <?php _e('Search Results','spiegelmagazine'); ?>
  </h2>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <h2 class="pagetitle">
    <?php _e('All entries by this author','spiegelmagazine'); ?>
  </h2>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2 class="pagetitle">
      <?php _e('Blog Archives','spiegelmagazine'); ?>
    </h2>
    <?php } ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
    <h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','spiegelmagazine');?> <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h4>
    <small class="commentmetadata">
    <?php _e('By','spiegelmagazine');?>
    <?php if(function_exists('coauthors_posts_links'))
    coauthors_posts_links();
else
    the_author_posts_link(); ?>
    |
    <?php the_time(__('F jS, Y', 'spiegelmagazine'));?>
    |
    <?php comments_popup_link(__('No Comments &#187;', 'spiegelmagazine'), __('1 Comment &#187;', 'spiegelmagazine'), __ngettext ('% comment', '% comments', get_comments_number (),'spiegelmagazine')); ?>
    <?php edit_post_link('Edit', ' | ', ' | '); ?>
    </small>
	<div id="archivePage">
    <div class="entry">
		<?php 
		$thumb = get_post_meta($post->ID, 'article_image', true);
		if(!empty($thumb)) { 
			$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_markup['articleTh_url'];?></a>
		<?php }
		else {
			if ( function_exists( 'get_the_image' ) ) { get_the_image( array( 'image_scan' => true, 'width' => '150', 'height' => '150') ); }
		} ?>
		<?php the_excerpt() ?>
      <div class="clearfloat"></div>
    </div>
	</div>
    <hr />
    <br />
  </div>
  <?php endwhile; ?>
  <ul id="paging">
  <li class="prev">
    <?php previous_posts_link(__('Previous entries','spiegelmagazine')) ?>
  </li>

  <?php if (function_exists('the_paging_bar')) { ?>
    <li class="pages">
      <?php the_paging_bar() ?>
    </li>
  <?php } ?>

  <li class="next">
    <?php next_posts_link(__('Next entries','spiegelmagazine')) ?>
  </li>
</ul>
  <?php else : ?>
  <h2 class="center">
    <?php _e('Not Found','spiegelmagazine') ?>
  </h2>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
