<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Blogger WPExplorer Theme
 * @since Blogger 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title>Golf News  iSpyGolf</title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-image: url('/blog/wp-content/themes/wpex-blogger/images/bg-news-sized.jpg');background-repeat: no-repeat;background-position: top center;background-attachment: fixed;">

	<?php if ( '1' == get_theme_mod( 'wpex_nav', '1' ) ) { ?>
		<div id="site-navigation-wrap">
			<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
            
			<nav id="site-navigation" class="navigation main-navigation clr container" role="navigation">
				<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'wpex' ); ?></a>
				<div id="logo_img" ><a href="/"><img src="/blog/wp-content/uploads/2014/08/new_logo1.png" />	</a></div>
				<?php	
				// Display main menu
				wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'dropdown-menu sf-menu',
					'fallback_cb'		=> false
				) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #site-navigation-wrap -->
	<?php } ?>

	<div id="wrap" class="clr">

	   <div id="header-wrap" class="clr">
			<header id="header" class="site-header clr container" role="banner">
				
				
					<div id="logo" class="clr">
							<div class="site-text-logo clr">
					<a href="/news" title="iSpyGolf News" rel="News">Golf Club & Resort News</a>
									</div>
					</div><!-- #logo -->				
				<?php
				
				// Outputs the site logo
				// See functions/logo.php
				//wpex_logo();
				// Social links
				wpex_header_aside(); ?>
			</header>
		</div>
		
		<div id="main" class="site-main clr container">