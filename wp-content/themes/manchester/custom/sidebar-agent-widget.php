<?php 

add_filter('pls_widget_agent_inner', 'custom_side_agent_widget_html', 10, 2);

function custom_side_agent_widget_html ($post_item, $post_html) {

	//pls_dump($post_html);
	$agent = PLS_Plugin_API::get_user_details();
	
	ob_start();
?>

<section class="side-bin">

	<section class="agent">

		<section class="agent-thumb">
			<?php if (pls_get_option('pls-user-image')) { ?>
				<img src="<?php echo pls_get_option('pls-user-image') ?>" alt="<?php _e('Agent photo', 'manchester'); ?>" width=90 />
			<?php } elseif (!empty($agent['user']['headshot'])) { ?>
				<img src="<?php echo $agent['user']['headshot'] ?>" alt="<?php _e('Agent photo', 'manchester'); ?>" width=90 />
			<?php } ?>
		</section>

		<section class="agent-text">
			
			<?php if (pls_get_option('pls-user-name')): ?>
				<h6 class="blue"><?php echo pls_get_option('pls-user-name'); ?></h6>
				<?php else: ?>
				<h6 class="blue"><?php echo $agent['user']['first_name'] . ' ' . $agent['user']['last_name']; ?></h6>
			<?php endif; ?>
			
			<?php if(pls_get_option('pls-user-description')): ?>
				<p class="nrm-txt"><?php echo pls_get_option('pls-user-description'); ?></p>
			<?php endif; ?>
			<div class="divider"></div>

			<p class="nrm-txt">
				<?php if (pls_get_option('pls-user-email')): ?>
					<a href="mailto:<?php echo pls_get_option('pls-user-email'); ?>"><?php echo pls_get_option('pls-user-email'); ?></a><br />
				<?php else: ?>
					<a href="mailto:<?php echo $agent['user']['email']; ?>"><?php echo $agent['user']['email']; ?></a><br />
				<?php endif; ?>

				<?php if (pls_get_option('pls-user-phone')): ?>
					<?php echo pls_get_option('pls-user-phone'); ?>
				<?php else: ?>
					<?php echo $agent['user']['phone']; ?>
				<?php endif; ?>
			</p>
		
		
		</section>

	</section>

</section>

<?php

	return trim(ob_get_clean());
}