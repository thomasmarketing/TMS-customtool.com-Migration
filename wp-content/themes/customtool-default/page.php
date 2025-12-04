<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
		<?php if (get_the_content() || is_page( '9' )): ?>
			<div class="inner-wrap">
		        <article class="site-content-primary">
       				<?php the_content(); ?> 
					<?php if (is_page( '9' )) : ?>
						<!--Sitemap Page-->
						<?php wp_nav_menu(array(
					      'menu'            => 'Sitemap',
					      'container'       => 'ul',
					      'menu_class'      => 'sitemap-menu',
					      )); ?>
					<?php endif; ?>	              
		        </article>
			</div> 					
		<?php endif ?>
			<!-- <?php //Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?> -->
		<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content' ) ); ?>    
	</section>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>