<?php
$email = pls_get_option('pls-user-email');
$phone = pls_get_option('pls-user-phone');
$email_str = $phone_str = $contact_str = '';

$street = pls_get_option('pls-company-street');
$locality = pls_get_option('pls-company-locality');
$region = pls_get_option('pls-company-region');
$postal = pls_get_option('pls-company-postal');
$street_str = $address_str = '';

$agent = PLS_Plugin_API::get_user_details();

$email = strval( $email ? $email : $agent['user']['email'] );
$phone = strval( $phone ? $phone : $agent['user']['phone'] );

$street = strval( $street ? $street : $agent['location']['address'] );
$locality = strval( $locality ? $locality : $agent['location']['locality'] );
$region = strval( $region ? $region : $agent['location']['region'] );
$postal = strval( $postal ? $postal : $agent['location']['postal'] );

if ($email) {
	$email_str = sprintf( __('Email: <a href="mailto:%s">%s</a><br />', 'manchester'), esc_attr($email), esc_html($email) );
}

if ($phone) {
	$phone_str = sprintf( __('Phone: <strong>%s</strong>', 'manchester'), esc_html($phone) );
}

if ($email_str || $phone_str) {
	$contact_str = sprintf('<p class="contact">%s%s</p>', $email_str, $phone_str);
}

if ($street) {
	$street_str = esc_html($street) . '<br />';
}

if ($street || $locality || $region || $postal) {
	$address_str = sprintf('<p class="address">%s %s %s %s<br /></p>', $street_str, esc_html($locality), esc_html($region), esc_html($postal) );
}
?>

<footer id="lvl6">

	<div class="wrapper">
		<section class="lrpad10">

			<section class="footer-contact">
				<?php if ($street) {
					echo $street; 
				} 

				if ($locality) {
					echo $locality;
				}

				if ($region) {
					echo $region; 
				}

				if ($postal) {
					echo $postal;
				} ?>

				<?php if ($email) { ?>

				 | <span><?php _e('Email', 'manchester'); ?>: 
					<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
				<?php } ?>

				<?php if ($phone) { ?>

				 | <span><?php _e('Phone', 'manchester'); ?>: <?php echo $phone; ?></span>
				
				<?php } ?>
			</section>
			
			<section class="footer-nav">
					<?php PLS_Route::get_template_part( 'menu', 'primary' ); ?> 

				<section class="footer-copyright">
					<p class="sma-txt">&copy;2012 <?php bloginfo( 'name' ); ?> | <a href="https://placester.com/" rel="nofollow"><?php _e('Real Estate Marketing', 'manchester'); ?></a> <?php _e('by', 'manchester'); ?> Placester</p>
				</section>
			</section>
			
			<section class="footer-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="footer-name"><?php bloginfo( 'name' ); ?></span><br/><span class="footer-slogan"><?php bloginfo( 'description' ); ?></span></a>			
			</section>
		</section>
	</div><!-- end of wrapper -->
</footer>

	<?php wp_footer(); ?>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	 chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

</body>
</html>
