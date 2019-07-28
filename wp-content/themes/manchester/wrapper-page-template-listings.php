<?php PLS_Route::handle_header(); ?>

<?php
// only load bootloader if plugin is active
if (!pls_has_plugin_error()):
?>
	<script type="text/javascript">
	  var search_bootloader;
	  jQuery(document).ready(function( $ ) {
	    search_bootloader = new SearchLoader ({
	      map: {
	        dom_id: 'map_canvas',
	        filter_by_bounds: false
	      },
	    	filter: {
	    		context: 'listings_search'
	    	},
	    	list: {
	    		context: 'custom_listings_search'
	      }
	    });
	  });
	</script>
<?php endif; ?>

<?php PLS_Route::handle_dynamic(); ?>
 
<?php PLS_Route::handle_footer(); ?>

