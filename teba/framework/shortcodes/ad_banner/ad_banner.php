<?php
function teba_ad_banner_func($atts, $ad_content = null) {
    extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
		'ad_suptitle' => '',
		'ad_content' => '',
		'link' => '',
		'el_class' => '',
    ), $atts));
	$ad_content = wpb_js_remove_wpautop($ad_content, true);
    $class = array();
	$class[] = 'mo-ad-banner';
	$class[] = $el_class;
    ob_start();
    ?>
    <div class="ad_banner">
       <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
       
         <?php if($link) echo '<a href="'. esc_url($link). '">'; ?>
         
       <?php if($image) {
			echo '<figure> '.wp_get_attachment_image($image, 'full') .'</figure>';
		}?>
		 <div class="overlay-effect">
			<div class="overlay-inner">
              <?php if($ad_suptitle) echo '<p class="sup-title">'.esc_html($ad_suptitle).'</p>'; ?>
	          <?php if($title) echo '<h4 class="title">'.esc_html($title).'</h4>'; ?>
		      <?php if($ad_content) echo '<div class="content">'. $ad_content .'</div>'; ?>
            
            </div>
		 </div>	
		   <?php if($link) echo '</a>'; ?>
	  </div>
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('ad_banner', 'teba_ad_banner_func');}