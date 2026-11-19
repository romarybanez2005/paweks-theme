<?php
/**
 * Site footer.
 *
 * @package Custom_Theme
 */
$contact_email = custom_theme_contact_email();
?>
<footer class="site-footer" id="footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-brand">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-brand site-brand--logo site-brand--footer"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<a class="site-brand site-brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( custom_theme_brand_name() ); ?>">
						<?php custom_theme_brand_mark(); ?>
						<span class="brand-text">
							<span class="brand-name"><?php echo esc_html( custom_theme_brand_name() ); ?></span>
						</span>
					</a>
				<?php endif; ?>
				<?php $tagline = get_bloginfo( 'description' ); ?>
				<p class="footer-tagline"><?php echo esc_html( $tagline ? $tagline : __( 'A student team learning in public and building for the web.', 'custom-theme' ) ); ?></p>
				<p class="footer-note"><?php esc_html_e( 'A student team building websites, products and a portfolio one project at a time.', 'custom-theme' ); ?></p>
			</div>

			<div class="footer-column">
				<h2 class="footer-heading"><?php esc_html_e( 'Explore', 'custom-theme' ); ?></h2>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'menu_class'     => 'footer-menu',
					'container'      => false,
					'fallback_cb'    => 'custom_theme_footer_menu_fallback',
				) );
				?>
			</div>

			<div class="footer-column">
				<h2 class="footer-heading"><?php esc_html_e( 'Get in touch', 'custom-theme' ); ?></h2>
				<p class="footer-note"><?php esc_html_e( 'Have an internship, a project or just want to say hello? We would love to hear from you.', 'custom-theme' ); ?></p>
				<a class="footer-email" href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( antispambot( $contact_email ) ); ?></a>
				<a class="btn btn-light btn-small footer-btn" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Say hello', 'custom-theme' ); ?></a>
			</div>
		</div>

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( custom_theme_brand_name() ); ?>. <?php esc_html_e( 'All rights reserved.', 'custom-theme' ); ?></p>
			<p><?php esc_html_e( 'Built by students, learning as we go.', 'custom-theme' ); ?></p>
		</div>
	</div>
</footer>

<a class="back-to-top" href="#site-header" aria-label="<?php esc_attr_e( 'Back to top', 'custom-theme' ); ?>">
	<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
</a>

<?php wp_footer(); ?>
</body>
</html>