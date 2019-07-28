<?php 

add_filter( 'pls_listings_list_ajax_item_html_custom_listings_search', 'custom_listings_search_list', 10, 3 );

function custom_listings_search_list( $listing_item_html, $listing, $context_var ) {

    // return $listing_item_html;

    /** Start output buffering. The buffered html will be returned to the filter. */
    ob_start();
    // pls_dump($listing);
    ?>

	<section class="list-item">
		<section class="list-pic">
			<div class="thumbs">
				<?php if (is_array($listing['images'])): ?>
					<?php echo PLS_Image::load($listing['images'][0]['url'], array('resize' => array('w' => 144, 'h' => 93, 'method' => 'crop'), 'fancybox' => true, 'as_html' => true)); ?>    	
				<?php else: ?>
					<?php echo PLS_Image::load('', array('resize' => array('w' => 144, 'h' => 93, 'method' => 'crop'), 'fancybox' => true, 'as_html' => true)); ?>    	
				<?php endif; ?>
			</div>

			<?php if (isset($listing['rets']['mls_id'])) { ?>
    		<p class="nrm-txt"><?php _e('MLS', 'manchester'); ?> #: <?php echo $listing['rets']['mls_id'] ?></p>
    	<?php } ?>

		</section>

		<section class="list-txt">                               
			<section class="list-info">
				<h5><a href="<?php echo $listing['cur_data']['url']; ?>"><?php echo $listing['location']['address']; ?></a></h5>
				<h6><?php echo $listing['location']['locality'] . ', ' . $listing['location']['region']; ?></h6>
				<p class="nrm-txt"><?php echo substr($listing['cur_data']['desc'], 0, 300); ?></p>
				<p class="nrm-txt">
					<b><?php echo $listing['cur_data']['beds']; ?></b> <span class="beds-n-baths"><?php _e('Beds', 'manchester'); ?></span> |
					<b><?php echo $listing['cur_data']['baths']; ?></b> <span class="beds-n-baths"><?php _e('Baths', 'manchester'); ?></span>
					<?php if ($listing['cur_data']['sqft'] != null): ?> 
						| <b><?php echo PLS_Format::number($listing['cur_data']['sqft'], array('abbreviate' => false, 'add_currency_sign' => false)); ?></b><span class="beds-n-baths"> <?php _e('sqft', 'manchester'); ?></span>
					<?php endif; ?>
				</p>
			</section>

			<section class="list-price">
				<span class="green"><b><?php echo PLS_Format::number($listing['cur_data']['price'], array('abbreviate' => false, 'add_currency_sign' => true)); ?></b><?php if (isset($listing['cur_data']['lse_trms'])) { echo $listing['cur_data']['lse_trms']; } ?></span><br />
				<?php if (!empty($listing['property_type'])): ?>
					<span class="nrm-txt"><?php echo ucwords($listing['property_type']); ?></span>
				<?php endif; ?>
			</section>

			<section class="list-links">
				<!-- <section class="list-fav"><a href="#"><?php _e('Add to favorites', 'manchester'); ?></a></section> -->
				<section class="list-req"><a href="mailto:<?php echo pls_get_option('pls-user-email'); ?>"><?php _e('Request more info', 'manchester'); ?></a></section>
				<section class="list-btn1">
					<div class="img_btn"><a href="<?php echo $listing['cur_data']['url']; ?>"><input type="submit" value="<?php _e('See Details', 'manchester'); ?>" class="button b-blue medium" /></a></div>
				</section>
			</section>
	</section>
	<?php
	PLS_Listing_Helper::get_compliance(array(
										'context' => 'inline_search',
										'agent_name' => $listing['rets']['aname'],
										'office_name' => $listing['rets']['oname'],
										'office_phone' => PLS_Format::phone($listing['contact']['phone']),
										'agent_license' => ( isset( $listing['rets']['alicense'] ) ? $listing['rets']['alicense'] : false ),
										'co_agent_name' => ( isset( $listing['rets']['aconame'] ) ? $listing['rets']['aconame'] : false ),
										'co_office_name' => ( isset( $listing['rets']['oconame'] ) ? $listing['rets']['oconame'] : false )
										)
									); ?>

	<div class="separator-1-sma"></div>

<?php

	$html = ob_get_clean();

// current js build throws a fit when newlines are present
// will need to strip them. 
// added EMCA tag will solve in the future.

	$html = preg_replace('/[\n\r\t]/', ' ', $html);

	return $html;
}

add_filter('pls_listing_list_ajax_data_request', 'custom_listing_ajax_data_filter');
function custom_listing_ajax_data_filter ($listings) {
  
  foreach ($listings as $listing) {

    //format images
    if (isset($listing->images) && is_array($listing->images) ) {
      foreach ($listing->images as $index => $image) {
        // pls_dump($image->url);
        // pls_dump(PLS_Image::load($image->url, array('resize' => array('w' => 149, 'h' => 90, 'method' => 'crop') ) ));
        // $listings->images[$index]->url = PLS_Image::load($image->url, array('resize' => array('w' => 149, 'h' => 90, 'method' => 'crop') ) );
      }
    }
  }
  
  return $listings;
}

?>