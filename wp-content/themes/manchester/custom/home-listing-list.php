<?php 

add_filter('pls_listing_home', 'manchester_custom_home_listing_list', 10, 2);

function manchester_custom_home_listing_list ($listing_html, $listing_data) {
	
  // pls_dump($listing_data);

	ob_start();
    ?>

<section class="list-item">                                                  
	
	<section class="list-pic">

		<div class="thumbs">
			<?php if ( isset($listing_data['images']) && is_array($listing_data['images']) ): ?>
        	<?php echo PLS_Image::load($listing_data['images'][0]['url'], array('resize' => array('w' => 144, 'h' => 93, 'method' => 'crop'), 'fancybox' => true)); ?>    	
				<?php else: ?>
				<?php echo PLS_Image::load('', array('resize' => array('w' => 144, 'h' => 93, 'method' => 'crop'), 'fancybox' => true)); ?>
       <?php endif ?>
		</div>

		<?php if (isset($listing_data['rets']['mls_id'])) { ?>
  		<p class="nrm-txt"><?php _e('MLS', 'manchester'); ?> #: <?php echo $listing_data['rets']['mls_id'] ?></p>
  	<?php } ?>

	</section>

	<section class="list-txt">

		<section class="list-info">

			<h5><a href="<?php echo $listing_data['cur_data']['url']; ?>"><?php echo $listing_data['location']['address'] ?></a></h5>
			<h6><?php echo $listing_data['location']['locality'] ?>, <?php echo $listing_data['location']['region'] ?></h6>
				<?php
					if (isset($listing_data['cur_data']['desc'])) {
						echo '<p class="nrm-txt">';
						if (strlen($listing_data['cur_data']['desc']) < 150) {
							echo $listing_data['cur_data']['desc'];
						} else {
							$position = strrpos( substr( $listing_data['cur_data']['desc'], 0, 150), ' ' );
							echo substr( $listing_data['cur_data']['desc'], 0, $position ) . '...';

						}
						echo '</p>';
					} 
				?>

			<p class="nrm-txt">
				<b><?php echo $listing_data['cur_data']['beds']; ?></b> <span class="beds-n-baths"><?php _e('Beds', 'manchester'); ?></span> | 
				<b><?php echo $listing_data['cur_data']['baths']; ?></b> <span class="beds-n-baths"><?php _e('Baths', 'manchester'); ?></span> 
				<?php if (isset($listing_data['cur_data']['sqft'])) { 
					echo '| <b>' . PLS_Format::number($listing_data['cur_data']['sqft'], array('abbreviate' => false, 'add_currency_sign' => false)) . '</b><span class="beds-n-baths"> ' . __('sqft', 'manchester') . '</span>'; 
				} ?>
			</p>

		</section><!-- /list-info -->

		<section class="list-price">
			
			<span class="green"><b><?php echo PLS_Format::number($listing_data['cur_data']['price'], array('abbreviate' => false)); ?></b>
			<?php
			if ($listing_data['cur_data']['lse_trms'] != null) {
				// translate lease terms to human form
				echo PLS_Format::translate_lease_terms($listing_data); 
			}
			?>
			</span><br />
			
			<span class="nrm-txt">
				<?php 
					if ( $listing_data['property_type'] == "fam_home") {
						echo __("Single Family Home", 'manchester');
					} else {
						$prop_type_frmttd = is_array($listing_data['property_type']) 
											? implode($listing_data['property_type']) 
											: $listing_data['property_type'];
						echo ucwords($prop_type_frmttd);
					} ?>
			</span>

		</section><!-- /list-price -->

		<section class="list-links">

			<!-- <section class="list-fav"><a href="#">Add to favorites</a></section> -->
			<?php
			$api_whoami = PLS_Plugin_API::get_user_details();

			if (pls_get_option('pls-user-email')) { ?>
			<section class="list-req">
				<a href="mailto:<?php echo pls_get_option('pls-user-email'); ?>" target="_blank"><?php _e('Request more info', 'manchester'); ?></a>
			</section>
			<?php } else { ?>
			<section class="list-req">
				<a href="mailto:<?php echo $api_whoami['user']['email']; ?>"><?php _e('Request more info', 'manchester'); ?></a>
			</section>
			<?php } ?>

			<section class="list-btn1">
				<div class="img_btn">
					<a href="<?php echo $listing_data['cur_data']['url']; ?>"><input type="submit" Value="<?php _e('See Details', 'manchester'); ?>" class="button b-blue medium" /></a>
				</div>
			</section>

		</section><!-- /list-links -->

	</section><!-- /list-text -->

    <?php PLS_Listing_Helper::get_compliance(array(
    											'context' => 'inline_search',
												'agent_name' => $listing_data['rets']['aname'],
												'office_name' => $listing_data['rets']['oname'],
												'office_phone' => PLS_Format::phone($listing_data['contact']['phone']),
												'agent_license' => ( isset( $listing_data['rets']['alicense'] ) ? $listing_data['rets']['alicense'] : false ),
												'co_agent_name' => ( isset( $listing_data['rets']['aconame'] ) ? $listing_data['rets']['aconame'] : false ),
												'co_office_name' => ( isset( $listing_data['rets']['oconame'] ) ? $listing_data['rets']['oconame'] : false )
    											)
    										);
    ?>
	
</section><!-- /list-item -->

<div class="separator-1-sma"></div>

<?php // END FOR EACH ?>

     <?php
     $listing_html = ob_get_clean();

     return $listing_html;

}
?>