<div <?php post_class(); ?>>
  <div class="masonry-img work-img">
   <div class="portfolio-effect3">
	 <div class="wrapper">
	   <?php echo '<div>'.$attachment.'</div>';?>
	   <div class="details">
		    <h5><a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" href="<?php echo esc_url($full); ?>"><?php the_title(); ?></a></h5>
			   <p><?php echo esc_html($term_string); ?></p>
		</div> <!-- details --> 
	 </div> <!-- wrapper --> 
	</div>
  </div>
</div>