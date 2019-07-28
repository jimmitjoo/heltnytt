<?php
/**
 * Template Name: About Us
 *
 * This is the template for the About Us page
 *
 */
$company_details = PLS_Plugin_API::get_company_details();
$comma_str = $company_details['location']['locality'] && $company_details['location']['region'] ? ', ' : '';
?>

<div id="main">
	<div class="user-generated">
    <h2><?php _e('About', 'manchester'); ?> <?php echo stripslashes($company_details['name']); ?></h2>
    <p id="company-phone"><?php echo PLS_Format::phone($company_details['phone']); ?></p>
    <p id="company-address"><?php echo $company_details['location']['address'] . ' ' . $company_details['location']['unit']; ?></p>
    <p id="company-city-state"><?php printf('%s%s%s', $company_details['location']['locality'], $comma_str, $company_details['location']['region']); ?>
    </p>

	<p id="company-decription"><?php echo $company_details['description']; ?></p>

  </div><!--user-generated-->

</div><!--main-->
