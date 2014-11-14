<?php get_header(); ?>
<div id="contentWrapper">
	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle"><?php _e('Search Results','spiegelmagazine');?></h2>

			<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','spiegelmagazine');?> <?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<small><?php the_time(__ ('F jS, Y', 'spiegelmagazine')) ?></small>
	<div id="searchPage">			
	<div class="entry">
					<?php if ( function_exists( 'get_the_image' ) ) { get_the_image( array( 'image_scan' => true, 'width' => '150', 'height' => '150') ); } ?>
					<?php the_excerpt() ?>
				</div>
				<div style="clear:both;"></div> 
				</div>
<hr /><br />
				
			</div>

		<?php endwhile; ?>
		
		<div class="navigation">
				<div class="preventries"><?php next_posts_link(__('&laquo; Previous entries','spiegelmagazine')) ?></div>
				<div class="nextentries"><?php previous_posts_link(__('Next entries &raquo;','spiegelmagazine')) ?></div>
		</div>	

	<?php else : ?>

		<h2 class="center"><?php _e('No posts found. Try a different search?','spiegelmagazine');?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>