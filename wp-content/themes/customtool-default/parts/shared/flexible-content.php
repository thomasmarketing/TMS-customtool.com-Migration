
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
    while ( have_rows('flexible_content') ) : the_row(); ?>

	<?php if( get_row_layout() == 'tab_content' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="accordian-tabs-module">
			 	<div class="inner-wrap">		 	
			 		<?php if( get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<?php if( get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>

					<ul class="accordion-tabs">
						<?php if( have_rows('tab_content_row') ): while ( have_rows('tab_content_row') ) : the_row(); ?>
							<li class="tab-header-and-content">
								<a href="javascript:void(0)" class="tab-link"><?php echo get_sub_field('tab_header'); ?></a>
								<div class="tab-content"><p><?php echo get_sub_field('tab_body'); ?></p></div>							
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<?php if( get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>			
				</div>
			</section>
		<?php endif; ?>

	<?php elseif( get_row_layout() == 'full_width_cta' ): ?>

		<section class="full-width-cta-test">
			<?php if( get_sub_field('section_header')): ?><div class="inner-wrap"><h2 class="cta-banner-header"><?php echo get_sub_field('section_header'); ?></h2></div><?php endif; ?>
			<section class="fwc-module">
				<div class="inner-wrap">		
					<div class="row cta-banner bottom-baseline">
			            <p class="h2 cta-banner-body"><?php echo get_sub_field('section_body'); ?></p>	
			       		<?php
						$cta_button = get_sub_field('cta_button');
						if($cta_button):
						$link_url = $cta_button['url'];
						$link_title = $cta_button['title'];
						$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
						?>
						<div class="fw-cta-wrap"><a class="btn-color fw-cta" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a></div>
						<?php endif; ?> 
			        </div>
				</div>
			</section>			
			<?php if( get_sub_field('divider')): ?>
				<div class="inner-wrap"><hr></div>
			<?php endif; ?>
		</section>		
        

 	<?php elseif( get_row_layout() == 'multiple_columns' ): ?>
 		<section class="multiple-cols-module" <?php if( get_sub_field('bg_color')): ?>style="background-color:<?php echo get_sub_field('bg_color'); ?>"<?php endif; ?> <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
		 	<div class="inner-wrap">	
		 		<?php if( get_sub_field('section_header')): ?>
					<h2><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
				<?php endif; ?>
				<section class="<?php if (get_sub_field('number_columns') == '2') {
						echo 'rows-of-2';
					} else if (get_sub_field('number_columns') == '3') {
					        echo 'rows-of-3';
					} else if (get_sub_field('number_columns') == '4') {
					        echo 'rows-of-4';
					}
					?> <?php if( get_sub_field('new_class')): ?><?php echo get_sub_field('new_class'); ?><?php endif; ?>">

		         	<?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
						<div><?php echo get_sub_field('content_column'); ?></div>
					<?php endwhile; ?>
					<?php endif; ?>				
				</section>
				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
 		</section>	

	<?php elseif( get_row_layout() == 'img_gallery_section' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="image-gallery-module">
				<div class="inner-wrap">	
					<?php if( get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<section class="popup-gallery <?php if (get_sub_field('number_columns') == '2') {
								echo 'rows-of-2';
							} else if (get_sub_field('number_columns') == '3') {
							        echo 'rows-of-3';
							} else if (get_sub_field('number_columns') == '4') {
							        echo 'rows-of-4';
							}
							?>">
						<?php $images = get_sub_field('img_gallery');
							if( $images ): ?>
								<?php foreach( $images as $image ): ?>
			                    	<a href="<?php echo $image['sizes']['large']; ?>" class=" loop-item">
				                    	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"/>
			                    		<h3 class="li-title"><?php echo $image['caption']; ?></h3>
			                    	</a>
								<?php endforeach; ?>
							<?php endif; ?>
					</section>
					<?php if( get_sub_field('divider')): ?>
							<hr>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
		
		
			
	<?php elseif( get_row_layout() == 'img_gallery_with_thumbnails' ): ?>
    <section class="image-gallery-with-thumbs">
          <div class="inner-wrap"><?php if( get_sub_field('imt_section_header')): ?>
            <h2><span><?php echo get_sub_field('imt_section_header'); ?></span></h2><?php endif; ?>
            
            <?php $images = get_sub_field('imgwt_gallery');
              if( $images ): ?>
            <div class="innerpage-carousel">
              <div id="slider"  class="slides slider-for popup-gallery">
                <?php foreach( $images as $image ): ?>
                <div class="item">
                  <a href="<?php echo $image['sizes']['large']; ?>">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
                  </a>
                </div>  
                 <?php endforeach; ?>
              </div>
              <div id="carousel" class="slides slider-nav">
                 <?php foreach( $images as $image ): ?>
                <div class="item">
                  <a href="javascript:void(0)" class="slider-nav-item">
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"/>
                  </a>
                </div>
                <?php endforeach; ?>        
              </div>           
            </div> <?php endif; ?>
           <?php if( get_sub_field('divider')): ?>
        <hr>
      <?php endif; ?>
      </div>
    </section>


	<?php elseif( get_row_layout() == 'image_gallery_without_thumbnails' ): ?>
		<?php if( get_sub_field('wim_slider')): ?>

			<?php $img = get_sub_field('wim_slider');
			if( $img ): ?>	
				<div class="inner-wrap">
			       	<section class="innerpage-carousel-widthout-thumb">
			       		<div class="icwt-slider popup-gallery">
							<?php foreach( $img as $image ): ?>
			                <div class="item">
			                  	<a href="<?php echo $image['sizes']['large']; ?>">
									<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php $image['alt']; ?>" title="<?php $image['alt']; ?>"/>
								</a>
			                </div> 
			 				<?php endforeach; ?>  
	              		</div>
	         		</section>
              		<?php if( get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
	 		 	</div>
			<?php endif; ?>
		<?php endif; ?>


	<?php elseif( get_row_layout() == 'click_expand' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="click-expand-module">
				<div class="inner-wrap">
					<div class="click-expand <?php if( get_sub_field('spacing')): ?>spacing-bottom<?php endif; ?>">
			          <h3 class="ce-header" tabindex="0"><?php echo get_sub_field('section_header'); ?></h3>
			          <div class="ce-body"><?php echo get_sub_field('section_body'); ?></div>
			      	</div>
			    </div>
			</section>	        
		<?php endif; ?>

 			
	<?php elseif( get_row_layout() == 'table' ): ?>
		<section class="tabular-data">
		   <div class="inner-wrap">
		        <?php if( get_sub_field('section_header')): ?>
		            <div class="headexpand-wrap">  
		            	<h2 class="headexpand"><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
							<?php if( get_sub_field('section_header')): ?>
								<h3 class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></h3>
							<?php endif; ?>
					        <?php if( get_sub_field('table_content')): ?>
					            <div class="table-wrap">
					                <table class="tablesaw tablesaw-stack" data-tablesaw-mode="stack">
					                	<?php echo get_sub_field('table_content'); ?>
					                </table>
					            </div>
					        <?php endif; ?>
					        <?php if( get_sub_field('section_header')): ?>
		           </div> 
		           <!--headexpand-wrap END -->
		        <?php endif; ?>

		        <?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>	


	<?php elseif( get_row_layout() == 'product_grid' ): ?>
		<section class="product-grid-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('section_header')): ?>
					<h2 class="carousel-header"><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p><?php echo get_sub_field('section_subtext'); ?></p>
				<?php endif; ?>

				<div class="product-item-wap">
					<div class="product-items">
						<?php if( have_rows('product_row') ): while ( have_rows('product_row') ) : the_row(); ?>
							<div>
								<?php 	
																	
									$link = get_sub_field('product_url');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										?>
										<a class="product-item" href="<?php echo esc_url($link_url); ?>"> 
											<span class="product-img">
												<?php if(get_sub_field('product_picture')) : ?>
													<?php $product_picture = get_sub_field('product_picture'); ?>
													   <img class="pmi-img" src="<?php echo $product_picture['sizes']['product_thumb']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>">
												<?php endif; ?>
											</span>									
											<span class="product-title"><?php echo esc_html($link_title); ?></span>
										</a>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>
					</div>

				</div>


				<div class="<?php if( get_sub_field('carousel')): ?>flexslider<?php endif; ?> product-carousel">
					<ul class="slides">
						<?php if( have_rows('product_row') ): while ( have_rows('product_row') ) : the_row(); ?>
							<li>
								
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>

	<?php elseif( get_row_layout() == 'text_media' ): ?>
		<section class="text-media-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('section_header')): ?>
					<h2><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>			

				<div class="rows-of-2">
	              <div>
	                <?php echo get_sub_field('media'); ?>
	              </div>
	              <div>
	                <?php echo get_sub_field('text'); ?>
	              </div>
	            </div>

				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>

	<?php elseif( get_row_layout() == 'heading_wrap' ): ?>
		<!-- Headign with BG -->
		<div class="heading-wrap">
			<div class="inner-wrap">
				<div class="rows-of-2">
				    <div class="on-light-bg">
					    <div class="hw-txt">
					    	<h1 class="lb-title"><?php echo get_sub_field('lh_heading'); ?></h1>
					        <h2><?php echo get_sub_field('lh_sub_heading'); ?></h2>
					        <p><?php echo get_sub_field('lh_intro_text'); ?></p>
					    </div>
				    </div>
				    <div class="on-color-bg">
					    <div class="hw-txt">                
					        <h1><?php echo get_sub_field('right_heading'); ?></h1>
					        <h2><?php echo get_sub_field('right_subheading'); ?></h2>
					        <p><?php echo get_sub_field('right_intro_text'); ?></p>
					    </div>
				    </div>
				</div>
			</div>
		</div>
		<!-- Headign with BG -->

	<?php elseif( get_row_layout() == 'image_content_grid_module' ): ?>
		<section class="image-content-grid-module">
			<div class="inner-wrap">
				<?php if (get_sub_field('icgm_section_heading')): ?>
					<h2 class="icgm-section-heading"><?php echo get_sub_field('icgm_section_heading') ?></h2>
				<?php endif ?>

				<?php if (get_sub_field('icgm_section_description')): ?>
					<p class="icgm-section-description"><?php echo get_sub_field('icgm_section_description') ?></p>
				<?php endif ?>

				<?php if (get_sub_field('number_of_columns') == '2') {
					$gridClass = 'tse-cols-2';
				} else if (get_sub_field('number_of_columns') == '3') {
				        $gridClass = 'tse-cols-3';
				} else if (get_sub_field('number_of_columns') == '4') {
				        $gridClass = 'tse-cols-4';
				} else {
					$gridClass = '';
				}
				?>

				<?php if (have_rows('icgm_items')): ?>
				<div class="<?php echo $gridClass; ?> icgm-wrap">

					<?php while (have_rows('icgm_items')): the_row(); ?>
					<div class="icgm-item">
						<?php 
						$icgm_image = get_sub_field('icgm_img');
						$icgm_img_title = get_sub_field('icgm_heading') ? get_sub_field('icgm_heading') : $icgm_image['alt'];
						if( !empty( $icgm_image ) ): ?>
							<?php 
							$link = get_sub_field('icgm_link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'] ? $link['title'] : 'Learn More';
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="icgm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
							<?php else: ?>
								<a href="<?php echo esc_url($icgm_image['url' ]); ?>" class="icgm-link lightbox">
							<?php endif;?>
						    	<img class="icgm-img" src="<?php echo esc_url($icgm_image['url' ]); ?>" alt="<?php echo esc_attr($icgm_img_title); ?>" title="<?php echo esc_attr($icgm_img_title); ?>" />
						    <?php //if (get_sub_field('icgm_link')): ?>
								</a>
							<?php //endif ?>
						<?php endif; ?>

						<?php if (get_sub_field('icgm_heading')): ?>
							<h3 class="icgm-heading">
								<?php if ($link): ?>
									<a class="icgm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<?php endif ?>
									<?php echo get_sub_field('icgm_heading') ?>
								<?php if (get_sub_field('icgm_link')): ?>
								</a>
							<?php endif ?>	
							</h3>
						<?php endif ?>

						<?php if (get_sub_field('icgm_description')): ?>
							<p class="icgm-description"><?php echo get_sub_field('icgm_description') ?></p>
						<?php endif ?>

						<?php if ($link): ?>
							<a class="icgm-btn btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_url( $link_title ); ?> ?></a>
						<?php endif ?>
					</div>
					<?php endwhile ?>

				</div>
				<?php endif ?>
			</div>
		</section>


	<?php elseif( get_row_layout() == 'internal_page_cta_module' ): ?>    
	
      <section class="internal-page-cta-module">
        <div class="inner-wrap">
          <?php if( get_sub_field('ipcm_heading')): ?>
          <h2 class="hfwc-heading"><?php echo get_sub_field('ipcm_heading'); ?></h2>
          <?php endif; ?>	
          <div class="hfwc-cta">
          	<?php
			$ipcm_cta_one = get_sub_field('ipcm_cta_one');
			if($ipcm_cta_one):
			$link_url = $ipcm_cta_one['url'];
			$link_title = $ipcm_cta_one['title'];
			$link_target = $ipcm_cta_one['target'] ? $ipcm_cta_one['target'] : '_self';
			?>
            <a class="btn" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a>
            <?php endif; ?>

            <?php
			$ipcm_cta_two = get_sub_field('ipcm_cta_two');
			if($ipcm_cta_two):
			$link_url = $ipcm_cta_two['url'];
			$link_title = $ipcm_cta_two['title'];
			$link_target = $ipcm_cta_two['target'] ? $ipcm_cta_two['target'] : '_self';
			?>
            <a class="btn-alt" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a>
            <?php endif; ?>

          </div>
        </div>
      </section>


      <?php elseif( get_row_layout() == 'pillar_page_nav_module' ): ?>    
      <section class="internal-links-nav"  <?php if( get_sub_field('class')): ?> id="<?php echo get_sub_field('class'); ?>"<?php endif; ?>>
      	<div class="wrap">
			<div class="isn-wrap">
				<?php if( have_rows('isn_link_wrap') ): ?>
				<ul class="internal-links-wrap">
					<?php while ( have_rows('isn_link_wrap') ) : the_row(); ?>

					<li>
						<?php $link = get_sub_field('isn_add_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="super-smooth"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>	
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
      	</div>
		</section>	

		<?php elseif( get_row_layout() == 'destination_bucket_page_module' ): ?> 
		<section class="destination-bucket-page-module">
			<div class="inner-wrap">
				<div class="dbpm-buckets-wrap">
					<?php if( have_rows('dbpm_buckets') ): while ( have_rows('dbpm_buckets') ) : the_row(); ?>
						<div class="dbpm-buckets">
							<?php if(get_sub_field('dbpm_image')) : ?>
							<?php $dbpm_image = get_sub_field('dbpm_image'); ?>
							<div class="dbpm-image">
							   	<img src="<?php echo $dbpm_image['url']; ?>" alt="<?php echo $dbpm_image['title']; ?>" title="<?php echo $dbpm_image['title']; ?>">
							</div>
							<?php endif; ?>
							<div class="dbpm-content">
								<?php if( get_sub_field('dbpm_title')): ?>
						        <h2 class="dbpm-heading"><?php echo get_sub_field('dbpm_title'); ?></h2>
						        <?php endif; ?>

						        <?php if( get_sub_field('dbpm_desc')): ?>
						        <div><?php echo get_sub_field('dbpm_desc'); ?></div>
						        <?php endif; ?>

						        <?php
								$dbpm_link = get_sub_field('dbpm_link');
								if($dbpm_link):
								$link_url = $dbpm_link['url'];
								$link_title = $dbpm_link['title'];
								$link_target = $dbpm_link['target'] ? $dbpm_link['target'] : '_self';
								?>
								<div class="dbpm-cta-wrap">
					            	<a class="btn" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a>
								</div>
					            <?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>	
					<?php endif; ?>
				</div>
			</div>
		</section>   

		<?php elseif( get_row_layout() == 'testimonial_content_module' ): ?>
		<section class="testimonial-content-module">
			<div class="inner-wrap">
			<?php if( get_sub_field('tcm_content')): ?>
				<div class="tcm-content">
					<?php echo get_sub_field('tcm_content'); ?>
				</div>
			<?php endif; ?>	
			<?php if( get_sub_field('tcm_details')): ?>
				<p class="tcm-details"><?php echo get_sub_field('tcm_details'); ?></p>
			<?php endif; ?>	
			</div>
		</section>		

		<?php elseif( get_row_layout() == 'homepage_industries_module' ): ?>
		<section class="homepage-industries-module" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
			<div class="him-top-wrap" <?php if( get_sub_field('him_bg')): ?>style="background-image: url(<?php echo get_sub_field('him_bg'); ?>);"<?php endif; ?>>
				<div class="inner-wrap">
					<?php if( get_sub_field('him_heading')): ?>
					<div class="section-heading-wrap"><h2 class="him-heading"><?php echo get_sub_field('him_heading'); ?></h2></div>
					<?php endif; ?>	
					<?php if( get_sub_field('him_subhead')): ?>
					<p class="him-subhead"><?php echo get_sub_field('him_subhead'); ?></p>
					<?php endif; ?>	
				</div>
			</div>			
			<div class="him-middle-wrap">
				<div class="inner-wrap">
				<?php if( get_sub_field('himb_heading')): ?>
					<h2 class="himb-heading"><?php echo get_sub_field('himb_heading'); ?></h2>
				<?php endif; ?>	
				<?php if( have_rows('himb_items') ): ?>
				<div class="himb-items">
				<?php while ( have_rows('himb_items') ) : the_row(); ?>
					<div class="himb-item">
					<?php if( get_sub_field('himb_title')): ?>
						<span class="h4 himb-title"><?php echo get_sub_field('himb_title'); ?></span><?php endif; ?>	
						<?php $image = get_sub_field('himb_icon');
						if( !empty( $image ) ): ?>
						    <figure class="himb-icon"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" /></figure>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>	
				</div>
			</div>			
			<?php if( get_sub_field('himo_content') && get_sub_field('himo_image')): ?>
			<div class="him-others-wrap">
				<div class="himo-wrap">
					<div class="himo-left">
						<?php if( get_sub_field('himo_heading')): ?>
						<div class="section-heading-wrap"><h2 class="himo-heading"><?php echo get_sub_field('himo_heading'); ?></h2>
						</div>
					<?php endif; ?>	
					<?php if( get_sub_field('himo_content')): ?>
						<div class="himo-content"><?php echo get_sub_field('himo_content'); ?></div>
					<?php endif; ?>	
					</div>
					<div class="himo-right">
						<?php $image = get_sub_field('himo_image');
						if( !empty( $image ) ): ?>
						    <img  class="himo-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" />
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>	
		</section>	

		<?php elseif( get_row_layout() == 'homepage_service_module' ): ?>
		<section class="homepage-service-module">
				<div class="hsm-wrap">
					<div class="hsm-left">
					<?php if( get_sub_field('hsm_image')): ?>
						<div class="hsm-bg" style="background-image: url(<?php echo get_sub_field('hsm_image'); ?>);"></div><?php endif; ?>	
					</div>
					<div class="hsm-right">
						<?php if( get_sub_field('hsm_heading')): ?>
							<div class="section-heading-wrap"><h2 class="hsm-heading"><?php echo get_sub_field('hsm_heading'); ?></h2></div>
						<?php endif; ?>	
						<?php if( get_sub_field('hsm_content')): ?>
							<div class="hsm-content"><?php echo get_sub_field('hsm_content'); ?></div>
						<?php endif; ?>	
					</div>
				</div>
		</section>	

		<?php elseif( get_row_layout() == 'homepage_choose_ctg_module' ): ?>
		<section class="homepage-choose-ctg-module <?php if( get_sub_field('add_box_shadow')): ?>hccm-shadow<?php endif; ?> <?php if( get_sub_field('enable_background_color')): ?>hccm-bg-color<?php endif; ?>">
			<div class="inner-wrap">
				<div class="section-heading-wrap">
				<?php if( get_sub_field('hccm_heading')): ?>
					<h2 class="hccm-heading"><?php echo get_sub_field('hccm_heading'); ?></h2>
				<?php endif; ?>	
				<?php if( get_sub_field('hccm_subhead')): ?>
					<p class="hccm-subhead"><?php echo get_sub_field('hccm_subhead'); ?></p>
				<?php endif; ?>	
				</div>
				<?php if( have_rows('hccm_items') ): ?>
				<div class="hccm-items">
				<?php while ( have_rows('hccm_items') ) : the_row(); ?>
					<div class="hccm-item">
						<?php $image = get_sub_field('hccm_icon');
						if( !empty( $image ) ): ?>
						    <figure class="hccm-icon"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" /></figure>
						<?php endif; ?>
						<div class="hccm-content">
						<?php if( get_sub_field('hccm_title')): ?>
						<h3 class="h3 hccm-title"><?php echo get_sub_field('hccm_title'); ?></h3><?php endif; ?>	
						<?php if( get_sub_field('hccm_desc')): ?>
						<p class="hccm-desc"><?php echo get_sub_field('hccm_desc'); ?></p><?php endif; ?>	
						</div>
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>	
			</div>
		</section>	

		<?php elseif( get_row_layout() == 'homepage_video_module' ): ?>
		<section class="homepage-video-module">
			<div class="hvm-wrap">
				<div class="hvm-left">
					<div class="hvml-inner">
					<?php if( get_sub_field('hvm_heading')): ?>
						<h2 class="hvm-heading"><?php echo get_sub_field('hvm_heading'); ?></h2>
					<?php endif; ?>	
					<?php if( get_sub_field('hvm_content')): ?>
						<div class="hvm-content"><?php echo get_sub_field('hvm_content'); ?></div>
					<?php endif; ?>		
					<?php $link = get_sub_field('hvm_cta');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <div class="hvm-cta-wrap"><a class="btn hvm-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
					<?php endif; ?>		
					</div>		
				</div>
				<div class="hvm-right">
					<?php if( get_sub_field('hvm_video_link')): ?>
						<a class="popup-youtube" href="<?php echo get_sub_field('hvm_video_link'); ?>">
						<?php $image = get_sub_field('hvm_video_image');
						if( !empty( $image ) ): ?>
						    <img class="hvmv-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</section>	

		<?php elseif( get_row_layout() == 'custom_tooling_services_module' ): ?>
		<section class="custom-tooling-services-module" <?php if( get_sub_field('ctsm_bg')): ?>style="background-image: url(<?php echo get_sub_field('ctsm_bg'); ?>);"<?php endif; ?>>
			<div class="inner-wrap">
			<div class="ctsm-wrap">
				<div class="ctsm-left">
					<?php $image = get_sub_field('ctsm_image');
						if( !empty( $image ) ): ?>
						    <img class="ctsm-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" />
					<?php endif; ?>	
				</div>
				<div class="ctsm-right">
					<?php if( get_sub_field('ctsm_heading')): ?>
						<h2 class="ctsm-heading"><?php echo get_sub_field('ctsm_heading'); ?></h2>
					<?php endif; ?>	
					<?php if( get_sub_field('ctsm_subhead')): ?>
						<p class="section-subhead ctsm-subhead"><?php echo get_sub_field('ctsm_subhead'); ?></p>
					<?php endif; ?>	
					<div class="ctsmr-wrap">	
						<div class="ctsmr-left">
							<?php if( get_sub_field('ctsm_left_content')): ?>
							<div class="ctsml-content"><?php echo get_sub_field('ctsm_left_content'); ?></div>
							<?php endif; ?>		
						</div>
						<div class="ctsmr-right">
							<?php if( get_sub_field('ctsm_right_content')): ?>
							<div class="ctsmr-content"><?php echo get_sub_field('ctsm_right_content'); ?></div>
							<?php endif; ?>		
						</div>
					</div>
					<?php $link = get_sub_field('ctsm_cta');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <div class="ctsm-cta-wrap"><a class="btn ctsm-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		</section>	

		<?php elseif( get_row_layout() == 'capabilities_matrix_single_module' ): ?>
		<section class="capabilities-matrix-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('cmm_heading')): ?>
					<h2 class="cmm-heading"><?php echo get_sub_field('cmm_heading'); ?></h2>
				<?php endif; ?>	
				<div class="cmm-wrap">
				<div class="cmm-inner">
				<?php if( get_sub_field('cmm_title')): ?>
					<h3 class="cmm-title"><?php echo get_sub_field('cmm_title'); ?></h3>
				<?php endif; ?>	
				<?php if( have_rows('cmm_items') ): ?>
				<div class="cmm-items">
				<?php while ( have_rows('cmm_items') ) : the_row(); ?>
					<div class="cmm-item">
					<?php if( get_sub_field('cmm_subtitle')): ?>
						<span class="cmm-subtitle"><?php echo get_sub_field('cmm_subtitle'); ?></span>
					<?php endif; ?>	
					<?php if( get_sub_field('cmm_content')): ?>
						<div class="cmm-content"><?php echo get_sub_field('cmm_content'); ?></div>
					<?php endif; ?>	
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>	
				</div>
				</div>

				<?php if( have_rows('cmm_bucket_items') ): ?>
				<div class="cmmb-items">
				<?php while ( have_rows('cmm_bucket_items') ) : the_row(); ?>
					<div class="cmmb-wrap cmmb-item">
						<div class="cmmb-inner">
						<?php if( get_sub_field('cmmb_title')): ?>
							<h3 class="cmm-title cmmb-title"><?php echo get_sub_field('cmmb_title'); ?></h3>
						<?php endif; ?>	
						<div class="cmmb-content-wrap">
							<?php if( get_sub_field('cmmb_subtitle')): ?>
								<span class="cmm-subtitle cmmb-subtitle"><?php echo get_sub_field('cmmb_subtitle'); ?></span>
							<?php endif; ?>	
							<?php if( get_sub_field('cmmb_content')): ?>
								<div class="cmm-content cmmb-content"><?php echo get_sub_field('cmmb_content'); ?></div>
							<?php endif; ?>	
						</div>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>	
				<?php $link = get_sub_field('cmm_cta'); 				 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <?php if( $link ): ?>
				    <div class="cmm-cta-wrap">
				    <a class="btn cmm-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>				
					<?php $link2 = get_sub_field('cmm_cta2');
					if( $link2 ): 
				    $link_url = $link2['url'];
				    $link_title = $link2['title'];
				    $link_target = $link2['target'] ? $link2['target'] : '_self';
				    ?>
				    <a class="btn cmm-cta cmm-cta2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>
		</section>	

		<?php elseif( get_row_layout() == 'image_with_content_module' ): ?>
		<section class="image-with-content-module <?php if( get_sub_field('add_section_padding_make_equal_section')): ?>iwcm-equal<?php endif; ?>">
				<div class="iwcm-wrap">
					<div class="iwcm-left">
						<?php if( get_sub_field('iwcm_heading')): ?>
							<h2 class="iwcm-heading"><?php echo get_sub_field('iwcm_heading'); ?></h2>
						<?php endif; ?>	
						<?php if( get_sub_field('iwcm_content')): ?>
							<div class="iwcm-content"><?php echo get_sub_field('iwcm_content'); ?></div>
						<?php endif; ?>	
					</div>
					<div class="iwcm-right">					
					<?php if( get_sub_field('iwcm_image')): ?>
						<div class="iwcm-bg" style="background-image: url(<?php echo get_sub_field('iwcm_image'); ?>);"></div><?php endif; ?>	
					</div>					
					
				</div>
		</section>	

		<?php elseif( get_row_layout() == 'product_bucket_module' ): ?>
		<section class="product-bucket-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('pbm_heading')): ?>
					<h2 class="pbm-heading"><?php echo get_sub_field('pbm_heading'); ?></h2>
				<?php endif; ?>	
				<?php if( get_sub_field('pbm_subhead')): ?>
					<p class="section-subhead pbm-subhead"><?php echo get_sub_field('pbm_subhead'); ?></p>
				<?php endif; ?>
				<?php if( have_rows('pbm_items') ): ?>
				<div class="pbm-items">
				<?php while ( have_rows('pbm_items') ) : the_row(); ?>
					<div class="pbm-item">
						<?php $link = get_sub_field('pbm_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a class="pbm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>
						    <?php $image = get_sub_field('pbm_image');
						if( !empty( $image ) ): ?>
						    <img class="pbm-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" />
						<?php endif; ?>
						    </a>
												 <!-- ✅ Only renders on pillar page template -->
									<?php if( is_page_template('pillar-page.php') ): ?>
										<a class="pbm-view-all-btn"
										href="<?php echo esc_url( $link_url ); ?>"
										target="<?php echo esc_attr( $link_target ); ?>">
											View More
										</a>
									<?php endif; ?>

						<?php endif; ?>
						<?php if( get_sub_field('pbm_title')): ?>
						<span class="pbm-title"><?php echo get_sub_field('pbm_title'); ?></span>
						<?php endif; ?>	
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<?php $link = get_sub_field('pbm_cta');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="btn pbm-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>

			</div>
		</section>	

		<?php elseif( get_row_layout() == 'background_image_with_headline' ): ?>
		<section class="background-image-with-headline" <?php if( get_sub_field('biwh_bg')): ?>style="background-image: url(<?php echo get_sub_field('biwh_bg'); ?>);"<?php endif; ?>>
			<div class="inner-wrap">
				<?php if( get_sub_field('biwh_heading')): ?>
					<h2 class="biwh-heading"><?php echo get_sub_field('biwh_heading'); ?></h2>
				<?php endif; ?>	
			</div>	
		</section>

		<?php elseif( get_row_layout() == 'contact_form_module' ): ?>
		<section class="contact-form-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('cfm_form')): ?>
					<div class="cfm-form"><?php echo get_sub_field('cfm_form'); ?></div>
				<?php endif; ?>	
			</div>
		</section>	

		<?php elseif( get_row_layout() == 'background_image_with_content_module' ): ?>
		<section class="background-with-content-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('biwcm_heading')): ?>
					<h2 class="biwcm-heading"><?php echo get_sub_field('biwcm_heading'); ?></h2>
				<?php endif; ?>	
				<?php if( get_sub_field('biwcm_content')): ?>
					<div class="biwcm-content"><?php echo get_sub_field('biwcm_content'); ?></div>
				<?php endif; ?>	
			</div>	
		</section>	

		<?php elseif( get_row_layout() == 'about_content_module' ): ?>
		<section class="about-content-module">
			<div class="acm-wrap">
				<?php if( have_rows('acm_items') ): ?>
				<div class="acm-items">
				<?php while ( have_rows('acm_items') ) : the_row(); ?>
					<div class="acm-item">						
						<?php if( get_sub_field('acm_heading')): ?>
						<div class="section-heading-wrap acm-heading-wrap"><h2 class="acm-heading"><?php echo get_sub_field('acm_heading'); ?></h2></div>
					<?php endif; ?>	
				
					<?php if( get_sub_field('acm_content')): ?>
						<div class="acm-content"><?php echo get_sub_field('acm_content'); ?></div>
					<?php endif; ?>	
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; ?>				
			</div>	
		</section>	

		<?php elseif( get_row_layout() == 'form_module' ): ?>
		<section class="form-module" <?php if( get_sub_field('fm_bg')): ?>style="background-image: url(<?php echo get_sub_field('fm_bg'); ?>);"<?php endif; ?>>
			<div class="inner-wrap">
				<?php if( get_sub_field('fm_form')): ?>
					<div class="fm-form-wrap">
						<div class="fm-form"><?php echo get_sub_field('fm_form'); ?></div>
						<?php if( get_sub_field('fm_bottom_text')): ?>
						<div class="fm-bottom-text"><?php echo get_sub_field('fm_bottom_text'); ?></div>
					<?php endif; ?>
					</div>
				<?php endif; ?>	
			</div>	
		</section>	

		<?php elseif( get_row_layout() == 'form_thank_you_module' ): ?>
		<section class="form-thank-you-module" <?php if( get_sub_field('ftym_bg')): ?>style="background-image: url(<?php echo get_sub_field('ftym_bg'); ?>);"<?php endif; ?>>
			<div class="inner-wrap">
				<div class="ftym-top-wrap">
				<?php if( get_sub_field('ftym_heading')): ?>
					<h2 class="ftym-heading"><?php echo get_sub_field('ftym_heading'); ?></h2>
				<?php endif; ?>	
				<?php if( get_sub_field('ftym_subhead')): ?>
					<p class="ftym-subhead"><?php echo get_sub_field('ftym_subhead'); ?></p>
				<?php endif; ?>	
				</div>
				<div class="ftym-bottom-wrap">
				<?php if( get_sub_field('ftym_text')): ?>
					<p class="ftym-text"><?php echo get_sub_field('ftym_text'); ?></p>
				<?php endif; ?>
				<?php $link = get_sub_field('ftym_cta');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="btn-color ftym-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
				</div>
			</div>	
		</section>
		
		<?php elseif( get_row_layout() == 'anchor_links_nav_module' ): ?>
	<section class="internal-links-nav new-pp-links">
		<div class="inner-wrap">
			<ul>
				<?php if( have_rows('list_items') ): while ( have_rows('list_items') ) : the_row(); ?>
					<li>
						<?php 
						$link = get_sub_field('aln_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a class="aln-link smooth-scroll" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</li>
				<?php endwhile;endif; ?>
			</ul>
		</div>
	</section>

	<?php elseif( get_row_layout() == 'capabilities_section' ): ?>
    <section class="cap-section">
        <div class="inner-wrap">
            <div class="cap-top">
                <div class="cap-text">
                    <?php if( get_sub_field('capabilities_intro_text') ): ?>
                        <?php echo wp_kses_post(get_sub_field('capabilities_intro_text')); ?>
                    <?php endif; ?>
                </div>

                <?php if( get_sub_field('capabilities_image') ): ?>
                <div class="cap-image">
                    <img  alt="Custom Tools" title="Custom Tools"  src="<?php echo get_sub_field('capabilities_image'); ?>" loading="lazy" />
                </div>
                <?php endif; ?>
            </div>

            <?php $cap_skills = get_sub_field('capabilities_skills');
            if( $cap_skills ): ?>
            <div class="cap-skills-grid">
                <?php foreach( $cap_skills as $skill ): ?>
                    <div class="cap-skill-card" href="#<?php echo sanitize_title($skill['skill_name']); ?>-section">
                        <?php echo esc_html($skill['skill_name']); ?>
				</div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if( get_sub_field('bottom_content') ): ?>
            <div class="cap-bottom-content">
                <?php echo wp_kses_post(get_sub_field('bottom_content')); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

	<?php elseif( get_row_layout() == 'complex_precision_section'  ): ?>
    <section class="cps-section" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
        <div class="inner-wrap">

            <?php if( get_sub_field('section_heading') ): ?>
                <h2 class="cps-heading"><?php echo esc_html(get_sub_field('section_heading')); ?></h2>
            <?php endif; ?>

            <?php if( get_sub_field('section_intro_text') ): ?>
                <div class="cps-intro">
                    <?php echo wp_kses_post(get_sub_field('section_intro_text')); ?>
                </div>
            <?php endif; ?>

            <div class="cps-bottom">
                <?php if( get_sub_field('section_image') ): ?>
                <div class="cps-image">
                    <?php $section_image = get_sub_field('section_image'); ?>
                    <img
                        src="<?php echo esc_url($section_image['url']); ?>"
                        alt="<?php echo esc_attr($section_image['alt']); ?>"
                        title="<?php echo esc_attr($section_image['title']); ?>"
                        loading="lazy"
                    />
                </div>
                <?php endif; ?>

                <?php if( get_sub_field('section_content') ): ?>
                <div class="cps-content">
                    <?php echo wp_kses_post(get_sub_field('section_content')); ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
	<?php elseif( get_row_layout() == 'content_image_module' ): ?>
    <section class="cto-section" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
        <div class="inner-wrap">

            <div class="cto-wrap">
                <div class="cto-left">
                    <?php if( get_sub_field('cto_heading') ): ?>
                        <h2 class="cto-heading"><?php echo esc_html(get_sub_field('cto_heading')); ?></h2>
                    <?php endif; ?>

                    <?php if( get_sub_field('cto_content') ): ?>
                        <div class="cto-content">
                            <?php echo wp_kses_post(get_sub_field('cto_content')); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php $cto_image = get_sub_field('cto_image');
                if( $cto_image ): ?>
                <div class="cto-right">
                    <img
                        src="<?php echo esc_url($cto_image['url']); ?>"
                        alt="<?php echo esc_attr($cto_image['alt']); ?>"
                        title="<?php echo esc_attr($cto_image['title']); ?>"
                        loading="lazy"
                    />
                </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
<?php elseif( get_row_layout() == 'image_text_content_module' ): ?>
    <section class="itc-section" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
        <div class="inner-wrap">

            <div class="itc-wrap <?php if( get_sub_field('itc_reverse') ): ?>itc-reverse<?php endif; ?>">

                <?php $itc_image = get_sub_field('itc_image');
                if( $itc_image ): ?>
                <div class="itc-image">
                    <img
                        src="<?php echo esc_url($itc_image['url']); ?>"
                        alt="<?php echo esc_attr($itc_image['alt']); ?>"
                        title="<?php echo esc_attr($itc_image['title']); ?>"
                        loading="lazy"
                    />
                </div>
                <?php endif; ?>

                <div class="itc-content">
                    <?php if( get_sub_field('itc_heading') ): ?>
                        <h2 class="itc-heading"><?php echo esc_html(get_sub_field('itc_heading')); ?></h2>
                    <?php endif; ?>

                    <?php if( get_sub_field('itc_content') ): ?>
                        <div class="itc-text">
                            <?php echo wp_kses_post(get_sub_field('itc_content')); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <?php if( get_sub_field('itc_bottom_content') ): ?>
            <div class="itc-bottom">
                <?php echo wp_kses_post(get_sub_field('itc_bottom_content')); ?>
            </div>
            <?php endif; ?>

        </div>
    </section>
	<?php elseif( get_row_layout() == 'industries_we_serve' ): ?>
    <section class="iws-section" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
        <div class="inner-wrap">

            <?php if( get_sub_field('iws_heading') ): ?>
                <h2 class="iws-heading"><?php echo esc_html(get_sub_field('iws_heading')); ?></h2>
            <?php endif; ?>

            <?php $industries = get_sub_field('iws_industries');
            if( $industries ): ?>

            <div class="iws-wrap">
                <div class="iws-box">

                    <!-- Industry List -->
                    <div class="iws-list">
                        <?php foreach( $industries as $index => $industry ): ?>
                            <div class="iws-item <?php echo $index === 0 ? 'iws-active' : ''; ?>"
                                 data-index="<?php echo $index; ?>">
                                <?php echo esc_html($industry['iws_name']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Industry Images -->
                    <div class="iws-images">
                        <?php foreach( $industries as $index => $industry ):
                            $img = $industry['iws_image'];
                            if( $img ): ?>
                            <div class="iws-image <?php echo $index === 0 ? 'iws-image-active' : ''; ?>"
                                 data-index="<?php echo $index; ?>">
                                <img
                                    src="<?php echo esc_url($img['url']); ?>"
                                    alt="<?php echo esc_attr($img['alt']); ?>"
                                    title="<?php echo esc_attr($img['title']); ?>"
                                    loading="lazy"
                                />
                            </div>
                        <?php endif; endforeach; ?>
                    </div>

                </div>
            </div>

            <?php endif; ?>

        </div>
    </section>
	
	<?php elseif( get_row_layout() == 'grid_boxes' ):
		$gb_class = 'gb-columns-' . (get_sub_field('gb_columns') ? get_sub_field('gb_columns') : 1); ?>
    <section class="gb-section <?php echo $gb_class; ?>" <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
        <div class="inner-wrap">

            <?php if( get_sub_field('gb_heading') ): ?>
                <h2 class="gb-heading"><?php echo esc_html(get_sub_field('gb_heading')); ?></h2>
            <?php endif; ?>

            <?php if (have_rows('gb_boxes')) : ?>
			<div class="gb-boxes">
				<?php while (have_rows('gb_boxes')) : the_row();
					$image = get_sub_field('image');
					$title = get_sub_field('title');
				?>
					<div class="gb-item">
						<?php if ($image) : ?>
							<div class="gb-item-image">
								<?php
								if (is_array($image)) {
									echo wp_get_attachment_image($image['ID'], 'large');
								} elseif (is_numeric($image)) {
									echo wp_get_attachment_image((int) $image, 'large');
								} else {
									?>
									<img
										src="<?php echo esc_url($image); ?>"
										alt="<?php echo esc_attr($title); ?>"
										loading="lazy"
									>
									<?php
								}
								?>
							</div>
						<?php endif; ?>

						<?php if ($title) : ?>
							<p class="gb-item-title">
								<?php echo esc_html($title); ?>
							</p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

        </div>
    </section>
	



	


<?php endif; ?>
<?php endwhile; echo '</section>'; ?>
<?php endif; ?>




