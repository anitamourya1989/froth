</div>

<?php //get_sidebar(); ?>

<footer>
	<div class="row">
		<div class="large-12 columns">
			<ul class="inline-list">
			  <li class="copyright"> <?php echo get_option('nt_footer_text');?>	</li>	 
  			</ul>
		</div>
		<!-- <div class="large-6 columns">
			<ul class="inline-list social-media right">
				<li><a href="#" class="icon icon-facebook"></a></li>
				<li><a href="#" class="icon icon-twitter"></a></li>
				<li><a href="#" class="icon icon-googleplus"></a></li>
			</ul>
		</div> -->
	</div>
</footer>

	
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>js/functions.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nicescroll.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.localscroll-1.2.7.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo-1.4.3.1.js" type="text/javascript"></script>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css"> <!-- Flex slider -->
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js" type="text/javascript"></script><!-- Flex slider -->
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

<?php wp_footer(); ?>
</body>
</html>