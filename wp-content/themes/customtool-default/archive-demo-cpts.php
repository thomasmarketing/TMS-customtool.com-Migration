<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="site-content" role="main">
    <div class="inner-wrap">
		<?php if ( have_posts() ): ?>
			<?php if ( is_day() ) : ?>
			<h2>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
			<?php elseif ( is_month() ) : ?>
			<h2>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
			<?php elseif ( is_year() ) : ?>
			<h2>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>	
			<?php else: ?>
			
		<?php endif; ?>							
			<article class="site-content-primary"> 
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="row blog-listing-row">
					<figure class="col-3">
						<div class="blog-page-list-img">			
						<?php if (has_post_thumbnail()): ?>
							<?php $title= get_the_title(); ?>
							<a href="<?php if( get_field('enl_link')): ?><?php the_field('enl_link'); ?><?php else:?><?php esc_url( the_permalink() ); ?><?php endif; ?>"<?php if(get_field('enl_link')):?> target="_blank" rel="noopener norefrrer"<?php endif; ?>><?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?></a>
			    		<?php endif; ?>
			    		</div>
					</figure>
					<div class="col-9">
						<h2 class="news-heading"><?php the_title(); ?></h2>								
						<?php the_excerpt(); ?>		
						<a href="<?php if( get_field('enl_link')): ?><?php the_field('enl_link'); ?><?php else:?><?php esc_url( the_permalink() ); ?><?php endif; ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark" class="btn fp-btn">Read More</a>				
					</div>						
				</article>
			<?php endwhile; ?>
			</article>
			<?php endif; ?>
	<?php wp_pagenavi(); ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>