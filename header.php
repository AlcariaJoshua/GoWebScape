<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gowebscape
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/css/uikit.min.css" />

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


	<div class="nav-container">
		<div class="wrapper">
			<div class="content">
				<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gowebscape' ); ?></a>

				<header id="masthead" class="site-header">
					<div class="site-branding">
						<a href="<?php echo get_home_url() ?>/">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gowebscape_logo.jpg" alt="gowebscape">
						</a>
						
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation">
						<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'gowebscape' ); ?></button> -->

						<div class="hamburger-btn">
							<span></span>
							<span></span>
							<span></span>
						</div>

						<?php
							wp_nav_menu(
								array(
									'menu' => 'Nice Print Menu', // The name or slug of the menu you want to display
									'menu_class' => 'navbar-nav', // Class for the ul element
									'container' => 'div', // The container element (can also be 'nav')
									'container_class' => 'navbar-container', // Class for the container element
									'container_id' => 'main-menu-container', // Optional ID for the container element
								)
							);
						?>
					</nav><!-- #site-navigation -->
				</header><!-- #masthead -->
			</div>
		</div>
	</div>


