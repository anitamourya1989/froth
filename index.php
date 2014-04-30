<?php get_header();?>

<?php

if (have_posts()) : while (have_posts()) : the_post(); 

$pages = get_posts(array('sort_order' => 'ASC', 'sort_column' => 'menu_order',
              'meta_query' => array(
                    array(
                         'key' => '_show_on_home',
                         'value' => 'yes',
                         'compare' => '=='
                         )
                    ),
               'posts_per_page' => -1,
				'post_type' => 'page'));

foreach ($pages as $page_data) {
    $content = apply_filters('the_content', $page_data->post_content);
    $title = $page_data->post_title;
	$slug = $page_data->post_name;
	$pageid = $page_data->ID;
	$my_meta = get_post_meta($pageid,'_show_on_home',TRUE);
	?>
   	<div id="post-<?php the_ID(); ?>" class="section features" data-magellan-destination="<?php echo $title; ?>" data="<?php echo $title; ?>">
	<div class="row">
		<div class="large-12 columns">
			<h2 style="color:#fdb92e;"><?php echo $title; ?></h2>
			<p style="color:#fdb92e; text-align:center;"><?php echo esc_attr( $my_meta ); ?></p>
			<span class="subheading leftalign">
				<?php echo $content; ?>
			</span>
		</div>
	</div>
</div>
<hr>

<?php
}
?>

<?php //comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p class="section features" ><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
