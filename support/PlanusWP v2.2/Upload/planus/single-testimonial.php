<?php get_header( 'page' ); ?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('testimonial-single'); ?>>

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

					<div class="round-outline">
					<?php if ($test_photo) {
						echo '<img class="round-photo" src="'.$src[0].'" alt="" />';
					} else {
						echo '<img class="round-photo" src="'.$default_photo.'" alt="" />';
					} ?>
					</div>

					<div class="post-title">
						<?php
							if ( is_single() ) :
								the_title( '<h1>', '</h1>' );
							else :
								the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
							endif;
						?>
					</div>
					
					<p class="block-cite"><?php echo $test_name; ?>, <?php echo $test_title; ?></p>

					<div class="post-content post-content-testimonial">
						<?php the_content(); ?>
					</div><!-- .post-content -->

				</article><!-- #post-## -->
				
			<?php endwhile; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>