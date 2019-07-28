<?php 
add_filter('pls_listing_get_listings_widget', 'custom_manchester_widget_html_filter', 11, 2);

function custom_manchester_widget_html_filter ($listing_html, $listing_data) {
	
// pls_dump($listing_data);

	ob_start();
    ?>
		<section class="listing-item">
			<h4>
				<a href="<?php echo $listing_data['cur_data']['url']; ?>"><?php echo $listing_data['location']['address'] ?></a>
			</h4>
			<section class="details">
				<span class="bed"><strong><?php echo $listing_data['cur_data']['beds']; ?></strong> <?php _e('Beds', 'manchester'); ?></span>
				<span class="bath"><strong><?php echo $listing_data['cur_data']['baths'] ?></strong> <?php _e('Baths', 'manchester'); ?></span>
				<span class="area"><strong><?php echo PLS_Format::number($listing_data['cur_data']['sqft'], array('abbreviate' => false, 'add_currency_sign' => false)); ?></strong> <?php _e('sqft', 'manchester'); ?></span>
			</section>
			<section class="featured-image">
				<?php if ( isset($listing_data['images']) && is_array($listing_data['images']) ): ?>
					<a href="<?php echo $listing_data['cur_data']['url'] ?>">
			  		<?php echo PLS_Image::load($listing_data['images'][0]['url'], array('resize' => array('w' => 280, 'h' => 170, 'method' => 'crop'), 'fancybox' => true)); ?>
					</a>
				<?php endif ?>
			</section>
			<?php if (isset($listing_data['rets']['mls_id'])) { ?>
    		<p class="mls"><?php _e('MLS', 'manchester'); ?> #: <?php echo $listing_data['rets']['mls_id'] ?></p>
    	<?php } ?>
			<a class="learn-more" href="<?php echo $listing_data['cur_data']['url'];?>"><?php _e('Learn More', 'manchester'); ?></a>
    <?php
    PLS_Listing_Helper::get_compliance(array(
											'context' => 'listings_widget',
											'agent_name' => $listing_data['rets']['aname'],
											'office_name' => $listing_data['rets']['oname'],
											'office_phone' => PLS_Format::phone($listing_data['contact']['phone']),
											'agent_license' => ( isset( $listing_data['rets']['alicense'] ) ? $listing_data['rets']['alicense'] : false ),
											'co_agent_name' => ( isset( $listing_data['rets']['aconame'] ) ? $listing_data['rets']['aconame'] : false ),
											'co_office_name' => ( isset( $listing_data['rets']['oconame'] ) ? $listing_data['rets']['oconame'] : false )
											)
										);
    ?>
			<div class="clearfix"></div>
		</section>
     <?php

     $listing_html = ob_get_clean();

     return $listing_html;


}