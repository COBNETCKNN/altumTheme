<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AltumTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="bg-onePointRed py-0 lg:py-5" role="banner">
	<nav id="navbar" class="hidden lg:block">
		<div class="header_container mx-auto">
			
			<div class="flex justify-between">
				<!-- LEFT SECTION -->
				<div class="flex justify-start">
					<!-- LOGO -->
					<div class="altum_logo site-branding">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						} elseif ( $site_name ) {
							?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo('name'); ?>" rel="home">
									<?php echo esc_html( $site_name ); ?>
								</a>
							</h1>
							<p class="site-description">
								<?php
								if ( $tagline ) {
									echo esc_html( $tagline );
								}
								?>
							</p>
						<?php } ?>
					</div>
					<!-- MENU ITEMS -->
					<div class="flex m-5">
						<?php wp_nav_menu( array( 
							'theme_location' => 'menu-1',
							'menu_class' => 'altum_header__menu ml-24 font-altumBrown text-sm font-semibold font-montserrat flex'
							) ); ?>
					</div>
				</div>
				<!-- RIGHT SECTION -->
				<div class="flex justify-end my-auto">
					<!-- REGISTER NOW BUTTON -->
					<div>
						<a href="#">
							<button class="header_register__button font-montserrat bg-transparent hover:bg-gray-100 text-black font-semibold border border-black uppercase">Register</button>
						</a>
					</div>
					<div class="language_selector ml-10 my-auto">
						<h2 class="text-black font-altumBrown font-montserrat font-xl">EN</h2>
					</div>

				</div>
			</div>
		</div>
	</nav>
</header>