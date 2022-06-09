<?php
// testimonial carousel
function motivoweb_testimonial_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    'tpl'      =>  'tpl1',
		'text_color' =>  'black_txt',
		'col_lg' =>  1,
		'col_md' =>  1,
		'col_sm' =>  1,
		'col_xs' =>  1,
		'smartspeed' =>  500,
		'item_space' =>  0,
		'loop' =>  'false',
		'autoplay' =>  'false',
		'nav' =>  'false',
		'nav_position' =>  'nav-middle',
		'dots' =>  'false',
		'dots_dir_position' =>  'dots-center',
		'dots_nav_color' =>  'primary',
		'el_class' => '',
    ), $atts));
    $class = array();
    $class[] = 'mo-testimonial-carousel';
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $dots_nav_color;
	$class[] = $text_color;
    $class[] = $tpl;
    $class[] = $el_class;
    ob_start();  ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			 <div class="testimonial-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				 <?php echo do_shortcode($content) ?>
			</div>
		</div>
    <?php
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('testimonial', 'motivoweb_testimonial_carousel_func'); }
// single_testimonial
function motivoweb_single_testimonial_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'author'   =>  '',
		'position' =>  '',
		'image'    =>  '',
		'title'    =>  '',
		'details'  =>  '',
	    'rating'   =>  '',
		'star_rating' =>  '',
    ), $atts));
    ob_start();?>
		
	<div class="item">
        <?php $attachment_image = wp_get_attachment_image_src($image, 'full', false); if($attachment_image[0]) { echo '<div class="top testimonial-avatar"><figure><img src="'.esc_url($attachment_image[0]).'" alt="'.esc_html($author).'"/></figure></div>'; } ?>
		<div class="testimonial-details">
		    <?php if($rating) echo '<span class="star-rating '.($star_rating).'"></span>'; ?>
			<div class="content"> <?php if($title) echo'<h4>'.($title).'</h4>'; if($details) echo'<p>'.($details).'</p>'; ?></div><!-- content  --> 
			<div class="testimonial-title">
			  <?php $attachment_image = wp_get_attachment_image_src($image, 'full', false); if($attachment_image[0]) { echo '<div class="sec testimonial-avatar"><figure><img src="'.esc_url($attachment_image[0]).'" alt="'.esc_html($author).'"/></figure></div>'; } ?>
			  <?php if($author) echo '<h5>'.esc_html($author).'</h5>'; ?>
			  <?php if($position) echo '<h6>'.esc_html($position).'</h6>'; ?>
			</div><!-- testimonial-details --> 
		</div>
	</div><!-- item --> 
   
    <?php wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('single_testimonial', 'motivoweb_single_testimonial_func'); }