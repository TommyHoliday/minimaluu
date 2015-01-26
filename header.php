<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
 ?><!DOCTYPE html>
<html id="doc" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,800' rel='stylesheet' type='text/css'>
	<?php if (get_theme_mod( 'fav_icon' )){ ?>
		<link rel="icon" href="<?php echo get_theme_mod( 'fav_icon' ); ?>" type="image/png" />
	<?php } else { ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png" />
	<?php } ?>
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">

	<div id="loader">
		<div id="loader-inner">		
			<svg id="svg" width="40" height="40" viewbox="0 0 40 40">
	 			 <polygon points="0 0 0 40 40 40 40 0" class="rect" />
			</svg>
		</div>
	</div>

	<div class="mobile-wrap">
		<a href="#" id="mobile-menu-btn" class="menu-icon indent">
  			<span class="menu-icon__text">Show Menu</span>
		</a>
	</div><!-- end #mobile-wrap -->
	<nav id="site-nav" class="clearfix">
		<div class="menu-wrap">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false') ); ?>
		</div><!-- end .menu-wrap -->
	</nav><!-- end #site-nav -->

	<header id="masthead" class="cf" role="banner">
		<div id="site-title" class="clearfix">
			<?php if ( get_header_image() ) : ?>
			<div id="site-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div><!-- end #site-header -->
			<?php endif; ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- end #site-title -->

		<?php if ( is_active_sidebar( 'sidebar-about' )  && is_front_page() ) : ?>
		<div id="site-about" class="widget-area cf" role="complementary">
			<?php dynamic_sidebar( 'sidebar-about' ); ?>
		</div><!-- #site-about -->
		<?php endif; ?>

	</header><!-- end #masthead -->

<div id="main-wrap">