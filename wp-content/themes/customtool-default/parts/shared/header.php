<!--Site Header-->
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/search-module' ) ); ?>
<!-- Site header wrap start-->
<div class="site-header-wrap"> 
  <header class="site-header" role="banner">
    <div class="sh-mob-wrap">
      <div class="inner-wrap">
        <div class="sh-mob-logo">       
        <a href="<?php bloginfo('url'); ?>" class="site-logo">
            <?php $logo = get_field('global_company_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a> 
			<a href="https://www.customtool.com/wp-content/uploads/Custom-Tool-ISO-cert-1.pdf" target="_blank" class="iso-cert__link">
					  <img 
						   src="https://www.customtool.com/wp-content/uploads/tqcsi-1.webp"
						   alt="Custom Tool ISO cert"  title ="Custom Tool ISO cert" 
						   class="iso-cert__img" />
				  </a>
        </div>     
        <div class="sh-utility-nav">
          <a class="sh-ico-search search-link" target="_blank" href="#" aria-label="Search Icon"><span>Search</span></a>
          <a href="#menu" class="sh-ico-menu menu-link" aria-label="Menu Icon"><span>Menu</span></a>     
        </div>
      </div>
    </div>

    <!--Sticky Nav-->
      <div class="sh-sticky-wrap">
        <div class="inner-wrap">
          <div class="sh-inner">
            <div class="header-cert-wrapper desktop-view">
				  <a href="<?php bloginfo('url'); ?>" class="site-logo">
				  <?php $logo = get_field('global_company_logo','option');
					if( !empty($logo) ): ?>
					  <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
				  <?php endif;?>
				  </a>
				   <a href="https://www.customtool.com/wp-content/uploads/Custom-Tool-ISO-cert-1.pdf" target="_blank" class="iso-cert__link">
					  <img 
						   src="https://www.customtool.com/wp-content/uploads/tqcsi-1.webp"
						   alt="Custom Tool ISO cert"  title ="Custom Tool ISO cert" 
						   class="iso-cert__img" />
				  </a>
			  </div>
          <!--Site Nav-->
          <div class="site-nav-main-container">
          <div class="snc-wrap">
            <div class="site-nav-container">
            <?php wp_nav_menu(array(
            'menu'            => 'Primary Nav',
            'container'       => 'nav',
            'container_class' => 'site-nav',
            'menu_class'      => 'sn-level-1',
            'walker'        => new themeslug_walker_nav_menu
            )); ?>
            <a class="sh-ico-search search-link" target="_blank" href="#" aria-label="Search Icon"><span>Search</span></a>    
          </div>
          <!--Site Nav END-->
                   
        </div>
        </div>
        </div>
      </div>
      <!-- <a href="" class="site-nav-container-screen menu-link">&nbsp;</a> -->
    </div>
    <!--Sticky Nav-->
  </header>
    <?php if ( is_front_page() ) : ?>
      <!--Site intro container start-->
        <?php Starkers_Utilities::get_template_parts( array( 'parts/site-intro' ) ); ?>   
      <!--Site intro container end-->
    <?php else : ?>
      <!--page intro start-->    
        <?php Starkers_Utilities::get_template_parts( array( 'parts/page-intro' ) ); ?>    
      <!--page intro end-->
    <?php endif; ?>
</div>
<!-- Site header wrap end-->
