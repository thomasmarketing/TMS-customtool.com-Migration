<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>
<?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>

    <div class="mini-cart-wrapper"> 
        <div class="left-mini-cart">
            <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
                <?php
                do_action( 'woocommerce_before_mini_cart_contents' );

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        /**
                         * This filter is documented in woocommerce/templates/cart/cart.php.
                         *
                         * @since 2.1.0
                         */
                        $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                        $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                        $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                            
                            <?php if ( empty( $product_permalink ) ) : ?>
                                <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <div class="quantity-product">
                                <?php echo sprintf(
                                'x %s',
                                $cart_item['quantity'],
                            ); ?>
                            </div>
                        </li>
                        <?php
                    }
                }

                do_action( 'woocommerce_mini_cart_contents' );
                ?>
            </ul>
        </div>
        <div class="right-mini-cart">
             <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
                <?php
                do_action( 'woocommerce_before_mini_cart_contents' );

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        /**
                         * This filter is documented in woocommerce/templates/cart/cart.php.
                         *
                         * @since 2.1.0
                         */
                        $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                        $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                        $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                            
                            <?php if ( empty( $product_permalink ) ) : ?>
                                <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf(  $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </li>
                        <?php
                    }
                }

                do_action( 'woocommerce_mini_cart_contents' );
                ?>
            </ul>     
            <?php 
                WC()->cart->calculate_shipping();
                $packages = WC()->shipping()->get_packages();
                $shipping_total = 0;
                $shipping_labels = [];
                $chosen_methods = WC()->session->get('chosen_shipping_methods');

                if ( ! empty( $packages ) ) {
                    foreach ( $packages as $i => $package ) {
                        if ( isset( $chosen_methods[$i] ) ) {
                            $rate = $package['rates'][ $chosen_methods[$i] ];
                            $shipping_total += $rate->cost;
                            $shipping_label = $rate->get_label();
                        }
                    }
                }

                $shipping_label_text = implode(', ', $shipping_labels);
                ?>

                <div class="total-shipping">
                    <strong>Shipping:</strong> 
                    <div class="price-shipping">
                        <?php echo wc_price($shipping_total); ?> 
                        <?php if ($shipping_label_text) : ?>
                            (<?php echo esc_html($shipping_label_text); ?>)
                        <?php endif; ?>
                    </div>
                </div>

            <?php 
            
            $subtotal = WC()->cart->get_subtotal();
            $total = $subtotal + $shipping_total;

            ?>
            <p class="woocommerce-mini-cart__total total">
                <?php
                /**
                 * Hook: woocommerce_widget_shopping_cart_total.
                 *
                 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
                 */
                // do_action( 'woocommerce_widget_shopping_cart_total' );
                ?>
                <strong>Total:</strong> <?php echo wc_price($total); ?>
            </p>

            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

            <div class="woocommerce-mini-cart__buttons buttons">
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php esc_html_e( 'View cart', 'woocommerce' ); ?></a>
                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php esc_html_e( 'Proceed To Checkout', 'woocommerce' ); ?></a>
            </div>              
        </div>
    </div>

	

	

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
