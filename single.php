<?php get_header(); ?>
<?php // ignore post from related posts in sidebar
	prinz_ignorePost($post->ID); ?>
<div id="contentWrapper">
<div id="content">
  <!-- <div id="catHeader">
	<div id="catTitle"><?php the_category();?></div>
  </div> -->			
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h1>
      <?php the_title(); ?>
    </h1>
    <small class="commentmetadata">
    <?php _e('By','spiegelmagazine');?>
    <?php if(function_exists('coauthors_posts_links'))
    coauthors_posts_links();
else
    the_author_posts_link(); ?>
    |
    <?php the_time(__ ('F jS, Y', 'spiegelmagazine'));?>
    |
    <?php comments_popup_link(__ ('No Comments &#187;', 'spiegelmagazine'), __ ('1 Comment &#187;', 'spiegelmagazine'), __ngettext ('% comment', '% comments', get_comments_number (),'spiegelmagazine')); ?>
    <?php edit_post_link('Edit', ' | ', ' | '); ?>
    </small>
        <div id="singlePage">
        <div class="entry">
        <?php the_content("<p class=\"serif\">" . __('Read the rest of this page', 'spiegelmagazine') ." &raquo;</p>"); ?>
		<div id="socialIcons">
		<?php if(function_exists('pf_show_link')) {
			echo pf_show_link();
		}?>
        
        Share:

        <a class="social-single" href="javascript:void(0)" onclick="javascript:window.open('http://twitter.com/share?text=<?php echo rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) . ' | via @RVRB '); ?>&url=<?php echo rawurlencode( wp_get_shortlink() ); ?>', 'twitwin', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=1');">Twitter</a>

        <a class="social-single" href="javascript:void(0)" onclick="javascript:window.open('http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode( wp_get_shortlink() ); ?>&p[images][0]=<?php echo ( has_post_thumbnail() ) ? urlencode( wp_get_attachment_image_src( get_post_thumbnail_id(), 'large') ) : ''; ?>&p[title]=<?php echo urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ); ?>&p[summary]=<?php echo urlencode( html_entity_decode( ( get_the_excerpt() != '' ) ? get_the_excerpt() : get_bloginfo('description') ) ); ?>', 'fbwin', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=1');">Facebook</a>

		</div>
      <?php wp_link_pages("<p><strong>" . __('Pages', 'spiegelmagazine') . ":</strong>", '</p>', __('number','spiegelmagazine')); ?>
    </div>
    </div>
<?php
if ( function_exists(related_posts) )
{
?>
<br><p style="margin-bottom:0;"><strong>Related Posts:</strong></p>
<ol style="margin-top:0;">
<?
        related_posts(3, 50,  '<li>', '</li>', '<li>', '</li>', false, false);
?>
</ol>
<?
}

?>

                <div class="postnavigation">
                                <?php previous_post('&#187; PREVIOUS: %','','yes') ?><br />
                                <?php next_post('&#171; NEXT: %','','yes') ?>
                </div>
	<div id="categories">
	<strong>Categories: </strong>
    <?php the_category(', ');?>
	</div>
    <?php if ( function_exists('the_tags') ) {
			the_tags('<div id="tags"><strong>Tags:</strong> ', ', ', '</div>'); } ?>
  </div>
  <?php comments_template(); ?>
  <?php endwhile; else: ?>
  <p><?php __('Sorry, no posts matched your criteria.','spiegelmagazine');?></p>
  <?php endif; ?>
<br /><br />
</div>
<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
