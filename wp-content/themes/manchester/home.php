<?php
/**
 * Manchester theme home
 *
 * This is the home template.
 *
 * @package PlacesterBlueprint
 * @subpackage Template
 */
?>

<section id="slideshow" class="slider-wrapper theme-default">
 	<?php 
		echo PLS_Slideshow::slideshow( 
			array( 
				'animation' => 'fade', 									// fade, horizontal-slide, vertical-slide, horizontal-push
				'animationSpeed' => 1000, 								// how fast animtions are
				'pauseOnHover' => true,									// if you hover pauses the slider
				'advanceSpeed' => 4000,									// if timer is enabled, time between transitions 
				'startClockOnMouseOut' => true,					// if clock should start on MouseOut
				'startClockOnMouseOutAfter' => 1000,		// how long after MouseOut should the timer start again
				'directionalNav' => true, 							// manual advancing directional navs
				'captions' => true, 										// do you want captions?
				'captionAnimation' => 'fade', 					// fade, slideOpen, none
				'captionAnimationSpeed' => 800, 				// if so how quickly should they animate in
				'afterSlideChange' => 'function(){}',		// empty function
				'width' => 608,
				'height' => 300,
				'context' => 'home',
				'featured_option_id' => 'slideshow-featured-listings',
				'listings' => 'limit=5&sort_by=price'
			)
		); 
	?>

	<script type="text/javascript">
		// Hack to alter bullets styling for formerly BP 1.0 themes -- need to do this more intelligently...
		jQuery(window).load(function () {
			jQuery('.orbit-bullets').css('margin-top', '-90px');
		});
	</script>

	<div class="clr"></div>
</section>

<section class="list">
	<h5><?php _e('NEW LISTINGS', 'manchester'); ?></h5>
	<?php echo PLS_Partials::get_listings("limit=5&featured_option_id=custom-featured-listings&context=home"); ?>
	<?php PLS_Listing_Helper::get_compliance(array('context' => 'listings', 'agent_name' => false, 'office_name' => false)); ?>
</section>