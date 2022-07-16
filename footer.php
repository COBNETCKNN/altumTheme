<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AltumTheme
 */

?>

<footer>
	<section id="footer" class="py-14">
		<div class="container mx-auto">
			<div class="flex justify-between">
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
				<!-- FOOTER MENU -->
				<div class="flex m-5">
					<?php wp_nav_menu( array( 
						'theme_location' => 'menu-2',
						'menu_class' => 'altum_footer__menu ml-24 font-altumBrown text-sm font-semibold font-montserrat flex'
						) ); ?>
				</div>
				<!-- REGISTER -->
				<a class="flex my-auto" href="#">
					<img class="altum_footer__arrow" src="<?php echo get_template_directory_uri(); ?>/images/altum-footer-arrow.png" alt="">
					<span class="text-sm text-altumBrown font-montserrat uppercase font-semibold my-auto ml-5">Register</span>
				</a>
			</div>
			<!-- BOTTOM PICTURE -->
			<div class="flex justify-center mt-24">
				<img class="" src="<?php echo get_template_directory_uri(); ?>/images/bss-congress.png" alt="">
			</div>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>
