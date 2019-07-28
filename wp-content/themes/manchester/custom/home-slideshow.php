<?php 

// Hook into the slideshow extension
add_filter('pls_slideshow_data_home', 'manchester_custom_slideshow_captions', 10, 1);

function manchester_custom_slideshow_captions ($data) {
	
	if (is_array($data) ) {
	
		unset($data['captions']);

		// each full represents a listing we need to work with.
		// their position in the array matches the other relavent
		// info. 
		if(isset($data['listing'])) {
			foreach ($data['listing'] as $index => $listing) {
			
				// pls_dump($listing);
	            /** Get the listing caption. */
	            ob_start();
				?>

				<div id="caption-<?php echo $index ?>" class="orbit-html-caption">
					<a href="<?php echo $listing['cur_data']['url']; ?>"><p class="address"><?php echo $listing['location']['full_address'] ?></p></a>
					<p>
						<span class="beds"><?php echo $listing['cur_data']['beds']; ?> <?php _e('Beds', 'manchester'); ?> </span>
						<span class="baths"> <?php echo $listing['cur_data']['baths']; ?> <?php _e('Baths', 'manchester'); ?></span>
						<span class="price">
							<?php
							echo PLS_Format::number($listing['cur_data']['price'], array('abbreviate' => false, 'add_currency_sign' => true));
							if ($listing['cur_data']['lse_trms'] != null) {
								// translate lease terms to human form
								echo '&nbsp;' . PLS_Format::translate_lease_terms($listing); 
							}
							?>
						</span>
					</p>
					<a class="button b-blue large" href="<?php echo $listing['cur_data']['url']; ?>"><?php _e('See Details', 'manchester'); ?></a>
				</div>

				<?php 
	            $data['captions'][] = trim( ob_get_clean() );
			}
		}
	}
	// error_log(var_export($data['captions'], true));
	return $data;
	
}
