<?php
/**
 * Default page template.
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="content" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="page-hero page-hero--compact">
			<span class="page-hero-orb" aria-hidden="true"></span>
			<div class="container">
				<div class="page-hero-inner reveal">
					<a class="back-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
						<?php esc_html_e( 'Back to home', 'custom-theme' ); ?>
					</a>
					<span class="eyebrow"><?php esc_html_e( 'Page', 'custom-theme' ); ?></span>
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</section>

		<section class="section">
			<div class="container">
				<div class="page-content prose reveal">
					<?php the_content(); ?>
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'custom-theme' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</div>
		</section>

		<?php get_template_part( 'template-parts/cta' ); ?>
		<?php
	endwhile;
	?>
</main>

<?php get_footer(); ?>