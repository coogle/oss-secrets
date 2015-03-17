<!-- Map Section -->
<section id="map" class="map-section">
	<?php if ( function_exists( 'ot_get_option' ) && ot_get_option( 'map_page' ) !='' ) {
		$page_ID = ot_get_option( 'map_page' );
		$post = get_post($page_ID); 
		$content = $post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	}
	?>
</section>
<!-- End of Map Section -->