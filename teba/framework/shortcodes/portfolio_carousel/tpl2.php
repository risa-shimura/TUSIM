<div <?php post_class(); ?>>
 <div class="portfolio-effect2">
	   <div class="img-inner">
	      <?php echo '<div>'.$attachment.'</div>';?>
		    <div class="icon-arrow"></div>
		    <div class="overlay"></div>
		</div>
		<div class="content-block">
		    <a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" href="<?php echo esc_html($full); ?>"><h4><?php echo esc_html($title); ?></h4></a>
			<h6 class="read-more"><?php echo esc_html($term_string); ?></h6>
		</div>
	</div>
</div>