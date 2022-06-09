<?php
function teba_social_accounts_func($atts, $content = null) {
   extract(shortcode_atts(array(
     	'social_networks' => '',                  
        'social_icons' => '',  
		'soc_url' => '',
		'style' => 'style1',
	   	'color' => 'colors',
		'alignment' => 'center',
	    'el_class' => '',
    ), $atts));
    ob_start();
    $uniqid = uniqid('social-icon-').'-'.rand(1,9999);
	$class = array();
	$class[] = $style;
	$class[] = $color;
	$class[] = $alignment;
	$class[] = $el_class;
    ob_start();
    if(isset($social_networks) && !empty($social_networks)) {
	$social_networks = (array) vc_param_group_parse_atts( $social_networks ); ?>
	<div id="<?php echo esc_attr($uniqid); ?>" class="social-icons <?php echo esc_attr(implode(' ', $class)); ?>">
		<div class="social-icon-container">
			<?php foreach($social_networks as $network) {
				$icon_style_html = $single_icon = $link_atts_url  = '';
				if(isset($network['social_icons']) && isset($network['soc_url'])) {
					if(isset($network['social_icons'])) {
						$single_icon = $network['social_icons'];
					}
					if(isset($network['soc_url'])) {
						$link = vc_build_link($network['soc_url']);
					}
					if(isset($link['url']) && !empty($link['url'])) {
						$link_atts_url = $link['url'];
					}
			        $target = (empty($link['target'])) ? '_self' : $link['target'];
			        ?>
					<a href="<?php echo esc_url($link_atts_url); ?>" class="<?php echo esc_attr($single_icon);?>" target="<?php echo esc_attr($target); ?>"><i class="fa fa-<?php echo esc_attr($single_icon); ?> "></i></a>
				<?php }
			} ?>
	   </div>
	</div>
 	<div class="clearfix"></div>
<?php }
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('social_accounts', 'teba_social_accounts_func');}