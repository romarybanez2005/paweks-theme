<?php
/**
 * Main fallback template.
 *
 * @package Custom_Theme
 */

get_header();

$heading = __( 'Journal', 'custom-theme' );
$intro   = __( 'Notes, ideas and lessons from our student team.', 'custom-theme' );

if ( is_search() ) {
	/* translators: %s: search query. */
	$heading = sprintf( __( 'Search results for “%s”', 'custom-theme' ), get_search_query() );
	$intro   = __( 'Everything we found matching your search.', 'custom-theme' );
} elseif ( is_archive() ) {
	$heading = get_the_archive_title();
	$intro   = get_the_archive_description() ? wp_strip_all_tags( get_the_archive_description() ) : $intro;
}
?>

<main id="content" class="site-main">
	<section class="page-hero page-hero--compact">
		<span class="page-hero-orb" aria-hidden="true"></span>
		<div class="container">
			<div class="page-hero-inner reveal">
				<a class="back-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<?php esc_html_e( 'Back to home', 'custom-theme' ); ?>
				</a>
				<span class="eyebrow"><?php esc_html_e( 'Latest updates', 'custom-theme' ); ?></span>
				<h1><?php echo esc_html( wp_strip_all_tags( $heading ) ); ?></h1>
				<p><?php echo esc_html( $intro ); ?></p>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article <?php post_class( 'post-card reveal' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<a class="post-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
									<?php the_post_thumbnail( 'project-card', array( 'class' => 'post-photo', 'loading' => 'lazy' ) ); ?>
								</a>
							<?php endif; ?>

							<div class="post-card-body">
								<p class="post-meta">
									<span><?php echo esc_html( get_the_date() ); ?></span>
									<span class="meta-dot" aria-hidden="true"></span>
									<span><?php the_author(); ?></span>
								</p>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 22, '…' ) ); ?></p>
								<a class="link-arrow" href="<?php the_permalink(); ?>">
									<?php esc_html_e( 'Read article', 'custom-theme' ); ?>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</a>
							</div>
						</article>
					<?php endwhile; ?>
				</div>

				<?php
				the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => esc_html__( 'Previous', 'custom-theme' ),
					'next_text' => esc_html__( 'Next', 'custom-theme' ),
				) );
				?>
			<?php else : ?>
				<div class="empty-state reveal">
					<p><?php esc_html_e( 'Nothing here yet. Check back soon for fresh updates from the team.', 'custom-theme' ); ?></p>
					<a class="btn btn-ghost btn-small" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'custom-theme' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php get_footer(); ?>