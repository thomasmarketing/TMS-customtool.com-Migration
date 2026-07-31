<?php 
if ( is_singular('product') || is_shop() || is_post_type_archive('product') ) return;
?>
<?php if ( !is_front_page() && is_home() ):
	$id = intval(get_option( 'page_for_posts' ));
else: 
	$id = get_the_ID();
endif; ?>

<div class="page-intro <?php if (( is_404() || is_search() ) && get_field('global_search_remove_overlay', 'option')): ?>pi-no-overlay<?php endif; ?> <?php if (get_field('pi_small_height')): ?>pi-small<?php endif; ?>"
    <?php
    // Same banner for BOTH 404 & Search page
    if ( ( is_404() || is_search() ) && get_field('global_404_and_search_page_banner','option') ) {
        echo 'style="background-image:url(' . get_field('global_404_and_search_page_banner','option') . ')"';
    }

    // Single product CPT → custom product banner
    elseif ( is_singular('product') && get_field('global_product_page_banner','option') ) {
        echo 'style="background-image:url(' . get_field('global_product_page_banner','option') . ')"';
    }

    // Page-specific banner
    elseif ( get_field('pi_bg', $id) ) {
        echo 'style="background-image:url(' . get_field('pi_bg', $id) . ')"';
    }

    // Global default inner page banner
    elseif ( get_field('global_inner_page_banner','option') ) {
        echo 'style="background-image:url(' . get_field('global_inner_page_banner','option') . ')"';
    }
    ?>
>


	<div class="inner-wrap">
		<div class="pi-wrap">
			
			<?php if(is_home()):?>
		 		<h1 class="pi-heading">The Daily Tool & Grind</h1>
		 		<div class="pi-content"><p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p></div>

		 	<?php elseif(is_404()):?>
				<!-- <h1 class="pi-heading">Error 404: Page not found</h1> -->
			 	
			<?php elseif ( is_author() ): ?>
			    <p class="h1 pi-heading">The Daily Tool & Grind</p>
			    <div class="pi-content">
			        <p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p>
			    </div>

			<?php elseif(is_search()):?>
			 	<p></p>

			<?php elseif(is_category()): ?>
				<p class="h1 pi-heading">The Daily Tool & Grind</p>
			    <div class="pi-content">
			        <p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p>
			    </div>

			<?php elseif(is_archive('post')): ?>
				<p class="h1 pi-heading">The Daily Tool & Grind</p>
			    <div class="pi-content">
			        <p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p>
			    </div>			

			<?php elseif(get_field('pi_heading')):?>
				<h1 class="pi-heading"><?php echo get_field('pi_heading', $id);?></h1>

			<?php elseif ( is_single() && !is_singular('product') ): ?>
		    <p class="h1 pi-heading">The Daily Tool & Grind</p>
		    <div class="pi-content">
		        <p>The Daily Tool & Grind is Custom Tool & Grinding’s official blog. See what we’re up to around the shop as well as what’s going on around our industry.</p>
		    </div>

		<?php elseif ( is_singular('product') ): ?>
		    <p class="h1 pi-heading">About Our Products</p>
		    <div class="pi-content"><p>Let us design and manufacture high-performance tooling products that meet your precise specifications.</p>
		    </div>

			<?php else: ?>
			 	<h1 class="pi-heading"><?php the_title(); ?></h1>
			<?php endif;?>
			<?php if( get_field('pi_content')): ?>
				<div class="pi-content"><?php echo get_field('pi_content'); ?></div>
			<?php endif; ?>

		</div>

	</div>
</div>
