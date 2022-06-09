<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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

/** @global WC_Checkout $checkout */

?>
<div class="woocommerce-billing-fields">

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); 
	 foreach ( $checkout->checkout_fields['billing'] as $key => $field ) :
	 woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
	 endforeach;
	 do_action('woocommerce_after_checkout_billing_form', $checkout ); 
	 if ( ! is_user_logged_in() && $checkout->enable_signup ) :
	   
	   if ( $checkout->enable_guest_checkout ) : ?>
			<p class="form-row form-row-wide create-account">
				<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php esc_html_e( 'Create an account?', 'teba' ); ?></label>
			</p>

		<?php endif;
		do_action( 'woocommerce_before_checkout_registration_form', $checkout ); 
		if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>
			<div class="create-account">
				<p><?php esc_html_e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'teba' ); ?></p>
				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : 
				 woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				 endforeach; ?>
				<div class="clear"></div>
			</div>
		<?php endif; 
		do_action( 'woocommerce_after_checkout_registration_form', $checkout ); 
		endif; ?>
</div>
