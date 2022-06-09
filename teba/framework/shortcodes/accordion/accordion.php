<?php
function teba_accordion_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'accordion_style' => 'accordion-style1',                  
        'accordion' => '',                  
		'accordion_item' => '',
	    'el_class' => '',
	), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$class = array();
	$class[] = 'accordion';
	$class[] = $accordion_style;
	$class[] = $el_class;
	$accordions = array();
    $accordions = (array) vc_param_group_parse_atts($accordion); 
    ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class));?>">
		<ul id="my-accordion" class="accordionjs">
		    <?php foreach ($accordions as $key => $value) { ?>
				<li>
					<div><h6><?php echo esc_html($value['accordion_item']); ?></h6><span class="accordion-icon"></span></div>
					<div><?php if( !empty($value['accordion_description']) ) { ?><p><?php echo esc_html($value['accordion_description']); ?></p><?php } ?></div>
				</li>
			<?php } ?>
		</ul>
	</div>
    <?php return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('accordion', 'teba_accordion_func'); }