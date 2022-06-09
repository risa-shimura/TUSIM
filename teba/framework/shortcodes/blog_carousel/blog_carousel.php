<?php
function teba_blog_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'col_lg' =>  3,
		'col_md' =>  3,
		'col_sm' =>  2,
		'col_xs' =>  1,
		'item_space' =>  30,
		'loop' =>  'false',
		'autoplay' =>  'false',
		'smartspeed' =>  500,
		'nav' =>  'false',
		'nav_position' =>  '',
		'dots' =>  'false',
		'dots_dir_position' =>  '',
		'dots_nav_color' =>  'primary',
        'el_class' => '',
        'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
	    'excerpt_lenght' => 15,
    ), $atts));
    $class = array();
    $class[] = 'mo-blog-carousel clearfix';
    $class[] = $tpl;
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $dots_nav_color;
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'post',
        'post_status' => 'publish');
		
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
	
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) { ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="owl-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
					global $post;
				    include $tpl.'.php';
				 } ?>
			</div>
		</div>
    <?php
	} else {
		echo esc_html_e('Post not found!', 'teba');
    }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('blog_carousel', 'teba_blog_carousel_func'); }