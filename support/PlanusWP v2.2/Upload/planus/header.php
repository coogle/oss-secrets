<!DOCTYPE html>
<html class="no-js">
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
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


<?php echo '<body data-spy="scroll" data-target="#my-nav" id="cbp-so-scroller" class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<?php $menu_classes=''; ?>
<?php if ( function_exists( 'ot_get_option' ) ) {
	$menu_style = ot_get_option('menu_style');
	if ($menu_style == "white_menu") {
		$menu_classes = 'navbar navbar-fixed-top';
	} else if ($menu_style == "black_menu") {
		$menu_classes = 'navbar navbar-transparent navbar-fixed-top';
	}
} else {
	$menu_classes = 'navbar navbar-fixed-top';
}?>

<!-- Navigation Bar -->
<div class="fallback-alert">
	<p>Our website works best with Javascripts enabled!</p>
</div>
<div class="<?php echo $menu_classes; ?>">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
		<?php if ( function_exists( 'ot_get_option' ) ) : ?>
			<?php $logo_normal = ot_get_option( 'logo_upload' ); ?>
			<?php $logo_white = ot_get_option( 'white_logo' ); ?>
			<?php $logo_choice = ot_get_option( 'logo_choice' ); ?>
			<?php $blog_title = get_bloginfo('name'); ?>

			<?php if ( ! empty( $logo_normal )) { 
				if ($logo_choice == "white_website_logo") {
					echo '<a class="navbar-brand" href="#"><img class="logo" src="'.$logo_white.'" alt=""></a>';
				} else {
					echo '<a class="navbar-brand" href="#"><img class="logo" src="'.$logo_normal.'" alt=""></a>';
				}
			 } else { ?>
				<h1 class="clearfix"><a class="navbar-brand navbar-brand-title" href="<?php echo site_url(); ?>"><?php echo $blog_title; ?></a></h1>
			<?php } ?>

		<?php endif; ?>

		</div>

		<nav id="my-nav" class="navbar-collapse collapse" role="navigation">
				<?php dynamic_menu(); ?>
		</nav><!--/.navbar-collapse -->

	</div>
</div>
<!-- End of Navigation Bar -->