<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php
global $product;

if ( $product && $product->get_price() !== '' ) : ?>
    <div class="product-detail-wrapper">
			<?php $banner = get_field('image_banner_product'); ?>

			<div class="page-intro" style="background-image: url('<?php echo esc_url($banner); ?>');">
				<div class="inner-wrap">
				<div class="pi-wrap">
					<?php if(get_field('title_banner_product')) : ?>
					<div class="pi-heading"><?php echo get_field('title_banner_product'); ?></div>
					<?php endif; ?>
					<?php if(get_field('description_banner_product')) : ?>
					<div class="pi-content"><?php echo get_field('description_banner_product'); ?></div>
					<?php endif; ?>
					<div class="fw-cta-wrap">
						<a class="btn-color fw-cta" href="/request-a-quote/">
							<span>Request a Quote</span>
						</a>
					</div>
				</div>

				</div>
			</div>
			<div class="product-bar">
				<div class="inner-wrap">
					<div class="text-bar">
						<svg xmlns="http://www.w3.org/2000/svg" width="1600" height="1600" viewBox="0 0 1200 1200">
							<path fill-rule="evenodd" d="M108.82 267.78c-10.957 0-19.848 8.879-19.848 19.848 0 10.957 8.89 19.836 19.848 19.836h114.86c14.398 0 26.184 11.785 26.184 26.184 0 14.398-11.773 26.184-26.184 26.184h-57.395c-11.004 0-19.922 8.914-19.922 19.922 0 11.004 8.914 19.922 19.922 19.922h113.89c14.387 0 26.184 11.785 26.184 26.184s-11.785 26.184-26.184 26.184c-82.668 0-165.3-.086-247.96-.086-11.004 0-19.922 8.93-19.922 19.922 0 11.004 8.914 19.922 19.922 19.922h214.89c14.398 0 26.184 11.785 26.184 26.184s-11.773 26.184-26.184 26.184l-123.89-.004c-10.176.887-18.168 9.434-18.168 19.848 0 11.004 8.93 19.922 19.934 19.922h98.699v75.59l598.31-.004v-332.72c0-32.508-26.508-59.016-59.016-59.016h-654.17zM822 699.36H223.69v95.137c0 32.508 26.52 59.016 59.027 59.016h56.566c0-65.473 53.074-118.54 118.54-118.54 65.473 0 118.55 53.074 118.55 118.54h245.63zm141.25-336.31v190.52h221.14c-2.555-7.21-6.613-13.824-12.168-19.906l-138.44-151.42c-11.594-12.672-26.375-19.199-43.559-19.199zm-101.41 0h61.559V573.5c0 11.004 8.914 19.922 19.906 19.922h244.38v260.1h-52.801c0-65.473-53.074-118.54-118.55-118.54-65.461 0-118.54 53.074-118.54 118.54l-35.961-.004zm154.5 465.68c-13.703 0-24.781 11.09-24.781 24.793 0 13.715 11.09 24.781 24.781 24.781 13.715 0 24.793-11.074 24.793-24.781.012-13.715-11.078-24.793-24.793-24.793m-558.53 0c13.715 0 24.793 11.09 24.793 24.793 0 13.715-11.09 24.781-24.793 24.781s-24.781-11.074-24.781-24.781c0-13.715 11.09-24.793 24.781-24.793m558.53-53.914c-43.453 0-78.695 35.242-78.695 78.695s35.242 78.695 78.695 78.695c43.465 0 78.707-35.242 78.707-78.695s-35.242-78.695-78.707-78.695m-558.53 0c43.465 0 78.695 35.242 78.695 78.695s-35.23 78.695-78.695 78.695c-43.453 0-78.695-35.242-78.695-78.695s35.242-78.695 78.695-78.695"/>
						</svg>
						<span>Flat rate shipping: <strong>$15 (USA only)</strong></span>
					</div>
					<div class="text-bar">
						<svg xmlns="http://www.w3.org/2000/svg" width="1600" height="1600" viewBox="0 0 1200 1200">
							<path d="M874.26 445.74h-17.156v-85.734c0-141.74-115.36-257.16-257.16-257.16-141.74 0-257.16 115.36-257.16 257.16v85.734h-17.156c-75.609 0-137.16 61.547-137.16 137.16v377.16c0 75.609 61.547 137.16 137.16 137.16h548.58c75.609 0 137.16-61.547 137.16-137.16V582.9c0-75.609-61.547-137.16-137.16-137.16zM763.54 690.52 592.12 896.26c-6.516 7.734-16.125 12.328-26.25 12.328h-.187c-9.938 0-19.547-4.266-26.062-12l-102.84-120c-12.329-14.391-10.642-36 3.75-48.328s36-10.641 48.327 3.75l76.453 89.156 145.36-174.52c12.188-14.578 33.75-16.453 48.328-4.453 14.578 12.188 16.453 33.75 4.454 48.328zm25.031-244.78h-377.16v-85.734c0-104.06 84.516-188.58 188.58-188.58s188.58 84.516 188.58 188.58z"/>
						</svg>
						<span>Secure Checkout via WooCommerce</span>
					</div>
				</div>
			</div>
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
		
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			// do_action( 'woocommerce_sidebar' );
		?>
	</div>
