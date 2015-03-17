<?php get_header( 'page' ); ?>

<section class="content">
	<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the post format-specific template for the content. If you want to
		 * use this in a child theme, then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
		get_template_part( 'content', get_post_format() );
?>

<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			comments_template('', true);
		}
	endwhile;
?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>