<?php
function teba_portfolio_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'image_size'=> 'full',
		'col_lg' =>  4,
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
    ), $atts));
    $class = array();
    $class[] = 'mo-portfolio-carousel clearfix';
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
        'post_type' => 'portfolio',
        'post_status' => 'publish');
		
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
				array(
					'taxonomy' => 'project-type',
					'field' => 'id',
					'terms' => $category
				)
		);
    }
	
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="owl-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
					$title=get_the_title();
					$terms=wp_get_post_terms(get_the_ID(),'project-type');
					$term_string='';
					$k = 1;
					foreach ($terms as $key=>$value) {
						$term_string .= $value->slug ;
						if (count($terms) != $k) {
							$term_string .= ' / ';
						}
						$k++;
					}									 
					$th_is_lightbox = 'lightbox-gallery';
					$thumb = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
					$full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
					$permalink=get_the_permalink();
		
					global $post;
					$attachment = get_the_post_thumbnail( $post->ID , "$image_size");
					$src_attachment = get_the_post_thumbnail_url();
														 
					$portfolio_type = get_post_meta($post->ID, 'link_type', true);
					$video=get_post_meta(get_the_ID(),'link_url',true);
					$url=get_post_meta(get_the_ID(),'url',true);
					if($portfolio_type == 'direct' && !empty($video) )
					{
						$full=$video;
						$th_is_lightbox = 'lightbox-video';
					}
					if( $portfolio_type == 'external' && !empty($url) )
					{
						$full=$url;
						$th_is_lightbox = '';
					}
					if( $portfolio_type == 'single_page')
					{
						$full= get_the_permalink();
						$th_is_lightbox = '';
					}
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
if(function_exists('teba_shortcode')) { teba_shortcode('portfolio_carousel', 'teba_portfolio_carousel_func'); }