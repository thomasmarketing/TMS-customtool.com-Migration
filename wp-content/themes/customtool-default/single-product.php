<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<!--Site Content-->
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
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>