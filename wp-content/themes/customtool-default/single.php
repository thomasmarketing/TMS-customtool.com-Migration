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
	    <div class="inner-wrap">
	        <article class="site-content-primary">
	        	<?php if(has_post_thumbnail()): ?>
					<?php $title= get_the_title(); ?>					
						<div class="blog-page-list-img spli-img"><a class="post-thumb-lightbox" href="<?php the_post_thumbnail_url(); ?>"><?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?></a>
							<div class="post-category"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) {
							    $cat_names = wp_list_pluck( $categories, 'name' );
							    echo implode(', ', $cat_names);
								}
								?>
							</div>
						</div>
				<?php endif; ?>	
				<div class="single-post-header">
					<h1 class="sph-title"><?php the_title(); ?></h1>
					<div class="post-meta">
						<div class="post-author">by <?php the_author(); ?></div>			
						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php echo get_the_date(); ?></time>
					</div>
				</div>		

				<?php the_content(); ?> 
				<div class="single-post-category">Categories: <?php the_category(', '); ?></div>
				<div class="single-post-tag"><?php the_tags( 'Tagged: ', ', ', '' ); ?></div>
				<!-- <hr>
				<p><?php //the_tags(); ?></p>
				<hr> -->
				<?php //comments_template( '', true ); ?>
	        </article>
	       	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content'  ) ); ?>
	    </div>
	</section>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>