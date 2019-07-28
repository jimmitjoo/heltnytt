<?php 

add_filter('pls_listings_search_form_outer_listings_search', 'custom_search_form_html', 10, 6);

function custom_search_form_html ($form, $form_html, $form_options, $section_title, $form_data) {
	// pls_dump($form_html);
	ob_start();
	?>
	
<section id="lvl2">
	<div class="wrapper">

		<div id="search">
			<h2><?php _e('Search Listings', 'manchester'); ?></h2>
		</div>

		<div id="form-search">
			
		<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>listings" class="pls_search_form_listings">
				
				<div class="form-l">
					
					<h6><?php _e('Location', 'manchester'); ?></h6>
					<label><?php _e('City', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['cities']; ?>
					</div>
					<label><?php _e('State', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['states'] ?>  
					</div>
					<label><?php _e('ZIP', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['zips'] ?>  
					</div>
					
				</div><!--form-l-->
				
				<div class="form-m">

					<h6><?php _e('Listing Type', 'manchester'); ?></h6>
					<label><?php _e('Zoning Type', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['zoning_types'] ?>
					</div>
					<label><?php _e('Transaction Type', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['purchase_types'] ?>
					</div>
					<label><?php _e('Property Type', 'manchester'); ?></label>
					<div class="slt-full">
						<?php echo $form_html['property_type'] ?>
					</div>

				</div><!--form-m-->
				
				<div class="form-r">
					
					<div class="form-r-l">
					<h6><?php _e('Details', 'manchester'); ?></h6>
					<label><?php _e('Bed(s)', 'manchester'); ?></label>
					<div class="slt-sma">
						<?php echo $form_html['bedrooms'] ?>
					</div>
					<label><?php _e('Bath(s)', 'manchester'); ?></label>
					<div class="slt-sma">
						<?php echo $form_html['bathrooms'] ?>
					</div>
					</div><!--form-r-l-->
					
					<div class="form-r-r">
					<h6><?php _e('Price Range', 'manchester'); ?></h6>
					<label><?php _e('Price From', 'manchester'); ?></label>
					<div class="slt-sma">
						<?php echo $form_html['min_price'] ?> 
					</div>
					<label><?php _e('Price To', 'manchester'); ?></label>
					<div class="slt-sma">
						<?php echo $form_html['max_price'] ?> 
					</div>
					</div><!--form-r-r-->
					
					<div class="clr"></div>
					
					<!--<label><?php _e('Available On', 'manchester'); ?></label>
					<div class="slt-full">
					<?php //echo $form_html['available_on'] ?>
					</div>-->
					
				</div><!--form-r-->

				<div class="clearfix"></div>

				<input type="submit" name="submit" value="<?php _e('Search Now!', 'manchester'); ?>" id="full-search" class="button b-blue">

				<div class="clearfix"></div>

			</form>
		</div> <!-- /form-search -->
		
	</div><!-- end of wrapper -->
</section>

<?php
	
    $search_form = trim(ob_get_clean());
    return $search_form;
  
}