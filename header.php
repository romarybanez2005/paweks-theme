<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" id="theme-color-meta" content="#fffafb">
	<script>
	document.documentElement.classList.add('js');
	(function () {
		try {
			if (localStorage.getItem('custom-theme-mode') === 'dark') {
				document.documentElement.setAttribute('data-theme', 'dark');
				var meta = document.getElementById('theme-color-meta');
				if (meta) {
					meta.setAttribute('content', '#140d0f');
				}
			}
		} catch (e) {}
	})();
	</script>
	<noscript><style>.reveal{opacity:1!important;transform:none!important}</style></noscript>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'custom-theme' ); ?></a>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<?php if ( has_custom_logo() ) : ?>
			<div class="site-brand site-brand--logo"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<?php custom_theme_brand_lockup(); ?>
		<?php endif; ?>

		<nav class="main-nav" id="main-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'custom-theme' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => 'custom_theme_primary_menu_fallback',
			) );
			?>
		</nav>

		<div class="header-actions">
			<button class="theme-toggle" type="button" aria-label="<?php esc_attr_e( 'Switch to dark mode', 'custom-theme' ); ?>" aria-pressed="false" title="<?php esc_attr_e( 'Toggle dark mode', 'custom-theme' ); ?>">
				<span class="theme-toggle-icon" aria-hidden="true">
					<svg class="icon-sun" width="19" height="19" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4.2" stroke="currentColor" stroke-width="1.9"/><path d="M12 2.6v2.2M12 19.2v2.2M2.6 12h2.2M19.2 12h2.2M5.4 5.4l1.6 1.6M17 17l1.6 1.6M18.6 5.4 17 7M7 17l-1.6 1.6" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg>
					<svg class="icon-moon" width="19" height="19" viewBox="0 0 24 24" fill="none"><path d="M20.2 14.4A8.4 8.4 0 0 1 9.6 3.8 8.6 8.6 0 1 0 20.2 14.4Z" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
			</button>
			<a class="btn btn-primary btn-small header-cta" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Work with us', 'custom-theme' ); ?></a>
			<button class="nav-toggle" type="button" aria-controls="main-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'custom-theme' ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>