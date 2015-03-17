<!-- Footer -->
<footer class="footer" style="<?php custom_bg_section('footer_background_settings'); ?>">
	<div class="container">
		<?php if ( function_exists( 'ot_get_option' ) && ot_get_option( 'footer_text' ) != '' ) {
			$footer_text = ot_get_option( 'footer_text' ) ?>
			<p><?php echo $footer_text; ?></p>
		<?php } ?>
	</div>
</footer>

<div class="scrolltotop">
	<i class="fa fa-chevron-up"></i>
</div>
<!-- End of Footer -->


<!-- Javascript files -->
<!-- Placed at the end of the document so the pages load faster -->

<?php wp_footer(); ?>
	
</body>
</html>