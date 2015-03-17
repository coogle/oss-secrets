<?php 
$args = array(
        'showposts' => '8',
        'post_type' => 'portfolio'
    );

query_posts($args);
?>

<!-- Portfolio Section -->
<section id="portfolio" class="cbp-so-section" style="<?php custom_bg_section('portfolio_background_settings'); ?>" >
	<div class="container cbp-so-side cbp-so-side-top">
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$portfolio_title = ot_get_option( 'portfolio_title' );
		} ?>
		<h1><?php echo $portfolio_title; ?></h1>

		<?php
		$categories = get_terms( 'portfoliocats', array( 'hide_empty' => true ));
		?>
		<ul class="cat-list">
			<li class="filter btn btn-outline-white btn-small" data-filter="all" >All</li>
			
			<?php foreach ($categories as $category) {
				$slug = $category -> slug;
				$name = $category -> name;
				echo "<li class=\"filter btn btn-outline-white btn-small\" data-filter=\"" . $slug . "\">" . $name . "</li>";
			} ?>
		</ul>

		<ul id="portfolio-grid" class="row portfolio-row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
			$title = str_ireplace('"', '', trim(get_the_title()));
			$desc = string_limit_words(get_the_content(), 25);
			$terms = get_the_terms($post->ID, 'portfoliocats');
			$permalink = get_permalink( $id );
			
			if ( $terms && ! is_wp_error( $terms ) ) : 
				$portfolio_links = array();
				$parent = array();
				foreach ( $terms as $term ) {
					$portfolio_links[] = $term->slug;
					$parent[] = $term->parent;
				}			
				$slug = join( " ", $portfolio_links );
				$parent_slug = get_term_by('id', $parent[0], 'portfoliocats');
				$final_parent = $parent_slug -> slug;
				$slug .= " ".$final_parent;
			endif;

		?>

			<li class="portfolio-mix col-md-3 <?php echo $slug ?>">
				<figure class="portfolio-item">
				<?php
				if ( has_post_thumbnail() ) {
					echo '<a href="' . $permalink . '" >';
				}
				?>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive'));
						} ?>
						<div class="caption-bg"></div>
						<h3><?php echo $title; ?></h3>
						<p class="portfolio-item-description">
							<?php echo strip_tags($desc); ?>
						</p>
					</a>
				</figure>
			</li>
		<?php endwhile; endif; ?>
		</ul>
		
		<?php if ( function_exists( 'ot_get_option' ) ) {
			$show_more_work = ot_get_option( 'show_more_work' );
			$text_more_work = ot_get_option( 'text_more_work' );
			$link_more_work = ot_get_option( 'link_more_work' );

			if ( isset($show_more_work) && $show_more_work !== 'off') {
				echo '<p><a class="btn btn-red btn-big btn-rounded" style="display:inline-block;" href="'.( (isset($link_more_work) && $link_more_work !== '') ? $link_more_work : get_post_type_archive_link( 'portfolio' ) ).'">'.$text_more_work.'</a></p>';
			}

		} ?>

	</div>
</section>
<!-- End of Portfolio Section -->