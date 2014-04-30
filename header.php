<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/foundation.min.css" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:600' rel='stylesheet' type='text/css'>

	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/custom.modernizr.js"></script>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.2.min.js"></script>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $('ul#menu a').click(function(){
	        //thisTitle = $(this).attr('title');
			thisTitle = $(this).html();
	        $('html,body').animate({
	            scrollTop: $("h2:contains('"+ thisTitle +"')").offset().top-100
	        },'slow');
	        return false;
	    });
	});
	</script>

</head>

<body <?php body_class(); ?>>

<div id="top" data-magellan-expedition="fixed">
	<div class="row">
		<div class="large-12 columns">
			<nav class="top-bar">
			  <ul class="title-area">
			   <li class="name logo">
			      <a href="#"><img src="<?php if ( get_option( 'nt_logo' ) != "") { echo stripslashes( get_option( 'nt_logo') ); } else { echo get_option($value['std']); } ?>" title="<?php bloginfo('name'); ?>"></a>
			    </li>
			    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  </ul>
			
			  <?php wp_nav_menu( array(
			  		'theme_location'  => 'primary',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => 'top-bar-section',
					'container_id'    => '',
					'menu_class'      => 'right',
					'menu_id'         => 'menu',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''

			  )); ?>

			  <!-- <section class="top-bar-section">
			    <ul class="right" id="menu">
			      <li data-magellan-arrival="about"><a href="#about">About</a></li>
			      <li data-magellan-arrival="features"><a href="#features">Features</a></li>
			      <li data-magellan-arrival="pricing"><a href="#pricing-table">Pricing</a></li>
			      <li data-magellan-arrival="contact"><a href="#contact">Contact Us</a></li>
			    </ul>
			  </section> -->

			</nav>
		</div>
	</div>
</div>

<!-- <header id="header" > -->

<!-- end header -->
