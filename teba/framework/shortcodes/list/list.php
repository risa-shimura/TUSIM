<?php
function teba_list_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'list_style' => 'list-style1',                  
        'list' => '',                  
		'list_item' => '',
	    'el_class' => '',
	), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$class = array();
	$class[] = 'list';
	$class[] = $el_class;
	$lists = array();
    $lists = (array) vc_param_group_parse_atts($list); 
    ob_start(); ?>
	<div class="lists">
		<div class="list-content <?php echo esc_attr(implode(' ', $class));?> ">

			<?php if($list_style == 'list-style4' || $list_style == 'list-style5' || $list_style == 'list-style6') { ?>
				<ol class="list-style <?php echo esc_attr($list_style); ?>">
					<?php foreach ($lists as $key => $value) { ?>
						<li>
							<h4><?php echo esc_html($value['list_item']); ?></h4>
							<?php if( !empty($value['list_description']) ) { ?><p><?php echo esc_html($value['list_description']); ?></p><?php } ?>
						</li>
					<?php } ?>
				</ol>
			<?php } else { ?>
				<ul class="list-style <?php echo esc_attr($list_style); ?>">
					<?php foreach ($lists as $key => $value) { ?>
						<li>
							<h4><?php echo esc_html($value['list_item']); ?></h4>
							<?php if( !empty($value['list_description']) ) { ?><p><?php echo esc_html($value['list_description']); ?></p><?php } ?>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>   
    <?php return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('list', 'teba_list_func'); }