<?php else : ?>
    <section class="site-content" role="main">
		<section class="product-header-module">
			<div class="inner-wrap">
				<div class="phm-wrap">
				<?php $image = get_field('phm_image'); ?>
				<?php if( !empty( $image ) ): ?>
				<div class="phm-left">
					    <a class="lightbox" href="<?php echo esc_url($image['url']); ?>"><img class="phm-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" /></a>					
				</div>
				<?php endif; ?>
				<div class="phm-right <?php if( empty( $image ) ): ?>phm-no-left<?php endif; ?>">
				<?php if( get_field('phm_title')): ?>
					<h1 class="phm-heading"><?php echo get_field('phm_title'); ?></h1>
				<?php else: ?>
					<h1 class="phm-heading"><?php the_title(); ?></h1>
				<?php endif; ?>
				<?php $image = get_field('phm_image');
					if( !empty( $image ) ): ?>
					    <div class="phmr-image"><a class="lightbox" href="<?php echo esc_url($image['url']); ?>"><img class="phm-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" /></a></div>
				<?php endif; ?>	
				<?php if( get_field('phm_content')): ?>
					<div class="phm-content"><?php echo get_field('phm_content'); ?></div>
				<?php endif; ?>	
				</div>
				</div>
			</div>	
		</section>	

		<?php $images = get_field('pgm_gallery');
		if( $images ): ?>
		<section class="product-gallery-module">
				<div class="inner-wrap">	
					<div class="pgm-items popup-gallery">
						<?php if( $images ): ?>
								<?php foreach( $images as $image ): ?>
			                    	<div class="pgm-item"><a class="pgm-link" href="<?php echo $image['sizes']['large']; ?>">
				                    	<img class="pgm-img" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"/></a>
				                    	 <?php $img_caption = $image['caption'];
 										if($img_caption): ?><p class="pgm-caption"><?php echo $image['caption']; ?></p><?php endif; ?>
			                    	</div>
								<?php endforeach; ?>
							<?php endif; ?>
					</div>
				</div>
		</section>
		<?php endif; ?>

		<section class="product-cta-navigation">
			<div class="inner-wrap">
				<div class="pcn-wrap">
					<?php global $post;
					$next_product = get_adjacent_post( false, '', false );
					?>
					<a class="btn pcn-cta" href="/product/">Back to Our Products</a>
					<?php if ( $next_product ) : ?>
					    <a class="btn pcn-cta" href="<?php echo get_permalink( $next_product->ID ); ?>">Next Product</a>
					<?php endif; ?>
				</div>
			</div>
		</section>

	</section>
<?php endif; ?>
	

<?php
Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
