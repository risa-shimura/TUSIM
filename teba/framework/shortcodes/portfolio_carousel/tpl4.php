<div <?php post_class(); ?>>
	<div class="portfolio-effect4 <?php echo esc_attr($image_size); ?>">
	   <a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" data-title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($full); ?>">
			<div class="img-inner"><div class="img-perspective" style="background-image: url(<?php echo esc_html( $src_attachment); ?>)"></div></div>
			
			<div class="overlay-inner"></div>
			<div class="perspective-caption">
				<h5><?php the_title(); ?></h5>
				<p class="term"><?php echo esc_html($term_string); ?></p>
			</div>
	   </a>
	</div>
</div>