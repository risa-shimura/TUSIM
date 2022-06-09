<?php
function teba_image_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'images' => '',
		'image_size' => 'full',
		'click_action' => '',
		'custom_links' => '',
		'col_lg' =>  6,
		'col_md' =>  4,
		'col_sm' =>  3,
		'col_xs' =>  1,
		'item_space' =>  15,
		'loop' =>  'false',
		'autoplay' =>  'false',
		'smartspeed' =>  500,
		'nav' =>  'false',
		'nav_position' =>  '',
		'dots' =>  'false',
		'dots_dir_position' =>  '',
		'dots_nav_color' =>  'primary',
		'el_class' => '',
    ), $atts));
	//$content = wpb_js_remove_wpautop($content, true);
	$image_ids = $image_links = array();
	$image_ids = explode(',', $images);
	$image_links = explode(',', $custom_links);
    
	$class = array();
	$class[] = 'mo-image-carousel-wrap';
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $dots_nav_color;
    $class[] = $el_class;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="image-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				<?php
					foreach($image_ids as $key => $image_id) {
						$full_img = wp_get_attachment_image_src ( $image_id, 'full' );
						$attachment = wp_get_attachment_image_src ( $image_id, $image_size );
						$image_link = (isset($image_links[$key]) && $image_links[$key] != '') ? $image_links[$key] : '#';
						switch ($click_action) {
							case 'custom_links':
								echo '<a href="'.esc_url($image_link).'" target=”blank”><img src="'.esc_url($attachment[0]).'" alt="'.esc_attr__('image','teba').'"/></a>';
								break;
							case 'light_box':
								echo '<a class="lightbox" data-image="lightbox-thumbnail" href="'.esc_url($full_img[0]).'"><img src="'.esc_url($attachment[0]).'" alt="'.esc_attr__('image','teba').'"/></a>';
								break;
							default:
								echo '<img src="'.esc_url($attachment[0]).'" alt="'.esc_attr__('image','teba').'"/>';
								break;
						}
					}
				?>
			</div>
		</div>
    <?php
    return ob_get_clean();    		
}
if(function_exists('teba_shortcode')) { teba_shortcode('image_carousel', 'teba_image_carousel_func');}