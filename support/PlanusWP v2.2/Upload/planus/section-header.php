<!-- Welcome Screen -->
<section class="jumbotron" id="header" style="<?php custom_bg_section('welcome_screen_settings'); ?>" >
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="main-photo" id="header-photo">
				<?php if ( function_exists( 'ot_get_option' ) &&  ot_get_option( 'welcome_logo' ) != '' ) {
					$welcome_logo = ot_get_option( 'welcome_logo' ); ?>
					<figure class="round-outline">
						<img class="round-photo" src="<?php echo $welcome_logo ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
					</figure>
				<?php } ?>
				</div>
				<h1>
					<?php if ( function_exists( 'ot_get_option' ) ) {
						$welcome_title = ot_get_option( 'welcome_title' );
						$blog_title = get_bloginfo('name');
						if ( ! empty($welcome_title) ) {
							echo $welcome_title;
						} else {
							echo "Hey, here is " . $blog_title ;
						}
					} ?>
				</h1>
				<p>
					<?php if ( function_exists( 'ot_get_option' ) ) {
						$welcome_description = ot_get_option( 'welcome_description' );
						$blog_description = get_bloginfo('description');
						if ( ! empty($welcome_description) ) {
							echo $welcome_description;
						} else {
							echo $blog_description;
						}
					} ?>
				</p>

				<?php if ( function_exists( 'ot_get_option' ) ) {
					$show_contact_button = ot_get_option( 'show_contact_button' );
					$text_contact_button = ot_get_option( 'text_contact_button' );
					$link_contact_button = ot_get_option( 'link_contact_button' );

					if ($show_contact_button == 'on') {
						echo '<p><a class="btn btn-white btn-big btn-round" href="' . $link_contact_button . '">' . $text_contact_button . '</a></p>';
					} else {
						echo '';
					}

				} ?>

			</div>
		</div>
	</div>
</section>
<!-- End of Welcome Screen -->