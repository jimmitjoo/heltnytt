<?php 

add_filter('property_details_filter', 'custom_property_details_page', 10, 2);

function custom_property_details_page ($html, $listing) {
		
	ob_start();
	
	?>

<section id="lvl2">
	<div class="wrapper">
		<div id="property">
			<h2><?php _e('Property Details', 'manchester'); ?></h2>
				<section class="property-inf">
					<div class="property-title">
						<span class="blue"><b><?php echo $listing['location']['full_address'] ?></b></span>
						<p><span><?php echo $listing['cur_data']['beds'] ?> <?php _e('Bedrooms', 'manchester'); ?></span> <span><?php echo $listing['cur_data']['baths'] ?> <?php _e('Bathrooms', 'manchester'); ?></span></p>
					</div>
		<div class="property-price">
			<span class="green"><b><?php echo PLS_Format::number($listing['cur_data']['price'], array('abbreviate' => false, 'add_currency_sign' => true)); ?></b></span>
		</div>
</section>

<section class="property-bin">
	<div class="property-img">
		<div class="img_box">
			<?php if ($listing['images']): ?>
				<?php echo PLS_Image::load($listing['images'][0]['url'], array('resize' => array('w' => 600, 'h' => 250, 'method' => 'crop'), 'fancybox' => false, 'as_html' => true, 'html' => array('img_classes' => 'main-banner'))); ?>  
			<?php else: ?>
				<?php echo PLS_Image::load(null, array('resize' => array('w' => 600, 'h' => 250, 'method' => 'crop'), 'fancybox' => false, 'as_html' => true, 'html' => array('img_classes' => 'main-banner'))); ?>  
			<?php endif ?>
		</div>
	</div>
</section>

<!-- sidebar container section -->
<section class="property-map">
	<div class="property-gmap">
		<?php echo PLS_Map::dynamic($listing, array(
			'lat' => $listing['location']['coords'][0],
			'lng' => $listing['location']['coords'][1],
			'zoom' => '14',
			'width' => 338,
			'height' => 230, 
			'canvas_id' => 'map_canvas',
			'class' => 'custom_google_map',
			'map_js_var' => 'pls_google_map',
			'ajax_form_class' => false,
		)); ?>
	</div>

	<script type="text/javascript">
      jQuery(document).ready(function( $ ) {
        var map = new Map();
        var listing = new Listings({
          single_listing: <?php echo json_encode($listing) ?>,
          map: map
        });
        map.init({
          type: 'single_listing', 
          listings: listing,
          lat : <?php echo json_encode($listing['location']['coords'][0]) ?>,
          lng : <?php echo json_encode($listing['location']['coords'][1]) ?>,
          zoom : 14
        });
        listing.init();
      });
	</script>

	<div class="property-lnks">
		<!-- <section class="list-fav"><a href="#"><?php _e('Add to favorites', 'manchester'); ?></a></section> -->
		<section class="list-req"><a href="<?php echo pls_get_option('pls-user-email'); ?>"><?php _e('Request more info', 'manchester'); ?></a></section>
	</div>
</section>

		<!-- </div>
	</div> end of wrapper
</section> -->


<section id="lvl4">
	<div class="wrapper">
		
		<section class="left-content">

			<section class="list2">
				<h5><?php _e('DETAILS', 'manchester'); ?></h5>
				
				<section class="list-item">
					<section class="list-details">

						<section class="list-details-1-2">
							<label><?php _e('Zoning Type', 'manchester'); ?></label>
							<p><?php echo ucwords($listing['zoning_types'][0]) ?></p>
							<?php if(isset($listing['purchase_types'][0])) { ?>
							<label><?php _e('Listing Type', 'manchester'); ?></label>
							<p><?php echo ucwords($listing['purchase_types'][0]) ?></p>
							<?php } ?>
							<?php if ($listing['property_type']): ?>
								<label><?php _e('Property Type', 'manchester'); ?></label>
								<p><?php echo PLS_Format::translate_property_type($listing); ?></p>
							<?php endif ?>

							<?php if (isset($listing['rets']['mls_id'])): ?>
								<label><?php _e('MLS#', 'manchester'); ?></label>
								<p><?php echo $listing['rets']['mls_id'] ?></p>
							<?php else: ?>
								<label><?php _e('Ref #', 'manchester'); ?></label>
								<p><?php echo $listing['id'] ?></p>
							<?php endif; ?>

						</section>

						<section class="list-details-2-2">
							<label><?php _e('Bedrooms', 'manchester'); ?></label>
							<p><?php echo $listing['cur_data']['beds'] ?></p>
							<label><?php _e('Bathrooms', 'manchester'); ?></label>
							<p><?php echo $listing['cur_data']['baths'] ?></p>
							<label><?php _e('Half Baths', 'manchester'); ?></label>
							<p><?php echo $listing['cur_data']['half_baths'] ?></p>
						</section>

					</section>
				</section>

				<div class="separator-1-sma"></div>

				<?php if($listing['cur_data']['desc']): ?>
					<h5><?php _e('DESCRIPTION', 'manchester'); ?></h5>
					<section class="list-item">
						<section class="list-details"><?php echo $listing['cur_data']['desc'] ?></section>
					</section>
				<?php endif; ?>

				<div class="separator-1-sma"></div>

				<?php $amenities = PLS_Format::amenities_but($listing, array('half_baths', 'beds', 'baths', 'url', 'sqft', 'avail_on', 'price', 'desc')); ?>

				<?php if ( isset($amenities['list']) && $amenities['list'] != null ): ?>
					<?php $amenities['list'] = PLS_Format::translate_amenities($amenities['list']); ?>
					<h5><?php _e('PROPERTY AMENITIES', 'manchester'); ?></h5>
						<section class="list-item">
							<section class="list-amenity">
								<?php foreach ($amenities['list'] as $amenity => $value): ?>
									<label><span><?php echo $amenity ?></span> <?php echo $value ?></label>
								<?php endforeach ?>
							</section>
						</section>

						<div class="separator-1-sma"></div>
				<?php endif; ?>

				<?php if ( isset($amenities['ngb']) && $amenities['ngb'] != null ): ?>
					<?php $amenities['ngb'] = PLS_Format::translate_amenities($amenities['ngb']); ?>
					<h5><?php _e('NEIGHBORHOOD AMENITIES', 'manchester'); ?></h5>
						<section class="list-item">
							<section class="list-amenity">
								<?php foreach ($amenities['ngb'] as $amenity => $value): ?>
									<label><span><?php echo $amenity ?></span> <?php echo $value ?></label>
								<?php endforeach ?>
							</section>
						</section>

						<div class="separator-1-sma"></div>
				<?php endif; ?>

				<?php if ( isset($amenities['uncur']) && $amenities['uncur'] != null ): ?>
					<?php $amenities['uncur'] = PLS_Format::translate_amenities($amenities['uncur']); ?>
					<h5><?php _e('CUSTOM AMENITIES', 'manchester'); ?></h5>
						<section class="list-item">
							<section class="list-amenity">
								<?php foreach ($amenities['uncur'] as $amenity => $value): ?>
									<label><span><?php echo $amenity ?></span> <?php echo $value ?></label>
								<?php endforeach ?>
							</section>
						</section>

						<div class="separator-1-sma"></div>
				<?php endif; ?>

			</section><!-- /.list2 -->
		</section><!-- /.left-content -->


		<aside class="sidebar">
			<section class="side-bin2">

				<?php if($listing['images']): ?>
				<h5><?php _e('PHOTO GALLERY', 'manchester'); ?></h5>
				<section class="gallery">
					<?php foreach ($listing['images'] as $image): ?>
							<?php echo PLS_Image::load($image['url'], array('resize' => array('w' => 140, 'h' => 93, 'method' => 'crop'), 'fancybox' => true, 'as_html' => false)) ?>
					<?php endforeach ?>
				</section>
				<?php endif; ?>
			</section>
		</aside>

		<div class="clr"></div>
	
	</div><!-- end of wrapper -->
</section>


<section id="lvl5">
	<div class="wrapper">

		<section class="neighborhood">

			<h5><?php _e('NEIGHBORHOOD', 'manchester'); ?></h5>
			<section class="neighborhood-map">
				<?php echo PLS_Map::dynamic($listing, array(
					'lat' => $listing['location']['coords'][0],
					'lng' => $listing['location']['coords'][1],
					'zoom' => '13',
					'width' => 960,
					'height' => 258,
					'canvas_id' => 'map_canvas_nbr',
			    	'class' => 'custom_google_map_nbr',
			    	'map_js_var' => 'pls_google_map_nbr',
			    	'ajax_form_class' => false,
				)); ?>
			</section>

			<script type="text/javascript">
		        jQuery(document).ready(function( $ ) {
		          var map_nbr = new Map();
		          var listing_nbr = new Listings({
		            single_listing: <?php echo json_encode($listing) ?>,
		            map: map_nbr
		          });
		          map_nbr.init({
		            type: 'single_listing', 
		            dom_id: 'map_canvas_nbr',
		            listings: listing_nbr,
		            lat: <?php echo json_encode($listing['location']['coords'][0]) ?>,
		            lng: <?php echo json_encode($listing['location']['coords'][1]) ?>,
		            zoom: 14
		          });
		          listing_nbr.init();
		        });
			</script>
		
		</section>
		

		<?php PLS_Listing_Helper::get_compliance(array(
			'context' => 'listings',
			'agent_name' => $listing['rets']['aname'],
			'office_name' => $listing['rets']['oname'],
			'office_phone' => PLS_Format::phone($listing['contact']['phone']),
			'agent_license' => ( isset( $listing['rets']['alicense'] ) ? $listing['rets']['alicense'] : false ),
			'co_agent_name' => ( isset( $listing['rets']['aconame'] ) ? $listing['rets']['aconame'] : false ),
			'co_office_name' => ( isset( $listing['rets']['oconame'] ) ? $listing['rets']['oconame'] : false )
			)
		); ?>
	</div><!-- end of wrapper -->
</section>

	<?php

	return ob_get_clean();
}