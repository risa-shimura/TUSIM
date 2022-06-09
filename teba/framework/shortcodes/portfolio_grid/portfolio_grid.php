<?php
function teba_portfolio_grid_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'show_filter'=> 'true',
		'align_filter'=> 'center',
		'all_filter' => 'All',
		'tpl'        => 'grid',
		'image_size' => 'full',
		'column'     => 'col-3',
		'margin'     => '5',
		'posts_per_page' => -1,
		'typenavigation' => 'none',
		'orderby'    => 'none',
        'order'      => 'none',
		'animation_css' => '',
    ), $atts));
	$animate_delay = 0;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$html='';
	if( $show_filter == 'true' ) { 
		$html.='<div class="portfolio-filter '.esc_attr($align_filter).'">';
		$html.="<a href='#' class=\"filter transition item-active \"  data-filter=\"*\" >".esc_attr($all_filter)."</a>";
		$args=array(
			'hierarchical'=>false,
			'parent'=>0,
			'taxonomy'=>'project-type'
		);
		$categories = get_categories( $args );
		if(!empty($categories))
		{
			foreach($categories as $key=>$value){
				$html.="<a href='#' class=\"filter transition\" data-filter='.{$value->slug}'>{$value->name}</a>";
			}
		}
		$html.='</div><!--End .portfolio-filter -->'; 
	} 
	$html.='<div class="blog-posts more-posts-wrapper"> '; 
    $html.="<div class=\"grid masonry \">"; 
    $args=array(
        'paged' => $paged,
		'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'portfolio',
        'post_status' => 'publish'
    );
	$wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
		$count = 0; while ( $wp_query->have_posts() ) { $wp_query->the_post();
        $terms= wp_get_post_terms(get_the_ID(),'project-type');
        $term_string='';
		$k = 1;
		foreach ($terms as $key=>$value) {
			$term_string .= $value->slug ;
			if (count($terms) != $k) {
				$term_string .= ' / ';
			}
			$k++;
		}
		$portfolio_grid = '';
        if($margin) $portfolio_grid = 'margin:'.$margin.'px;';
		$title=get_the_title();
        $th_is_lightbox = 'lightbox-gallery';
													   
		$thumb = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $permalink=get_the_permalink($image_size);
        global $post;
													   
		$attachment = get_the_post_thumbnail( $post->ID , "$image_size");
		$src_attachment = get_the_post_thumbnail_url();

	    $portfolio_type = get_post_meta($post->ID, 'link_type', true);
        $video= get_post_meta(get_the_ID(),'link_url',true);
        $url= get_post_meta(get_the_ID(),'url',true);
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
		$posts = $wp_query->posts;
		foreach($posts as $post) {
					$animate_delay +=2;
					$anim_delay = 'data-wow-delay=.'.$animate_delay.'s';
		}			
		$html .= '<div class="post post-item"  >'; 											   
		include $tpl.'.php';
		$html .= '</div><!--End .post -->'; 											   
        $count++;
		wp_reset_postdata();
	    }
	}
	$html.="</div>"; 
	$html.= teba_pagination($wp_query, $typenavigation);
	$html.="</div><!--End .more-posts-wrapper -->"; 
    return $html;
} 
if(function_exists('teba_shortcode')) { teba_shortcode('portfolio_grid', 'teba_portfolio_grid_func'); }