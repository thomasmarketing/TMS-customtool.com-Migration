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
	<section class="site-content two-column" role="main">
	    <div class="inner-wrap">
	    	<div class="feature-prod-wrapper">
				<div class="text-aligncenter">
				<?php if(has_post_thumbnail()): ?>
				<?php $title= get_the_title(); ?>
				<a href="<?php the_post_thumbnail_url(); ?>" class="lightbox featured-img"><?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?></a>
				<?php endif; ?>								
				</div>
				<div class="fpw-content">
					<?php the_content(); ?> 
				</div>
	    	</div>     	
	    </div>
	    <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content'  ) ); ?>		
		<div class="prev-next-post">
		<div class="inner-wrap">
			
				<?php
				$prev_post = get_previous_post(); 
				$id = $prev_post->ID ;
				$permalink = get_permalink( $id );
				?>
				<?php if(get_previous_post()): ?>
		   		<span class="prev-post">
		   			<a href="<?php echo $permalink; ?>"> 
		   				<span class="meta-nav">« PREVIOUS</span>
		   				<?php echo $prev_post->post_title; ?>
		   			</a>
		   		</span>
		   		<?php endif;?>

				<?php 
				$next_post = get_next_post();
				$nid = $next_post->ID ;
				$permalink = get_permalink($nid);
				?>
		   		<?php if(get_next_post()): ?>
		   		<span class="next-post">
		   			<a href="<?php echo $permalink; ?>">
		   			<span class="meta-nav">NEXT »</span>
		   				<?php echo $next_post->post_title; ?> 
		   			</a>
		   		</span>
		   		<?php endif;?>
		   	</div>	   
		   	</div>
	</section>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>