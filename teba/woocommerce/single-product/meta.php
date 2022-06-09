<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product; ?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<h6><?php esc_html_e( 'Quick info', 'teba' ); ?></h6>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<div class="SKU_in">
			<?php $sku = $product->get_sku() ? $product->get_sku() : esc_html__( 'N/A', 'teba' ); ?>
			<span><?php esc_html_e( 'SKU:', 'teba' ); ?></span>
			<span class="sku" itemprop="sku"><?php echo esc_html( $sku ); ?></span>
	   </div>
	<?php endif; 
    echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="posted_in"><span>' . _n( ' Category:', 'Categories:', count( $product->get_category_ids() ), 'teba' ) . ' </span>', '</div>' ); ?>
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tagged_as"><span>' . _n( ' Tag:', 'Tags:', count( $product->get_tag_ids() ), 'teba' ) . ' </span>', '</div>' ); ?>
	 <?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>