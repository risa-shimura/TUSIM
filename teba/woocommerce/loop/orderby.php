<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
//Get layout on page reload
	if  (isset($_GET['mo_layout'])) :
		$mo_layout = $_GET['mo_layout'];
	else:
		$mo_layout = 'grid';
	endif;
?>
<form class="woocommerce-ordering" method="get">
	<div class="mo-layout-view">
		<span class="mo-layout grid <?php if($mo_layout == 'grid') echo 'active'; ?>"><input type="radio" name="mo_layout" value="grid" <?php if($mo_layout == 'grid') echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-th"></i></span>
		<span class="mo-layout list <?php if($mo_layout == 'list') echo 'active'; ?>"><input type="radio" name="mo_layout" value="list" <?php if($mo_layout == 'list') echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-list"></i></span>
	</div>
	<div class="mo-sort-by">
		<select name="orderby" class="orderby">
			<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			}elseif($key != 'mo_layout'){
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
