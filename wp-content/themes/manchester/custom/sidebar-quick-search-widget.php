<?php 
//hook into blueprints search wiget
add_filter('pls_widget_quick_search_context', 'custom_side_search_widget_context');

// set the context so we can modify the search widget without collisions 
function custom_side_search_widget_context () {
	return 'manchester_search_widget';
}

add_filter('pls_listings_search_form_outer_manchester_search_widget', 'custom_side_search_widget_html', 10, 5);

function custom_side_search_widget_html ($form, $form_html, $form_options, $section_title, $form_data) {
	ob_start();
// pls_dump($form_html);
?>
	

<div id="form-home">

	<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>listings" id="simple-search">

		<div class="tbl-col-1">
			<label><?php _e('City', 'manchester'); ?></label>
			<div class="cselect">
				<?php echo $form_html['cities']; ?>
			</div>
		</div>
		<div class="tbl-col-2">
			<div class="tbl-col-3">
					<?php _e('Price From', 'manchester'); ?><br />
				<div class="cselect3">
					<?php echo $form_html['min_price']; ?>
				</div>
			</div>
			<div class="tbl-col-4">
					<?php _e('Price to', 'manchester'); ?><br />
				<div class="cselect3">
					<?php echo $form_html['max_price']; ?>
				</div>
			</div>
		</div>
		<div class="tbl-col-1">
			<label><?php _e('Location', 'manchester'); ?></label>
			<div class="cselect">
				<?php echo $form_html['states']; ?>
			</div>
		</div>
		<div class="tbl-col-2">
			<?php _e('Available on', 'manchester'); ?><br />
			<div class="cselect">
				<?php echo $form_html['available_on']; ?>
			</div>
		</div>
		<div class="tbl-col-1">
			<label><?php _e('Beds', 'manchester'); ?></label>
			<div class="cselect3">
				<?php echo $form_html['bedrooms']; ?>
			</div>
		</div>
		<div class="tbl-col-2">
			<label><?php _e('Baths', 'manchester'); ?></label>
			<div class="cselect3">
				<?php echo $form_html['bathrooms']; ?>
			</div>
              </div>
		<div class="clr"></div>
              <div class="aR srch1"><input type="submit" id="search" name="submit" value="<?php _e('SEARCH NOW', 'manchester'); ?>" class="button b-blue" /></div>
	</form>
</div>

<div class="clr"></div>

	<?php
	return trim(ob_get_clean());

}