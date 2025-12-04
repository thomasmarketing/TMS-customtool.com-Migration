<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="site-content blog-listing-page" role="main">
    <div class="inner-wrap">
        <article class="site-content-primary"> 
        	<article class="blog-listing-wrap">
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="row blog-listing-row">
					<div class="col-12">
					<?php if(has_post_thumbnail()): ?>
					<?php $title= get_the_title(); ?>					
						<div class="blog-page-list-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?></a>
							<div class="post-category"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) {
							    $cat_names = wp_list_pluck( $categories, 'name' );
							    echo implode(', ', $cat_names);
								}
								?>
							</div>
						</div>
					<?php endif; ?>	
					<div class="post-content-wrap">
					<h2 class="post-title"><a class="post-link" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="post-meta">
						<div class="post-author">by <?php the_author(); ?></div>			
						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></time>
					</div>
					<p><?php echo wp_trim_words( get_the_excerpt(), 25, '' ); ?></p>
					<a class="btn-alt2 post-btn" href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More</a>
					</div>
					</div>
				</article>
			<?php endwhile; ?>

			<?php else: ?>
				<h2>No posts to display</h2>
				<p>No idea what happened.</p>
			<?php endif; ?>
			</article>	
			<?php wp_pagenavi(); ?>
		
		</article>	
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>