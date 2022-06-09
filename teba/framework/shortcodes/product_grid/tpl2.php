<article <?php post_class(); ?>>
	<div class="mo-thumb">
		<?php
			//do_action('woocommerce_template_loop_product_link_open');
			do_action('woocommerce_show_product_loop_sale_flash');
			do_action('woocommerce_template_loop_product_thumbnail');
			//do_action('woocommerce_template_loop_product_link_close');
		?>
		<div class="mo-actions">
			<?php 
				do_action('woocommerce_template_loop_add_to_cart'); 
				$full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                <a class="lightbox-gallery" href="<?php echo esc_url($full); ?>"><i class="fa fa-search"></i></a>
		</div>
	</div>
	<div class="mo-content">
		<?php
			do_action('woocommerce_template_loop_product_link_open');
			do_action('woocommerce_template_loop_product_title');
			do_action('woocommerce_template_loop_product_link_close');
			do_action('woocommerce_template_loop_price');
			do_action('woocommerce_template_loop_rating');
		?>
	</div>
</article>