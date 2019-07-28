<?php 

add_filter('pls_widget_recent_posts_post_inner', 'custom_side_recent_posts_widget_html', 10, 2);

function custom_side_recent_posts_widget_html ($post_item, $post_html) {

	// pls_dump($post_html);

	ob_start();
?>

	<section class="latest">
    <section class="latest-item">
			<h6 class="blue"><?php echo $post_html['post_title'] ?></h6>
			<p class="nrm-txt"><em><?php printf( __('Posted by <strong>%s</strong> on <strong>%s</strong>', 'manchester'), $post_html['author'], $post_html['date'] ); ?></em></p>
    </section>
  </section>

<?php

	return trim(ob_get_clean());
}