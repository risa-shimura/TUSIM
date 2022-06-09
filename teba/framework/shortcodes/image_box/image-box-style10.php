  <div class="thumb-service" style="background-image: url('<?php echo esc_url($attachment_image[0]); ?>');"></div>
  <div class="title-wrap">
  <?php 
	if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	if($content_box)echo '<div class="content">'.$content_box.'</div>';
	if($href)echo '<a class="button btn-txt btn-txt-arrow dark" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link_box) .'</span></a>'; 
  ?>
 </div>