<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lealue
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Cookie Consent Script -->
	<script src="https://cmp.osano.com/Azyw6tRsD45c31ZKa/79eeea1b-1966-4fd6-af00-4392ed9436df/osano.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lealue' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<div class="mobile-nav-container">
				<?php if ( !is_front_page() && !is_home() ) : ?>
					<div class="mobile-branding">
						<?php the_custom_logo(); ?>
					</div>
				<?php else : ?>
					<div class="mobile-branding fp-only">
						<?php the_custom_logo(); ?>
					</div>
				<?php endif	?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<div class="burger" id="item1"></div>
					<div class="burger" id="item2"></div>
					<div class="burger" id="item3"></div>
				</button>
			</div>
			<?php
			wp_nav_menu( array(
				'theme_location' 	=> 'menu-1',
				'menu_id'        	=> 'primary-menu',
				'container_class'	=> 'menu-main-container',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	
	<?php if ( is_front_page() && is_home() ) : ?>
			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->
	<?php endif; ?>
	

	<div id="content" class="site-content">
