<?php
/*
Template Name: Blog Template
*/
?>
<?php  	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'post',
			'paged' => $paged
		);
		query_posts($args) ?>

<?php get_header( 'page' ); ?>

<section class="content">
	<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				planuswp_pagination();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
