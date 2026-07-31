<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="product-detail-content-wrapper">
        <div class="inner-wrap">
            <div class="box-summary-gallery">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>

                <div class="summary entry-summary">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>

                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                // do_action( 'woocommerce_after_single_product_summary' );
                ?>
            </div>
            <div class="box_description">
				<div class="title">
					Discription:
				</div>
                <?php
                global $product;

                echo apply_filters(
                    'woocommerce_product_description',
                    wpautop( $product->get_description() )
                );
                ?>
            </div>
        </div>
    </div>
    <div class="list-product-wrap">
        <div class="inner-wrap">
            <div class="product-list">
                <?php
                $current_id = get_the_ID();

                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6,
                    'post__not_in'   => array($current_id), 
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        global $product;
                ?>

                    <div class="product-item">
                        <a href="<?php the_permalink(); ?>">
                            
                            <div class="product-thumb">
                                <?php 
                                global $product;

                                echo $product->get_image('medium');
                                ?>
                            </div>
                            <div class="product-title"><?php the_title(); ?></div>
                        </a>
                    </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="popup-form">
        <div class="inner-wrap">
            <div class="popup-content">
                <div class="popup-title">
                    <span>Request a Quote</span> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                        <path fill="#bcb9b9" d="m14.268 12.5 3.536 3.535a1.25 1.25 0 1 1-1.769 1.769L12.5 14.268l-3.535 3.536a1.25 1.25 0 1 1-1.769-1.769l3.537-3.535-3.537-3.535a1.25 1.25 0 1 1 1.769-1.769l3.535 3.537 3.535-3.537a1.25 1.25 0 1 1 1.769 1.769zM12.5 0C5.596 0 0 5.596 0 12.5S5.596 25 12.5 25 25 19.404 25 12.5 19.404 0 12.5 0"/>
                    </svg>
                </div>
                <div class="popup-form-wrap">
                    <?php echo do_shortcode('[gravityform id="5" title="true"]'); ?>
                </div>
                <div class="form-note">
                    Submission will be sent via email
                </div>
            </div>
        </div>
    </div>
    <div class="popup-cart">
       <div class="inner-wrap">
            <div class="popup-cart-content">
                <div class="popup-cart-header">
                    <span>Cart</span>
                    <span class="close-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                            <path fill="#bcb9b9" d="m14.268 12.5 3.536 3.535a1.25 1.25 0 1 1-1.769 1.769L12.5 14.268l-3.535 3.536a1.25 1.25 0 1 1-1.769-1.769l3.537-3.535-3.537-3.535a1.25 1.25 0 1 1 1.769-1.769l3.535 3.537 3.535-3.537a1.25 1.25 0 1 1 1.769 1.769zM12.5 0C5.596 0 0 5.596 0 12.5S5.596 25 12.5 25 25 19.404 25 12.5 19.404 0 12.5 0"/>
                        </svg>
                    </span>
                </div>

                <div class="popup-cart-body">
                    <?php wc_get_template('cart/mini-cart.php'); ?>
                </div>
        </div>
       </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
