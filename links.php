<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>
<div class="clear"></div>
<div id="content">

<h2><?php __('Links:','spiegelmagazine');?></h2>
<ul>
<?php get_links_list(); ?>
</ul>

</div>

<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
