<?php get_header( 'page' ); ?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-single'); ?>>

					<?php
						$title = str_ireplace('"', '', trim(get_the_title()));
						$desc = str_ireplace('"', '', trim(get_the_content()));
						if ( function_exists( 'ot_get_option' ) ) {
							$portfolio_images = get_post_meta( $post->ID, 'portfolio_images', true );
						}
					?>

					<div class="post-title portfolio-post-title">
						<?php
							if ( is_single() ) :
								the_title( '<h1>', '</h1>' );
							else :
								the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
							endif;
						?>
					</div>

					<?php if (isset($portfolio_images) && $portfolio_images !== '') { ?>
					<div class="gallery-slider">
						<ul class="bxslider">
						<?php foreach ($portfolio_images as $key => $images) {
							$ids = array(custom_get_attachment_id( $images['upload_portfolio_image'] ));
							foreach ($ids as $id) {
								$src = wp_get_attachment_image_src( $id, 'portfolio-thumbnail' );
								echo '<li class="silviu"><img src="'.$src[0].'" alt="" >';
							}
						} ?>
						</ul>
					</div>
					<?php } else if ( !$portfolio_images && has_post_thumbnail() ) { ?>
					<div class="portfolio-feat-img">
						<?php
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "portfolio-thumbnail" );
						$full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
						$thumb_link = $thumb[0];
						$full_link = $full[0];
						?>
						<a href="<?php echo $full_link; ?>" ><img src="<?php echo $thumb_link; ?>" alt="" ></a>
					</div>
					<?php } ?>

					<div class="post-content">
						<?php the_content(); ?>
					</div><!-- .post-content -->

				</article><!-- #post-## -->
				
			<?php endwhile; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>