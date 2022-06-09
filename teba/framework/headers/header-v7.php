<!-- Start Header -->
<?php
	global $teba_options;
	$class_header = 'mo-header-v7';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($teba_options['stick_main_menu_v7']) && $teba_options['stick_main_menu_v7']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
  <div id="mo_header" class="<?php echo esc_attr($class_header); ?>">
	<div class="mo-header-menu">
     <div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
      <div class="mo-header-top hidden-sm hidden-xs">
	   <div class="container-fluid">
		 <div class="mo-header-top-l col-sm-6 no-padding">
		      <?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('info', $teba_options['menu_top_v7'])) {  ?>
				  <span class="info-txt"> <?php echo wptexturize($teba_options['menu_top_info_v7']); ?></span>
			   <?php } ?>
			   <?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('social', $teba_options['menu_top_v7'])) {  ?>
					<ul class="social-header-v7 social_list"><?php teba_top_social(); ?></ul> 
				<?php } ?>
				<?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('lang', $teba_options['menu_top_v7'])) {  ?>
				 <?php lang_link(); ?>
			   <?php } ?>
		 </div>

		 <div class="mo-header-top-r col-sm-6 no-padding">
		        <div class="contact_info">
			    	<?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('phone', $teba_options['menu_top_v7'])) {  ?>
						<span><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html($teba_options['menu_top_phone_v7']);?>"><?php echo esc_html($teba_options['menu_top_phone_v7']);?></a></span> 						
			    	<?php } ?>
				    <?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('email', $teba_options['menu_top_v7'])) {  ?>			  
					    <span><i class="far fa-envelope"></i><a href="mailto:<?php echo esc_url($teba_options['menu_top_email_v7']);?>"><?php echo esc_html($teba_options['menu_top_email_v7']);?></a></span>
					<?php } ?>
					<?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('time', $teba_options['menu_top_v7'])) {  ?>			  
					    <span><i class="far fa-clock"></i><?php echo esc_html($teba_options['menu_top_time_v7']);?></span>
					<?php } ?>
					<?php if (isset($teba_options['menu_top_v7']) && is_array($teba_options['menu_top_v7']) && in_array('address', $teba_options['menu_top_v7'])) {  ?>			  
					    <span><i class="fas fa-map-marker-alt"></i><?php echo esc_html($teba_options['menu_top_address_v7']);?></span>
					<?php } ?>
				 </div>		
		 </div>
	  </div>
	</div><!-- End Header Top -->
   
	   <div class="container-fluid">
			<div class="mo-col-logo">
				<div class="mo-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<?php teba_logo(); ?>
					</a>
				</div>
			</div><!-- End mo-col-logo -->	
			<div class="menu_other_v7 hidden-sm hidden-xs">
			    <?php if (isset($teba_options['menu_other_v7']) && is_array($teba_options['menu_other_v7']) && in_array('button', $teba_options['menu_other_v7'])) {  ?>
				  <a class="btn-nav button light hr_primary bg_primary bg_hr_light radius5 roll" href="<?php echo esc_url($teba_options['menu_other_but_link_v7']);?>"><span><?php echo esc_html($teba_options['menu_other_but_v7']);?></span></a>
				<?php } ?>
			   
				<?php if (isset($teba_options['menu_other_v7']) && is_array($teba_options['menu_other_v7']) && in_array('sidepanel', $teba_options['menu_other_v7'])) {  ?>
				  <div class="menu-toggle">
					<span class="menu-sm-lines">
						<span class="menu-sm-line-1"></span>
						<span class="menu-sm-line-2"></span>
						<span class="menu-sm-line-3"></span>
					</span>
				  </div>
				<?php } ?>
				
				<?php if (isset($teba_options['menu_other_v7']) && is_array($teba_options['menu_other_v7']) && in_array('search', $teba_options['menu_other_v7'])) {  ?>
			     	<div class="mo-search-header"><a class="search-trigger"><i class="fa fa-search"></i></a></div> 
				<?php } ?>

				<?php global $woocommerce;
					if (isset($teba_options['menu_other_v7']) && is_array($teba_options['menu_other_v7']) && in_array('cart', $teba_options['menu_other_v7'])) {  ?>
					<div class="mo_mini_cart">                    
					   <div class="mo-cart-header">
							<a class="mo-icon" href="javascript:void(0)">
							<i class="fa fa-shopping-cart"></i>
							<span class="cart_total"><?php $items_count = $woocommerce->cart->cart_contents_count; echo esc_html($items_count); ?></span>
							</a>
						</div>
						<div class="mo-cart-content">
							<h6><?php echo esc_html__('My Shoping Cart', 'teba'); ?></h6>
							<div class="widget_shopping_cart_content"></div>
						</div>
			 	    </div>
				<?php } ?>
			</div><!-- End menu_other_v7 -->	

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
				} ?>
			</div><!-- End mo-col-menu -->	
		</div><!-- End container -->
	 </div><!-- End mo-header-menu -->
  </div><!-- End mo_header -->
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
    <div class="main-search-overlay"></div>
    <div class="main-search-container">
        <div class="main-search-close">
            <span></span>
        </div>
        <div class="main-search-content">
            <?php get_search_form(); ?>
        </div>
    </div>
</div> <!-- End main-search -->