<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

// get_header( 'shop' );
Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); 

?>
<?php $id = is_shop() ? wc_get_page_id('shop') : get_the_ID();?>
<div class="page-intro <?php if (( is_404() || is_search() ) && get_field('global_search_remove_overlay', 'option')): ?>pi-no-overlay<?php endif; ?> <?php if (get_field('pi_small_height')): ?>pi-small<?php endif; ?>"
    <?php
    if ( get_field('pi_bg', $id) ) {
        echo 'style="background-image:url(' . get_field('pi_bg', $id) . ')"';
    } elseif ( get_field('global_inner_page_banner','option') ) {
        echo 'style="background-image:url(' . get_field('global_inner_page_banner','option') . ')"';
    }
    ?>
>
	<div class="inner-wrap">
		<div class="pi-wrap">

			<?php if ( is_shop() ) : ?>

				<h1 class="pi-heading">
					<?php echo get_field('pi_heading', $id) ? get_field('pi_heading', $id) : 'The Daily Tool & Grind'; ?>
				</h1>

				<div class="pi-content">
					<?php if ( get_field('pi_content', $id) ) : ?>
						<?php echo get_field('pi_content', $id); ?>
					<?php else : ?>
<!-- 						<p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p> -->
					<?php endif; ?>
				</div>

			<?php elseif(get_field('pi_heading')): ?>

				<h1 class="pi-heading"><?php echo get_field('pi_heading', $id);?></h1>

			<?php else: ?>

			 	<h1 class="pi-heading"><?php the_title(); ?></h1>

			<?php endif;?>

			<?php if( get_field('pi_content') && !is_shop() ): ?>
				<div class="pi-content"><?php echo get_field('pi_content'); ?></div>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php 
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>

<div class="wrap-product-shop-archive">
    <div class="inner-wrap">
<?php 
do_action( 'woocommerce_before_main_content' );

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action( 'woocommerce_shop_loop_header' );

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

// get_footer( 'shop' );
Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); 
