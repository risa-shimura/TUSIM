<?php
function teba_team_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl'            =>  'tpl1',
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
        'el_class'       => '',
    ), $atts));
    $class = array();
    $class[] = 'mo-team';
    $class[] = $tpl;
    $class[] = $el_class;
	ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
	    <figure class="team-member"> 
           <?php 
		      $attachment_image = wp_get_attachment_image_src($image, 'full', false); 
		      if($attachment_image[0]) { echo '<div class="team-img"><img src="'.esc_url($attachment_image[0]).'" alt="'.esc_html($name).'"/><div class="overlay"></div></div>';
		    } ?>
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
		 <div class="team-title">
	       	   <?php if($name) echo '<h5>'.esc_html($name).'</h5>'; ?>
			   <?php if($position) echo '<h6>'.esc_html($position).'</h6>'; ?>
			   
		   </div>
		</figure>
	</div>
	<?php return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('team', 'teba_team_func'); }