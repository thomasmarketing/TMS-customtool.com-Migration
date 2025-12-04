<!--Site Header-->
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/search-module' ) ); ?>
<!-- Site header wrap start-->
<div class="site-header-wrap"> 
  <header class="site-header" role="banner">
    <div class="inner-wrap">
      <div class="site-utility-nav">
        <span class="sh-icons">
          <a class="sh-ico-search search-link" target="_blank" href="#" aria-label="Search Icon"><span>Search</span></a>
          <a href="#menu" class="sh-ico-menu menu-link" aria-label="Menu Icon"><span>Menu</span></a>
        </span>
      </div>
     <!--  <a href="<?php //bloginfo('url'); ?>" class="logo"><img src="<?php //bloginfo('template_url'); ?>/img/site-logo.png" alt="Site Logo"></a> -->
     
      <a href="<?php bloginfo('url'); ?>" class="site-logo">
        <?php $logo = get_field('global_company_logo','option');
        if( !empty($logo) ): ?>
          <img class="lazyload" data-src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
        <?php endif;?>
      </a>
    </div>
    <!--inner-wrap END-->
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