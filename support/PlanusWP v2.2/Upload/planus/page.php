<?php get_header('page'); ?>
<!-- Begin Container -->
<div class="container">
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

		endwhile;
	?>
</div>
	<!-- End Container -->
	<div class="clear"></div>

</div><!-- End Wrapper -->
<?php get_footer(); ?>