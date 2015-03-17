<!-- Services Section -->
<section id="services" class="cbp-so-section" style="<?php custom_bg_section('services_background_settings'); ?>">
	<div class="container cbp-so-side cbp-so-side-top">
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$portfolio_title = ot_get_option( 'services_title' );
		} ?>
		<h1><?php echo $portfolio_title?></h1>

		<?php if ( function_exists( 'ot_get_option' ) ) {
			$services_ID = ot_get_option( 'services_page' );
			$post = get_post($services_ID); 
			$content = $post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			echo $content;
		}
		?>
		
	</div>
</section>
<!-- End of Services Section -->