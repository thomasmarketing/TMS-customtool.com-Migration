<div class="site-intro" <?php if( get_field('si_static_image')): ?>style="background-image: url(<?php echo get_field('si_static_image'); ?>);"<?php endif;?>>



<?php if(get_field('type') == 'slider' ):?>

<div class="si-slider">
	<?php if( have_rows('si_slider') ): $bucket_count = 0; while ( have_rows('si_slider') ) : the_row(); $bucket_count++; ?>	
	<div class="si-item" <?php if( get_sub_field('si_bg_image')): ?>style="background-image: url(<?php echo get_sub_field('si_bg_image'); ?>);"<?php endif;?>>

		<div class="inner-wrap">
			<div class="si-content">
				<?php if( get_sub_field('si_slider_heading')): ?>
					<?php 
					$title_tag = ($bucket_count === 1) ? 'h1' : 'h2'; // Use h1 for the first bucket, h2 otherwise
					?>
					<<?php echo $title_tag; ?> class="h1 section-header"><?php echo get_sub_field('si_slider_heading'); ?></<?php echo $title_tag; ?>>
				<?php endif; ?>

				<?php if( get_sub_field('si_slider_content')): ?>
					<p class="si-sub-text"><?php echo get_sub_field('si_slider_content'); ?></p>
				<?php endif;?>

				<?php $si_slider_link = get_sub_field('si_slider_link');
				if( $si_slider_link ): 
				$link_url = $si_slider_link['url'];
				$link_title = $si_slider_link['title'];
				$link_target = $si_slider_link['target'] ? $si_slider_link['target'] : '_self';
				?>
				<a href="<?php echo esc_url($link_url); ?>" class="btn si-btn"><span><?php echo esc_html($link_title); ?></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>  


	<?php endwhile; endif;?>
	</div>

<?php elseif(get_field('type') == 'staticcsi'):?>

<div class="si-static-cont-pos">
	<div class="inner-wrap">
	<?php if(get_field('si_heading')):?>
	<h1 class="section-header"><?php echo get_field('si_heading');?></h1>
	<?php else: ?>
	<h1 class="section-header"><?php the_title(); ?></h1>
	<?php endif;?>

	<?php if( get_field('si_content')): ?>
		<p class="si-sub-text"><?php echo get_field('si_content'); ?></p>
	<?php endif;?>

	<?php $si_link = get_field('si_link');
	if( $si_link ): 
	$link_url = $si_link['url'];
	$link_title = $si_link['title'];
	$link_target = $si_link['target'] ? $si_link['target'] : '_self';
	?>
	<a href="<?php echo esc_url($link_url); ?>" class="btn si-btn"><span><?php echo esc_html($link_title); ?></span></a>
	<?php endif; ?>
	</div>
</div>

<div class="si-slider">
	<?php if( have_rows('si_slider') ): $bucket_count = 0; while ( have_rows('si_slider') ) : the_row(); $bucket_count++; ?>	
	<div class="si-item" <?php if( get_sub_field('si_bg_image')): ?>style="background-image: url(<?php echo get_sub_field('si_bg_image'); ?>);"<?php endif;?>>
	</div>  
	<?php endwhile; endif;?>
</div>

  	
<?php else: ?>
	
  <div class="si-static-cont">
	<div class="inner-wrap">
	<?php if(get_field('si_heading')):?>
	<h1 class="section-header"><?php echo get_field('si_heading');?></h1>
	<?php else: ?>
	<h1 class="section-header"><?php the_title(); ?></h1>
	<?php endif;?>

	<?php if( get_field('si_content')): ?>
		<p class="si-sub-text"><?php echo get_field('si_content'); ?></p>
	<?php endif;?>

	<?php $si_link = get_field('si_link');
	if( $si_link ): 
	$link_url = $si_link['url'];
	$link_title = $si_link['title'];
	$link_target = $si_link['target'] ? $si_link['target'] : '_self';
	?>
	<a href="<?php echo esc_url($link_url); ?>" class="btn si-btn"><span><?php echo esc_html($link_title); ?></span></a>
	<?php endif; ?>
	</div>
</div>
<?php endif;?>

</div>