<!DOCTYPE html>
<html class="no-js">
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<?php if (ot_get_option('apple_touch_icon') != '') { ?>
		<link rel="apple-touch-icon" href="<?php echo stripslashes(ot_get_option('apple_touch_icon')) ?>">
	<?php } ?>
	<?php if (ot_get_option('favicon_png_upload') != '') { ?>
		<link rel="shortcut icon" href="<?php echo stripslashes(ot_get_option('favicon_png_upload')) ?>" />
	<?php } ?>
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo stripslashes(ot_get_option('favicon_ico_upload')) ?>">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<?php if (ot_get_option('tile_color') != '') { ?>
		<meta name="msapplication-TileColor" content="<?php echo ot_get_option('tile_color') ?>">
	<?php } ?>
	<?php if (ot_get_option('tile_image') != '') { ?>
		<meta name="msapplication-TileImage" content="<?php echo ot_get_option('tile_image') ?>">
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<?php echo '<body id="cbp-so-scroller" class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

<!-- Navigation Bar -->
<div class="navbar-single">
	<div class="container">
		<div class="header-page-logo">
		<?php if ( function_exists( 'ot_get_option' ) ) : ?>
			<?php $logo = ot_get_option( 'logo_upload' ); ?>
			<?php $blog_title = get_bloginfo('name'); ?>
			<?php $home_link = get_home_url(); ?>
			<?php if ( ! empty( $logo )) { 
				echo '<a class="navbar-brand-single" href="'.$home_link.'/"><img class="logo" src="', $logo, '" alt=""></a>';
			 } else { ?>
				<h1 class="clearfix"><a class="navbar-brand navbar-brand-title" href="<?php echo site_url(); ?>"><?php echo $blog_title; ?></a></h1>
			<?php } ?>
		<?php endif; ?>
		</div>

		<?php $defaults = array(
			'theme_location'  => 'primary',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'primary-menu-container',
			'container_id'    => '',
			'menu_class'      => 'primary-menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		); ?>

		<div class="single-top-menu">
			<button type="button" class="reveal-single-menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if ( has_nav_menu( 'primary' ) ) {
				$menu = wp_nav_menu( $defaults );
			} ?>
		</div>

	</div>
</div>
<!-- End of Navigation Bar -->