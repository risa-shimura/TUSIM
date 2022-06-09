<!-- Start Header -->
<?php 
	global $teba_options;
	$class_header = 'mo-header-v3';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($teba_options['fixed_main_menu_v3']) && $teba_options['fixed_main_menu_v3']) {
			$class_header .= ' mo-header-stick';
		}
	}
    $menu_color_v3 =& $teba_options["menu_first_level_color_v3"];
    $menu_color_stick_v3 =& $teba_options["menu_first_level_color_stick_v3"];
?>
<header id="mo_header" class="<?php echo esc_attr($class_header); ?>">
 <div class="mo-header-menu <?php echo esc_attr($menu_color_v3); ?> <?php echo esc_attr($menu_color_stick_v3); ?>">
	  <div class="container-fluid ">
	   <div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
		<div class="navigation">
		    <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php teba_logo(); ?></a></div>

		    <div class="menu_other_v3 hidden-sm hidden-xs">
				<?php if (isset($teba_options['menu_other_v3']) && is_array($teba_options['menu_other_v3']) && in_array('button', $teba_options['menu_other_v3'])) {  ?>
					<div class="call-us"><span><?php echo esc_html($teba_options['menu_other_but_ques_v3']);?> </span><a href="<?php echo esc_url($teba_options['menu_other_but_link_v3']);?>"><?php echo esc_html($teba_options['menu_other_but_v6']);?></a> <span class="menu-divider"></span></div>
				<?php } ?>
				<?php if (isset($teba_options['menu_other_v3']) && is_array($teba_options['menu_other_v3']) && in_array('social', $teba_options['menu_other_v3'])) {  ?>
					<ul class="social-header-v6 social_list"><?php teba_top_social(); ?> <span class="menu-divider"></span></ul> 
				<?php } ?>
				<?php if (isset($teba_options['menu_other_v3']) && is_array($teba_options['menu_other_v3']) && in_array('lang', $teba_options['menu_other_v3'])) {  ?>
					<?php lang_link(); ?> 
				<?php } ?>			
			</div><!-- End menu_other_v3 -->

		<nav>
		  <div class="mo-col-menu">
			<?php
				$attr = array(
					'container_class' => 'mo-menu-list hidden-xs hidden-sm ',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				);
				/* Select menu dynamic */
				$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
				if($menu_slug != '' && $menu_slug != 'global') {
					$attr['menu'] = $menu_slug;
				}
				/* Select menu position */
				$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
				$attr['menu_class'] = 'text-right';
				if($menu_class != '' && $menu_class != 'global') {
					$attr['menu_class'] = $menu_class;
				}
				/* Select theme location */
				$menu_locations = get_nav_menu_locations();
				if (!empty($menu_locations['main_navigation'])) {
					$attr['theme_location'] = 'main_navigation';
				}
				wp_nav_menu( $attr ); ?>
		  </div>
		</nav>
		
		<div class="nav-menu-icon">
			<a href="javascript:void(0)"><div class="menu-icon"><div><?php echo esc_html__('Menu', 'teba'); ?></div><span></span><span></span></div></a>
		</div><!-- End nav-menu-icon -->
		
	  </div><!-- End navigation -->
    </div><!-- End container -->
 </div>
</header>