<?php get_header(); ?>
<div id="contentWrapper">
	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
		<div id="thePage">
			<div class="entry">
				<?php the_content("<p class=\"serif\">" . __('Read the rest of this page','spiegelmagazine') ." &raquo;</p>"); ?>
				<?php wp_link_pages("<p><strong>" . __('Pages', 'spiegelmagazine') . ":</strong>", '</p>', __('number','spiegelmagazine')); ?>
			</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	<br /><br />
	</div>
<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>