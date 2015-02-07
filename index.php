<?php include (TEMPLATEPATH.'/tools/get-theme-options.php'); ?>
<?php get_header(); ?>


<div id="leadcontainer">
  <!-- LEAD ARTICLE -->
    <?php include (ABSPATH . '/wp-content/plugins/wp-glideshow/glideshow.php'); ?>
</div>
<!-- UMS FRAME BELOW -- SWITCH TO 1068 HEIGHT FOR VIDEO -->
<!-- <iframe src="<?php //echo get_stylesheet_directory_uri().'/umsblowout.html'; ?>" frameborder="0" height="1078" width="100%" style="background:#fff;margin-bottom:10px;"></iframe> -->
<div id="homepagemain" class="clearfix">
	<div id="homepageLEFT">
		<div id="homecontent-top">
			<div id="top-left">
				<?php $topleft = new WP_Query('cat=9&showposts=1'); ?>
				<div class="title-heading">
					<h3><?php wp_list_categories('include=9&title_li=&style=none'); ?></h3>
				</div>
			    <?php while ($topleft->have_posts()) : $topleft->the_post(); ?>
				<?php 
				$thumb = get_post_meta($post->ID, 'article_image', true);
				if(!empty($thumb)) { 
					$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_markup['articleSm_url'];?></a>
				<?php }
				else {
					if ( function_exists( 'get_the_image' ) ) { get_the_image( array( 'image_scan' => true, 'width' => '150', 'height' => '150') ); }
				} ?>
	            <?php 
	            //defined in functions.php
	            home_top_box_content($post) 
	            ?>
          		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read_more">View Now >></a>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
			<div id="top-middle">
				<?php $topmiddle = new WP_Query('cat=10060&showposts=1'); ?>
				<div class="title-heading">
					<h3><?php wp_list_categories('include=10060title_li=&style=none'); ?></h3>
				</div>
				<?php while ($topmiddle->have_posts()) : $topmiddle->the_post(); ?>
				<?php 
				$thumb = get_post_meta($post->ID, 'article_image', true);
				if(!empty($thumb)) { 
					$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_markup['articleSm_url'];?></a>
				<?php }
				else {
					if ( function_exists( 'get_the_image' ) ) { get_the_image( array( 'image_scan' => true, 'width' => '150', 'height' => '150') ); }
				} ?>
          		<?php home_top_box_content($post) ?>
          		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read_more">View Now >></a>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
			<div id="top-right">
				<?php $topright = new WP_Query('cat=7701&showposts=1'); ?>
				<div class="title-heading">
					<h3><?php wp_list_categories('include=7701title_li=&style=none'); ?></h3>
				</div>
				<?php while ($topright->have_posts()) : $topright->the_post(); ?>
				<?php 
				$thumb = get_post_meta($post->ID, 'article_image', true);
				if(!empty($thumb)) { 
					$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_markup['articleSm_url'];?></a>
				<?php }
				else {
					if ( function_exists( 'get_the_image' ) ) { get_the_image( array( 'image_scan' => true, 'width' => '150', 'height' => '150') ); }
				} ?>
          		<?php home_top_box_content($post) ?>
          		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read_more">View Now >></a>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
		<div id="homecontent-bottom" class="clearfix"> 
			<div id="featuredarticle">
				<?php $lead_query = new WP_Query('cat='.get_cat_id(get_option('prinz_featured')).'&showposts=1'); ?>
		        <?php while ($lead_query->have_posts()) : $lead_query->the_post(); ?>
		        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php 
				$thumb = get_post_meta($post->ID, 'Featured', true);
				if(!empty($thumb)) { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb; ?>" /></a>
				<?php 
				echo strip_tags(the_content('Read more...',true),'<img>'); }
				else {
					ob_start();
				   	the_content('Read more...',true);
				   	$postOutput = preg_replace('/<a[^>]*>(<img[^>]*>)<\/a[^>]*>/', '$1', ob_get_contents());
				   	ob_end_clean();
				   	echo $postOutput;
				} ?>
		        <?php endwhile; ?>
		        <?php wp_reset_query(); ?>
			</div>
			<div id="homeleftcol" class="clearfloat">	 
				<?php
				$display_categories = explode(",",$prinz_homecatsleft);
				for ($x = 0; $x < sizeof($display_categories); ++$x) {
				?>
				<div class="homebox"> 
					<?php $homecatsleft_query = new WP_Query("showposts=$prinz_homecatsnumber&cat=".current($display_categories).""); ?>
					<?php next($display_categories); ?>
					<?php while ($homecatsleft_query->have_posts()) : $homecatsleft_query->the_post(); ?>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php 
					$thumb = get_post_meta($post->ID, 'article_image', true);
					if(!empty($thumb)) { 
						$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img style="border:3px solid #000;" src="<?php echo $thumb_markup['articleMed_url'];?></a>
					<?php 
					echo strip_tags(the_content('Read more...',true),'<img>'); }
					else {
						ob_start();
					   	the_content('Read more...',true);
					   	$postOutput = preg_replace('/<a[^>]*>(<img[^>]*>)<\/a[^>]*>/', '$1', ob_get_contents());
					   	ob_end_clean();
					   	echo $postOutput;
					} ?>
					<div style="margin-bottom:15px;" class="clearfix"></div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
				<?php } ?>
			</div>
			<div id="homerightcol" class="clearfloat"> 
				<?php
				$display_categories = explode(",",$prinz_homecatsright);
				for ($x = 0; $x < sizeof($display_categories); ++$x) {
				?>	
				<div class="homebox"> 
					<?php $homecatsright_query = new WP_Query("showposts=$prinz_homecatsnumber&cat=".current($display_categories).""); ?>
					<?php next($display_categories); ?>
					<?php while ($homecatsright_query->have_posts()) : $homecatsright_query->the_post(); ?>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php 
					$thumb = get_post_meta($post->ID, 'article_image', true);
					if(!empty($thumb)) { 
						$thumb_markup = generate_thumb($thumb); /* this function is in the themes functions.php */ ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img style="border:3px solid #000;" src="<?php echo $thumb_markup['articleMed_url'];?></a>
					<?php 
					echo strip_tags(the_content('Read more...',true),'<img>'); }
					else {
						ob_start();
					   	the_content('Read more...',true);
					   	$postOutput = preg_replace('/<a[^>]*>(<img[^>]*>)<\/a[^>]*>/', '$1', ob_get_contents());
					   	ob_end_clean();
					   	echo $postOutput;
					} ?>
					<div style="margin-bottom:15px;" class="clearfix"></div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
			<?php } ?>
		</div>
        <div class="clear"></div>
	</div>
	<div id="homepageRIGHT">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
