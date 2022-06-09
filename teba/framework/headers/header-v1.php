<!-- Start Header -->
<?php 
	global $teba_options;
	$class_header = 'mo-sidepanel';
	if(isset($teba_options['fixed_main_menu_v1']) && $teba_options['fixed_main_menu_v1']) {
		$class_header .= ' mo-header-fixed';
    }
    $menu_color_v1 =& $teba_options["menu_color_v1"];
	$layout_menu_v1 =& $teba_options["layout_menu_v1"];
    if ( $layout_menu_v1 == 'left' ){
		$classes[] = 'left';
      } else {
		$classes[] = 'right';
	}
?>
<header id="header">
      <div id="mo_header" class="mo-header-v1 <?php echo esc_attr($class_header); ?> <?php echo esc_attr($layout_menu_v1);?> <?php echo esc_attr($menu_color_v1); ?>">
           
		 <div class="top-bar">
			<div class="logo"> 
			   <a href="<?php echo esc_url(home_url('/')); ?>">
				 <?php teba_logo(); ?>
			   </a>
            </div><!-- End logo -->
            
           
		 </div><!-- End top-bar -->
           
		 <div class="side-bar">
			<div class="menu-toggle">
			   <span class="navbar-toggler-icon"><span class="navbar-toggler-icon-close"></span></span>
			   <span class="navbar-toggler-label"><?php echo esc_html__( 'Menu', 'teba' ); ?></span>
		    </div>
		    
		 </div><!-- End side-bar --> 
              
      </div><!-- End mo-header-v1 -->
      <div class="mo-sidepanel-v1 sidepanel <?php echo esc_attr($layout_menu_v1); ?>_anim full-nav <?php echo esc_attr($layout_menu_v1);?>">
           <a id="menu-close" href="#" class="close-btn"><span></span></a>
            <nav class="sidepanel-content">
               <?php
                $attr = array(
                    'container_class' => 'nav-sidepanel',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                );
                /* Select menu dynamic */
                $menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
                if($menu_slug != '' && $menu_slug != 'global') {
                    $attr['menu'] = $menu_slug;
                }
                /* Select menu position */
                $menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
                $attr['menu_class'] = 'text-center';
                if($menu_class != '' && $menu_class != 'global') {
                    $attr['menu_class'] = $menu_class;
                }
                /* Select theme location */
                $menu_locations = get_nav_menu_locations();
                if (!empty($menu_locations['main_navigation'])) {
                    $attr['theme_location'] = 'main_navigation';
                    wp_nav_menu( $attr );
                } else {
                    $attr = array(
                        'menu_class'  => 'menu mo-menu-list',
                    );
                    wp_page_menu($attr);
                }
            ?>
            </nav>
      </div>
      <?php $switch_header_social_v1 =& $teba_options["switch_social_v1"];
			if($switch_header_social_v1 == 1){ ?>
			   <div class="social-sidepanel <?php echo esc_attr($class_header); ?> <?php echo esc_attr($menu_color_v1); ?>">
				 <ul class="social_list social-color-hr">
				   <?php teba_top_social(); ?>
				 </ul>
			   </div>
          <?php } ?>
          <?php if(isset($teba_options['text_v1']) AND $teba_options['text_v1'] !='') { ?>
			    <div class="text-sidepanel text_v1 <?php echo esc_attr($class_header); ?> <?php echo esc_attr($menu_color_v1); ?>"> <div class="text_content_v1"><?php echo wptexturize($teba_options['text_v1']);?></div></div>
          <?php } ?>
</header>