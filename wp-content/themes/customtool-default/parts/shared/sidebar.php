<!--Secondary Content-->
<aside class="site-content-secondary">

	<!-- Aside CTAs -->
	<?php if(get_field('aside_cta') ): ?>
	<div class="cta-aside">
		<?php echo get_field('aside_cta'); ?>
	</div>                 
	<?php elseif(get_field('global_aside_cta','option') ): ?>
	<div class="cta-aside">
		<?php echo get_field('global_aside_cta','option'); ?>
	</div>
	<?php endif; ?>


	<!-- Additional Aside Content -->
	<?php if(get_field('additional_aside_content') ): ?>
		<?php echo get_field('additional_aside_content'); ?>              
	<?php elseif(get_field('global_additional_aside_content','option') ): ?>
		<?php echo get_field('global_additional_aside_content','option'); ?>
	<?php endif; ?>

</aside>


