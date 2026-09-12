<?php if( !is_page( 'request-a-quote' ) ): ?>
<?php if( get_field('global_quick_quote_form','option')): ?>
	<div class="quick-quote-module">
		<div class="qqm-wrap">
			<div class="qqm-toggle">
				<?php $image = get_field('global_quick_quote_icon','option');
				if( !empty( $image ) ): ?>
				    <img class="qqm-icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
				<?php if( get_field('global_quick_quote_title','option')): ?>
					<span class="qqm-title"><?php echo get_field('global_quick_quote_title','option'); ?></span>
				<?php endif; ?>	
			</div>
			<div class="qqm-close"><i class="fa fa-close"></i></div>
		</div>			
			<div class="qqm-form">
				<?php echo get_field('global_quick_quote_form','option'); ?>
			</div>		
	</div>		
<?php endif; ?>
<?php endif; ?>
<!--Site Footer -->
<footer class="site-footer" role="contentinfo">	
	<div class="inner-wrap">
		<div class="sf-wrap">
			<div class="sf-menu">
				<span class="sf-title">Menu</span>
				<?php wp_nav_menu(array(
		                'menu'            => 'Footer Menu',
		                'container'       => 'ul',
		                'menu_class' => 'sf-links',
		            )); ?>
		    </div>	
	    	<div class="sf-contact-wrap">
	    		<span class="sf-title">Company Info</span>
	    		<?php if(get_field('global_phone_number','option')) :
		       	$global_phone_number = get_field("global_phone_number","option");
		       	$global_phone_number = preg_replace("/[^0-9]/", '', $global_phone_number); ?>
		       	<div class="sf-contact">
			        <span class="sf-ph"><a href="tel:<?php echo $global_phone_number;?>" title="Phone Number" aria-label="<?php echo get_field('global_phone_number','option'); ?>"><?php echo get_field('global_phone_number','option'); ?></a></span>
			    	<?php endif; ?>
			    	<?php if(get_field('global_email','option')):?>
		        	<span class="sf-email"><a href="mailto:<?php echo get_field('global_email','option');?>" aria-label="<?php echo get_field('global_email','option');?>" title="Email Address"><?php echo get_field('global_email','option');?></a></span>
		        	<?php endif; ?>
		        	<?php if(get_field('global_fax','option')):?>
		        	<span class="sf-fax"><a class="nonlink fax" tabindex="-1" aria-label="<?php echo get_field('global_fax','option');?>" title="Fax Number"><?php echo get_field('global_fax','option');?></a></span>
		        	<?php endif; ?>  
					<?php if(get_field('global_address','option')):?>
				    <span class="sf-address"><?php echo get_field('global_address','option');?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="sf-timing-wrap">
				<span class="sf-title">Office Hours</span>
				<?php if(get_field('global_office_timing','option')):?>
			    <span class="sf-office-timing"><?php echo get_field('global_office_timing','option');?></span>
				<?php endif;?>
				<div class="sf-logo-wrap">
					<a href="<?php bloginfo('url'); ?>" class="sf-logo">
					<?php $image = get_field('global_company_footer_logo', 'option');
					if( !empty( $image ) ): ?>
					    <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['title']); ?>" />
					<?php endif; ?>
					</a>
				</div>

				<div class="sf-thomas-badge">
					<!-- Thomas Supplier Badge -->
					<a href="https://www.thomasnet.com/profile/1045346?src=tnbadge" target="_blank" class="tn-badge__link">
					<img 
					src="https://img.thomascdn.com/badges/shield-tier-v-sm.png?cid=1045346"
					srcset="https://img.thomascdn.com/badges/shield-tier-v-sm-2x.png?cid=1045346 2x" 
					alt="Thomas Supplier"  title ="Thomas Supplier" 
					class="tn-badge__img" />
					</a>
					<!-- End Thomas Supplier Badge -->
					<a href="https://www.customtool.com/wp-content/uploads/Custom-Tool-ISO-cert-1.pdf" target="_blank" class="iso-cert__link">
						<img 
						src="https://www.customtool.com/wp-content/uploads/tqcsi-1.webp"
						alt="Custom Tool ISO cert"  title ="Custom Tool ISO cert" 
						class="iso-cert__img" />
					</a>
				</div>
			</div>
		</div>
		<div class="sf-copyright">
			<p>&copy; <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>., All Rights Reserved&nbsp; | &nbsp;Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>
		</div>
	</div>
</footer>