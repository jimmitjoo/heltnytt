<?php
/**
 * Template Name: Listings Search
 *
 * This is the template for "Listings" search results page.
 *
 * @package PlacesterBlueprint
 * @subpackage Template
 */
?>

<!-- Search Form -->
<?php echo PLS_Partials::get_listings_search_form( 'context=listings_search&ajax=1'); ?>

<!-- Search List -->
<section id="lvl4">
    <div class="wrapper">

			<section class="left-content">
				<section class="list2">

					<h5><?php _e('SEARCH RESULTS', 'manchester'); ?></h5>

					<?php echo PLS_Partials::get_listings_list_ajax('crop_description=1&context=custom_listings_search'); ?>
					<?php PLS_Listing_Helper::get_compliance(array('context' => 'search', 'agent_name' => false, 'office_name' => false)); ?>
				</section> <!-- /list2 -->
			</section> <!-- /left-content -->

<!-- Floating Map -->
			<aside class="sidebar">

				<section id="floating-box">
					<div id="float-div">
						<section class="side-bin">
							<h5><?php _e('MAP', 'manchester'); ?></h5>
							<section class="search-map">
								<?php echo PLS_Map::dynamic(null, array(
								  'zoom' => '8',
								  'width' => 314,
								  'height' => 314, 
								  'canvas_id' => 'map_canvas',
                	'class' => 'custom_google_map',
                	'map_js_var' => 'pls_google_map',
                	'ajax_form_class' => false,
                  )); ?>
							</section>
						</section>
					</div> 
				</section>

			</aside>

			<div class="clr"></div>
			
    </div> <!-- end of wrapper -->
</section> <!-- /lvl4 -->