<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Quantum-core
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<div class="container">
<div class="pure-g" id="layout">
<div class="pure-u-1 pure-u-md-1-4 sidebar" id="sidebar">
		<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
<div class="menubutton">
	<button class="nav-toggle">
		<i class="fa fa-bars"></i>
	</button>
	<button class="sidebar-toggle">
	<i class="fa fa-cogs"></i>
	</button>
</div>
		<div id="main-menu"  role="navigation" class="navigation-menu">
<?php
$defaults = array(
	'theme_location'  => 'primary',
	'menu'            => 'Primary Menu',
	'container'       => 'div',
	'container_id'    => 'cssmenu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
if(has_nav_menu('primary'))
{ wp_nav_menu( $defaults ); }
else 
	{ wp_page_menu( array('menu_class'  => 'page-menu') ); }
?>
</div>

	</header><!-- #masthead -->
<?php get_sidebar(); ?>	
</div>
	<div id="content" class="site-content pure-u-1 pure-u-md-3-4">
