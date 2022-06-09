<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
 if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price"><?php echo _('PRICE:') .$price_html; ?></span>
<?php endif; ?>