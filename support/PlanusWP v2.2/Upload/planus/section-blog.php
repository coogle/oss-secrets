<?php 
$args = array(
        'showposts' => '4',
        'post_type' => 'post'
    );

query_posts($args);
?>

<!-- Blog Section -->
<section id="blog" class="cbp-so-section" style="<?php custom_bg_section('blog_background_settings'); ?>">
	<div class="container cbp-so-side cbp-so-side-top">
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$blog_title = ot_get_option( 'blog_title' );
		} ?>
		<h1><?=$blog_title?></h1>


		<ul class="row blog-row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
			$title = str_ireplace('"', '', trim(get_the_title()));
			$permalink = get_permalink( $id );
			$desc = string_limit_words(get_the_excerpt(), 20);
		?>

			<li class="col-md-3">
				<figure class="blog-item">
				<?php echo '<a href="'.$permalink.'" >'; ?>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive'));
						} else {
							echo '<img width="260" height="320" class="img-responsive wp-post-image" src="'.get_bloginfo('template_directory').'/img/blog-placeholder.png" alt="'.$title.'" >';
						} ?>
						<div class="caption-bg"></div>
						<h3><?php echo $title?></h3>
						<p class="blog-item-description"><?php echo strip_tags($desc); ?></p>
					</a>
				</figure>
			</li>
		<?php endwhile; endif; ?>
		</ul>
		
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$text_read_blog = ot_get_option( 'text_read_blog' );
			$select_blog_page = ot_get_option( 'select_blog_page' );
			if ($select_blog_page) {
				$blog_url = get_permalink($select_blog_page);
				echo "<p><a class=\"btn btn-red btn-big btn-round\" href=\"" . $blog_url . "\" target=\"_blank\">" . $text_read_blog . "</a></p>";
			}
		} ?>

	</div>
</section>
<!-- End of Blog Section -->