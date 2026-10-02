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
        </div>     
     
      </div>
    </div>

    <!--Sticky Nav-->
      <div class="sh-sticky-wrap">
        <div class="inner-wrap">
          <div class="sh-inner">
          <a href="<?php bloginfo('url'); ?>" class="site-logo">
          <?php $logo = get_field('global_company_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
          <?php endif;?>
          </a>
          <!--Site Nav-->
         
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
