<?php

	/*
		Template Name: Front Page
	*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
       
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<!--Site Content-->
	<section class="site-content" role="main">	 
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content' ) ); ?>     
	</section>

<?php endwhile; ?>
<?php //Starkers_Utilities::get_template_parts( array( 'parts/resource-module' ) ); ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>