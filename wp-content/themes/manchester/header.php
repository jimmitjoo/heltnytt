<?php
$favicon = pls_get_option('pls-site-favicon');
$agent = PLS_Plugin_API::get_user_details();
$email = pls_get_option('pls-user-email');
$phone = pls_get_option('pls-user-phone');
$logo = pls_get_option('pls-site-logo');
$title = pls_get_option('pls-site-title');
$subtitle = pls_get_option('pls-site-subtitle');

$email = $email ? $email : $agent['user']['email'];
$phone = $phone ? $phone : $agent['user']['phone'];

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>	<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>	<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset=<?php bloginfo('charset'); ?>" />
	<title><?php pls_document_title(); ?></title>
	<!-- SEO Tags -->
	<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta name="author" content="<?php echo pls_get_option('pls-user-name'); ?>">
	<meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ) ?>" />
	<meta property="og:title" content="<?php pls_document_title(); ?>" />
	<meta property="og:url" content="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" />
	<meta itemprop="name" content="<?php echo get_bloginfo( 'name' ) ?>">

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">

  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

	<?php if ($favicon): ?>
	<!-- Favicon -->
	<link href="<?php echo $favicon; ?>" rel="shortcut icon" type="image/x-icon" />
	<?php endif; ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php pls_do_atomic( 'open_body' ); ?>
	
	<?php pls_do_atomic( 'before_header' ); ?>

<div class="wrapper">
	
<header id="lvl1">
	<div id="container">
		<section class="lrpad10">
			<section class="company-logo">

				<?php if ($logo): ?>
					<div id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo $logo; ?>" alt="<?php _e('Site logo', 'manchester'); ?>">
						</a>
					</div>
				<?php endif; ?>

				<?php if ($title): ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $title; ?></a></h1>

					<?php if ($subtitle): ?>
						<p id="slogan"><?php echo $subtitle; ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if (!$logo && !$title): ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<p id="slogan"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>

			</section>

			<?php $api_whoami = PLS_Plugin_API::get_user_details(); ?>

			<?php if ($email || $phone): ?>

			<section class="contact-info">

				<?php if ($email): ?>

				<section class="email"><?php _e('Email', 'manchester'); ?> - <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></section>

				<?php endif;

				if ($phone): ?>

				<section class="phone"><?php _e('Call Us', 'manchester'); ?> <?php echo $phone; ?></section>

				<?php endif; ?>

			</section>

			<?php endif; ?>

			<nav class="main-nav">
				<?php wp_nav_menu(array('menu' => 'Main Nav Menu')); ?>
			</nav>

			<div class="clr"></div>
		</section>
	</div><!-- end of wrapper -->
</header>