<!--Secondary Content-->
<aside class="site-content-secondary">
	<div class="sidebar-search">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <div class="sidebar-search-wrap"><input type="search" class="search-field" placeholder="" value="<?php echo get_search_query(); ?>" name="s" />            
            <input class="sidebar-search-btn" value="Search" type="submit" aria-label="Search"></div>
        </form>
    </div>
<h3>Recent Posts:</h3>
<ul>
<?php wp_get_archives('type=postbypost&limit=5'); ?>
</ul>
<h3><?php _e('Archives:'); ?></h3>
<ul>
<?php wp_get_archives('type=monthly&limit=5'); ?>
</ul>
<h3><?php _e('Categories:'); ?></h3>
<ul>
<?php wp_list_cats(); ?>
</ul>
</aside>