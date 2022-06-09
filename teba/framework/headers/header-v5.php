<!-- Start Header -->
<?php
	global $teba_options;
	$class_header = 'mo-header-v5';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($teba_options['stick_main_menu_v5']) && $teba_options['stick_main_menu_v5']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
 <div id="mo_header" class="mo-header-fixed <?php echo esc_attr($class_header); ?>">
	<div class="mo-header-menu">
		 <div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>

		   <div class="mo-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php teba_logo(); ?>
				</a>
			</div>
		   <?php if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
				if (is_array($teba_options['menu_other_v5'])) {
					if ( in_array('lang', $teba_options['menu_other_v5'], true)) { ?> 
						  <?php lang_link(); ?> <span class="menu-divider lang-divider"></span>
					<?php	}
				}
			} ?>
		       <div class="menu_other_v5 hidden-sm hidden-xs">
		        <?php if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
					if (is_array($teba_options['menu_other_v5'])) {
						if ( in_array('button', $teba_options['menu_other_v5'], true)) { ?> 
							<a class="btn-nav button light hr_light bg_primary bg_hr_dark roll" href="<?php echo esc_url($teba_options['menu_other_but_link_v5']);?>"><span><?php echo esc_html($teba_options['menu_other_but_v5']);?></span></a>
						<?php	}
					}
				} ?>
			    <?php if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
					if (is_array($teba_options['menu_other_v5'])) {
						if ( in_array('sidepanel', $teba_options['menu_other_v5'], true)) { ?> 
							 <div class="menu-toggle">
								<span class="menu-sm-lines">
									<span class="menu-sm-line-1"></span>
									<span class="menu-sm-line-2"></span>
									<span class="menu-sm-line-3"></span>
								</span>
							</div>
							<span class="menu-divider toggle-divider"></span>
						<?php	}
					}
				} ?>
                <?php if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
					if (is_array($teba_options['menu_other_v5'])) {
						if ( in_array('search', $teba_options['menu_other_v5'], true)) { ?> 
							 <div class="mo-search-header"><a class="search-trigger"><i class="fa fa-search"></i></a></div>
							 <span class="menu-divider search-divider"></span>
						<?php	}
					}
				} ?>
			   <?php 
				global $woocommerce;
				if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
					if (is_array($teba_options['menu_other_v5'])) {
						if ( in_array('cart', $teba_options['menu_other_v5'], true)) { ?> 
						<div class="mo_mini_cart">                    
							<div class="mo-cart-header">
								<a class="mo-icon" href="javascript:void(0)">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart_total"><?php $items_count = $woocommerce->cart->cart_contents_count; echo esc_html($items_count); ?></span>
								</a>
								<span class="menu-divider cart-divider"></span>
							</div>
							<div class="mo-cart-content">
							<h6><?php echo esc_html__('My Shoping Cart', 'teba'); ?></h6>
							<div class="widget_shopping_cart_content"></div>
							</div>
						</div>	
						<?php	}
					}
				} ?>
                <?php if ( isset($teba_options['menu_other_v5']) AND $teba_options['menu_other_v5'] !=''){ 
					if (is_array($teba_options['menu_other_v5'])) {
						if ( in_array('social', $teba_options['menu_other_v5'], true)) { ?> 
							 <ul class="social-header-v5 social_list"><?php teba_top_social(); ?></ul> 
						<?php	}
					}
				} ?>
		   </div> <!-- End menu_other_v5 -->

		   <div class="mo-col-menu">
			<?php
				$attr = array(
					'container_class' => 'mo-menu-list motivo_cc hidden-xs hidden-sm ',
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
						'menu_class'  => 'menu mo-menu-list text-center',
					);
					wp_page_menu($attr);
				}
			?>
			</div><!-- End menu -->
	</div><!-- End Header Menu -->
  </div><!-- End #mo_header -->
</header><!-- End Header -->

<div class="sidepanel sidepanel_v2">
    <a id="menu-close" href="#" class="close-btn"><span></span></a>
    <div class="sidepanel-content"> 
        <div class="sidepanel-left col-md-12 col-xs-12">
             <?php if (isset($teba_options['sidepanel_content_v2']) && is_array($teba_options['sidepanel_content_v2']) && in_array('nav', $teba_options['sidepanel_content_v2'])) {  
	           if (is_active_sidebar("teba-sidepanel")) { 
				  dynamic_sidebar("teba-sidepanel"); 
			   } 
			 } ?>
			 <?php if (isset($teba_options['sidepanel_content_v2']) && is_array($teba_options['sidepanel_content_v2']) && in_array('social', $teba_options['sidepanel_content_v2'])) {  ?>
			 <ul class="social_list">
				<?php teba_top_social(); ?>
			 </ul> 
			<?php } ?>
		</div>
    </div>
</div> <!-- End sidepanel -->
<div class="sidepanel-overlay"></div>

<div class="main-search">
    <div class="main-search-container">
        <div class="main-search-close">
            <span></span>
        </div>
        <div class="main-search-content">
            <?php get_search_form(); ?>
        </div>
    </div>
</div> <!-- End main-search -->