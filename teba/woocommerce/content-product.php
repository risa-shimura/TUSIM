<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version     5.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}
// Layout grid/list;
$item_layout = 'grid';
if  (isset($_GET['mo_layout'])) {
	$item_layout = $_GET['mo_layout'];
}
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();
$classes[] = $item_layout;
if($item_layout == 'list') $woocommerce_loop['columns'] = 1;
if($item_layout == 'grid') $woocommerce_loop['columns'] = 3;
switch ($woocommerce_loop['columns']) {
	case 1:
		$classes[] = 'col-xs-12 col-sm-12 col-md-12';
		break;
	case 2:
		$classes[] = 'col-xs-12 col-sm-6 col-md-6';
		break;
	case 3:
		$classes[] = 'col-xs-12 col-sm-6 col-md-4';
		break;
	case 4:
		$classes[] = 'col-xs-12 col-sm-6 col-md-4';
		break;
	default:
		$classes[] = 'col-xs-12 col-sm-6 col-md-4';
		break;
} ?>
<div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
	<article <?php post_class(); ?>>
		<?php if($item_layout == 'grid') { ?>
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
		<?php } else { ?>
			<div class="mo-col-full-height">
				<div class="mo-col mo-col-left">
					<div class="mo-thumb">
						<?php
							do_action('woocommerce_template_loop_product_link_open');
							do_action('woocommerce_show_product_loop_sale_flash');
							do_action('woocommerce_template_loop_product_thumbnail');
							do_action('woocommerce_template_loop_product_link_close');
						?>
					</div>
				</div>
				<div class="mo-col mo-col-right">
					<div class="mo-content">
						<?php
							do_action('woocommerce_template_loop_product_link_open');
							do_action('woocommerce_template_loop_product_title');
							do_action('woocommerce_template_loop_product_link_close');
						?>
						<div class="price-rating">
							<?php 
								do_action('woocommerce_template_loop_price');
								do_action('woocommerce_template_loop_rating');
							?>
						</div>
						<?php do_action('woocommerce_template_single_excerpt'); ?>
						<div class="mo-actions">
							<?php 
								do_action('woocommerce_template_loop_add_to_cart'); 
								$full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</article>
</div>