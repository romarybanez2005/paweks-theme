<?php
/**
 * Project archive.
 *
 * @package Custom_Theme
 */

get_header();

$project_count = (int) wp_count_posts( 'project' )->publish;
$filter_tags   = array();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$tags = get_the_tags();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				$filter_tags[ $tag->slug ] = $tag->name;
			}
		}
	}
	rewind_posts();
	asort( $filter_tags );
}
?>

<main id="content" class="site-main">
	<section class="page-hero">
		<span class="page-hero-orb" aria-hidden="true"></span>
		<div class="container">
			<div class="page-hero-inner reveal">
				<a class="back-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<?php esc_html_e( 'Back to home', 'custom-theme' ); ?>
				</a>
				<span class="eyebrow"><?php esc_html_e( 'Selected work', 'custom-theme' ); ?></span>
				<h1><?php esc_html_e( "What we've built.", 'custom-theme' ); ?></h1>
				<p><?php esc_html_e( "Coursework, hackathons and side projects — a look at what we're learning and how we put it into practice.", 'custom-theme' ); ?></p>
				<div class="page-hero-meta">
					<span><strong><?php echo esc_html( $project_count ); ?></strong> <?php esc_html_e( 'projects in the portfolio', 'custom-theme' ); ?></span>
					<span class="meta-dot" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Web · UI/UX · Branding', 'custom-theme' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<?php if ( $filter_tags ) : ?>
				<div class="filter-bar reveal" role="group" aria-label="<?php esc_attr_e( 'Filter projects by tag', 'custom-theme' ); ?>">
					<button class="filter-btn is-active" type="button" data-filter="all" aria-pressed="true"><?php esc_html_e( 'All projects', 'custom-theme' ); ?></button>
					<?php foreach ( $filter_tags as $slug => $name ) : ?>
						<button class="filter-btn" type="button" data-filter="<?php echo esc_attr( $slug ); ?>" aria-pressed="false"><?php echo esc_html( $name ); ?></button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<div class="projects-grid projects-grid--archive">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/card', 'project' );
					endwhile;
					?>
				</div>
				<p class="filter-empty" hidden><?php esc_html_e( 'No projects match this filter.', 'custom-theme' ); ?></p>
			<?php else : ?>
				<div class="empty-state reveal">
					<p><?php esc_html_e( 'No projects published yet. Add the first build from the WordPress dashboard.', 'custom-theme' ); ?></p>
					<?php if ( current_user_can( 'edit_posts' ) ) : ?>
						<a class="btn btn-ghost btn-small" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>"><?php esc_html_e( 'Add a project', 'custom-theme' ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php get_footer(); ?>