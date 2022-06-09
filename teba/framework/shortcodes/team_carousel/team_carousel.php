<?php
function teba_team_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl'    =>  'tpl1',
		'col_lg' =>  4,
		'col_md' =>  2,
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
        'el_class'       => '',
    ), $atts));
    $class = array();
    $class[] = 'mo-team';
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $dots_nav_color;
    $class[] = $tpl;
    $class[] = $el_class;
	ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		 <div class="owl-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
			 <?php echo do_shortcode($content) ?>
		</div>
	</div>
	<?php 
	wp_reset_postdata();
	return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('team_carousel', 'teba_team_carousel_func'); }

// single_team_carousel
function motivoweb_single_team_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'image'          =>  '',
		'name'           =>  '',
		'position'       =>  '',
        'facebook_link'  =>  '',
		'twitter_link'   =>  '',
		'linkedin_link'  =>  '',
		'behance_link'   =>  '',
		'pinterest_link' =>  '',
		'instagram_link' =>  '',
		'flickr_link'    =>  '',
		'skype_link'     =>  '',
		'youtube_link'   =>  '',
		'extra_link'     =>  '',
    ), $atts));
    ob_start();  ?>
	 <figure class="team-member"> 
	   <?php 
		  $attachment_image = wp_get_attachment_image_src($image, 'full', false); 
		  if($attachment_image[0]) { echo '<div class="team-img"><img src="'.esc_url($attachment_image[0]).'" alt="'.esc_html($name).'"/><div class="overlay"></div></div>';
		  } ?>
	   <div class="team-title">
		   <?php if($name) echo '<h5>'.esc_html($name).'</h5>'; ?>
		   <?php if($position) echo '<h6>'.esc_html($position).'</h6>'; ?>
	   </div>
	   <div class="team-social social-icons style1">
		  <?php
		  if($facebook_link) echo '<a href="'.esc_url($facebook_link).'" target="_blank" class="facebook"><span class="fa fa-facebook"></span></a>';
		  if($twitter_link) echo '<a href="'.esc_url($twitter_link).'" target="_blank" class="twitter"><span class="fa fa-twitter"></span></a>';
		  if($linkedin_link) echo '<a href="'.esc_url($linkedin_link).'" target="_blank" class="linkedin"><span class="fa fa-linkedin"></span></a>';
		  if($pinterest_link) echo '<a href="'.esc_url($pinterest_link).'" target="_blank" class="pinterest"><span class="fa fa-pinterest"></span></a>';
		  if($instagram_link) echo '<a href="'.esc_url($instagram_link).'" target="_blank" class="instagram"><span class="fa fa-instagram"></span></a>';
		  if($flickr_link) echo '<a href="'.esc_url($flickr_link).'" target="_blank" class="flickr"><span class="fa fa-flickr"></span></a>';
		  if($behance_link) echo '<a href="'.esc_url($behance_link).'" target="_blank" class="behance"><span class="fa fa-behance"></span></a>';
		  if($skype_link) echo '<a href="'.esc_url($skype_link).'" target="_blank" class="skype"><span class="fa fa-skype"></span></a>';
		  if($youtube_link) echo '<a href="'.esc_url($youtube_link).'" target="_blank" class="youtube"><span class="fa fa-youtube"></span></a>';
		  if($extra_link) echo '<a href="'.esc_url($extra_link).'" target="_blank" class="pinterest"><span class="fa fa-link"></span></a>';
		 ?>
	 </div>
	</figure>
    <?php wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('single_team_carousel', 'motivoweb_single_team_carousel_func'); }