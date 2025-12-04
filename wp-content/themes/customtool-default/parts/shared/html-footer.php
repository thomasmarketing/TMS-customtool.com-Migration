<!-- Back to top -->
<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- Back to top -->

		<?php wp_footer(); ?>
	</div>
	<!-- Site Wrap End -->
	<?php if(get_field('before_the_body','option')):?>
		<?php echo get_field('before_the_body','option'); ?>
	<?php endif;?>
    </body>
</html>