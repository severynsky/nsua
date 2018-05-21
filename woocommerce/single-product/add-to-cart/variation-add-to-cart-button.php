<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
					<div class="tour_reserve_price">
						<p class="reserve_price_heading">tour price</p>
						<p class="reserve_price">1300 uah</p>
						<p class="reserve_price_detail">*per person</p>			
					</div>
<div class="woocommerce-variation-add-to-cart variations_button">
	<div class="quantity_vrapper" style="display: none">
	<?php
		/**
		 * @since 3.0.0.
		 */
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
		) );

		/**
		 * @since 3.0.0.
		 */
		do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
	</div>
	<div class="tour_button_resefve_button tour_reserve">
		<button type="submit" name="reserve_tour" class="single_add_to_cart_button button alt tour_button_resefve reserve_reserve">Reserve Tour<?php //echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	</div>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
