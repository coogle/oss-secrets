<!-- About Section -->
<section id="about" class="cbp-so-section" style="<?php custom_bg_section('about_background_settings'); ?>">
	<div class="container cbp-so-side cbp-so-side-top">

		<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$about_title = ot_get_option( 'about_title' );
				if ($about_title != "") {
					echo '<h1>'.$about_title.'</h1>';
				}
			}
		?>

		<div class="row">

		<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$about_images = ot_get_option( 'about_images', array() );
				$count_images = count($about_images);
				$image_class = "col-sm-2 ";
				if ($count_images == 1) {
					$image_class_offset = "col-sm-offset-5";
				} else if ($count_images == 2) {
					$image_class_offset = "col-sm-offset-4";
				} else if ($count_images == 3) {
					$image_class_offset = "col-sm-offset-3";
				}
			}

			if ( ! empty( $about_images ) ) {
			    foreach( $about_images as $key => $image ) {
					$id = custom_get_attachment_id( $image['about_image'] );
					$src = wp_get_attachment_image_src( $id, 'thumbnail' );
					$src_big = wp_get_attachment_image_src( $id, 'medium' );

					reset($about_images);
					if ($key === key($about_images)) {
						$image_class .= $image_class_offset;
					} else {
						$image_class = "col-sm-2";
					}

				echo '<div class="'.$image_class.'">';
					echo '<figure class="round-outline">';
						echo '<a href="'.$src_big[0].'" class="round-photo-anchor" rel="prettyPhoto[about-gal]">';
							echo '<img class="round-photo img-responsive" src="'.$src[0].'" alt="">';
							echo '<div class="round-caption-bg"></div>';
							echo '<i class="fa fa-search fa-lg"></i>';
						echo '</a>';
					echo '</figure>';
				echo '</div>';

			    }
			}

		?>

		</div>

		<?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$about_content = ot_get_option( 'about_content' );
				if ($about_title != "") {
					echo do_shortcode( $about_content );
				}
			}
		?>

		<?php insertSocialIcons(); ?>

	</div>
</section>
<!-- End of About Section -->