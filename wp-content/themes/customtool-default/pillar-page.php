<?php

	/*
		Template Name: Pillar Page
	*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<!--Site Content-->
	<section class="site-content" role="main">	    
	</section>

<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content' ) ); ?>  


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>