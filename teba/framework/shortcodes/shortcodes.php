<?php
$elements = array(
	'video_button',
	'countdown',
	'counter_up',
	'button',
	'icon_box',
	'flip_box',
	'image_box',
	'title_box',
	'process_box',
	'package_box',
	'image_carousel',
	'ad_banner',
	'map',
	'blog',
	'blog_carousel',
	'portfolio_carousel',
	'portfolio_grid',
	'team',
	'team_carousel',
	'testimonial',
    'timeline',
	'image_layers',
	'social_accounts',
	'list',
	'accordion',
	'fancy_heading',
	'fancy_image',
	'textillate'
);
foreach ($elements as $element) {
	include TEBA_ABS_PATH_FR .'/shortcodes/'. $element .'/'. $element.'.php';
}

if(class_exists('Woocommerce')){
	$wooshops = array(
		'product_grid',
		'product_carousel',
	);
	foreach ($wooshops as $wooshop) {
		include TEBA_ABS_PATH_FR .'/shortcodes/'. $wooshop .'/'. $wooshop.'.php';
	}
}