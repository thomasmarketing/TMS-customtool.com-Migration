<?php
/**
 * The template for displaying 404 pages (Not Found)
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
	        <article class="site-content-primary">
	        	<h1>Oops! That page can’t be found.</h1>
				<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
				<div class="error-search">
			        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			        	<input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />            
			            <input class="search-submit" alt="Search" title="Search" value="Search" type="submit" aria-label="Search">
			        </form>
			    </div>
	        </article>
	    </div>
	    <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar','parts/shared/flexible-content'  ) ); ?>
	</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>