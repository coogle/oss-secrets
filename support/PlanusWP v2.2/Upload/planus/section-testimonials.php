<?php 
$args = array(
        'post_type' => 'testimonial'
    );

query_posts($args);
?>

<!-- Testimonials Section -->
<section id="testimonials" class="cbp-so-section" style="<?php custom_bg_section('testimonials_background_settings'); ?>" >
	<div class="container cbp-so-side cbp-so-side-top">
	<?php if ( function_exists( 'ot_get_option' ) ) {
			$testimonials_title = ot_get_option( 'testimonials_title' );
		} ?>
		<h1><?=$testimonials_title?></h1>

		<div class="testimonials">
			<div id="da-slider" class="da-slider">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					$title = str_ireplace('"', '', trim(get_the_title()));
					$desc = str_ireplace('"', '', trim(get_the_content()));
					if ( function_exists( 'ot_get_option' ) ) {
						$test_photo = get_post_meta( $post->ID, 'test_photo', true );
						$test_name = get_post_meta( $post->ID, 'test_name', true );
						$test_title = get_post_meta( $post->ID, 'test_title', true );
					}

					$default_photo = get_bloginfo('template_directory').'/img/default-user-thumb.png';
					$id = custom_get_attachment_id( $test_photo );
					$src = wp_get_attachment_image_src( $id, 'thumbnail' );
				?>

				<div class="da-slide">
					<div class="da-img">
						<div class="round-outline">
						<?php if ($test_photo) {
							echo '<img class="round-photo" src="'.$src[0].'" alt="" />';
						} else {
							echo '<img class="round-photo" src="'.$default_photo.'" alt="" />';
						} ?>
						</div>
					</div>
					<p class="block-cite"><?php echo $test_name; ?>, <?php echo $test_title; ?></p>
					<blockquote><?php echo $desc; ?></blockquote>
				</div>

			<?php endwhile; endif; ?>

				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>

			</div>
		</div>
	</div>
</section>
<!-- End of Testimonials Section -->