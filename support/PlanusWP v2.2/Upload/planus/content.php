<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Planus
 * @since Planus 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail( $post->ID )) : ?>
	<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'excerpt-thumbnail' ); ?>
	<?php endif; ?>

	<div class="post-title">
		<?php
			if ( is_single() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
	</div>


	<div class="single-post-meta">
		<i class="fa fa-calendar"></i>
		<span class="single-meta-date"><?php the_time('M j, Y'); ?></span>
		<?php if ( ! is_post_type_archive('portfolio') ) : ?>
			<i class="fa fa-folder"></i>
			<span class="single-meta-cat"><?php the_category(', '); ?></span>
		<?php endif; ?>
	</div><!-- .single-post-meta -->
	

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-featured-image">
		<img src="<?php echo $image_src[0] ?>" alt="" />
	</div><!-- .post-thumbnail -->
	<?php } ?>
	

	<?php if ( is_single() ) : ?>

	<div class="post-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'planuswp' ) );
		?>
	</div><!-- .post-content -->

	<?php else : ?>

	<div class="post-summary">
		<?php the_excerpt(); ?>
	</div><!-- .post-summary -->

	<?php endif; ?>


	<?php if ( has_tag() ) : ?>
	<div class="single-post-meta">
		<i class="fa fa-tags"></i>
		<span class="single-meta-tags"><?php the_tags(); ?></span>
	</div><!-- .single-post-meta -->
	<?php endif; ?>


</article><!-- #post-## -->