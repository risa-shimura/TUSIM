<div <?php post_class(); ?>>
<div class="portfolio-effect1 <?php echo esc_attr($image_size); ?>">
	<div class="img-inner">
	  <div class="img-portfolio img-perspective" style="background-image:url(<?php echo esc_attr($src_attachment); ?> )">
		<a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" data-title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($full); ?>"></a>	
	  </div>
	</div>

	<div class="caption-inner">
		<a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" data-title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($full); ?>"><h5><?php echo esc_html($title); ?></h5></a>	
		<p class="term"><?php echo esc_html($term_string); ?></p>
	</div>
</div>
</div>