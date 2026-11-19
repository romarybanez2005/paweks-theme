<?php
/**
 * 404 template.
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="content" class="site-main">
	<section class="section error-page">
		<div class="container">
			<div class="error-card reveal">
				<span class="error-code">404</span>
				<span class="eyebrow"><?php esc_html_e( 'Page not found', 'custom-theme' ); ?></span>
				<h1><?php esc_html_e( 'Looks like this page took a different route.', 'custom-theme' ); ?></h1>
				<p><?php esc_html_e( 'The page you are looking for may have moved, or the link might be out of date. Let us get you back on track.', 'custom-theme' ); ?></p>
				<div class="error-actions">
					<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'custom-theme' ); ?></a>
					<a class="btn btn-ghost" href="<?php echo esc_url( custom_theme_team_url() ); ?>"><?php esc_html_e( 'Meet the team', 'custom-theme' ); ?></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>