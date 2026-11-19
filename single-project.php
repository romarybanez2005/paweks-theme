<?php
/**
 * Single project.
 *
 * @package Custom_Theme
 */

get_header();

while ( have_posts() ) :
	the_post();

	$client       = get_post_meta( get_the_ID(), '_project_client', true );
	$year         = get_post_meta( get_the_ID(), '_project_year', true );
	$project_url  = get_post_meta( get_the_ID(), '_project_url', true );
	$tags         = get_the_tags();
	$current_id   = get_the_ID();
	?>

	<main id="content" class="site-main">
		<section class="page-hero page-hero--compact">
			<span class="page-hero-orb" aria-hidden="true"></span>
			<div class="container">
				<div class="page-hero-inner reveal">
					<a class="back-link" href="<?php echo esc_url( custom_theme_project_url() ); ?>">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
						<?php esc_html_e( 'All projects', 'custom-theme' ); ?>
					</a>
					<span class="eyebrow"><?php esc_html_e( 'Project', 'custom-theme' ); ?></span>
					<h1><?php the_title(); ?></h1>
					<?php if ( $client || $year ) : ?>
						<div class="page-hero-meta">
							<?php if ( $client ) : ?>
								<span><?php echo esc_html( $client ); ?></span>
							<?php endif; ?>
							<?php if ( $client && $year ) : ?>
								<span class="meta-dot" aria-hidden="true"></span>
							<?php endif; ?>
							<?php if ( $year ) : ?>
								<span><?php echo esc_html( $year ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="section project-single">
			<div class="container">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="project-single-media reveal">
						<?php the_post_thumbnail( 'full', array( 'class' => 'project-single-photo', 'loading' => 'eager' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="project-single-grid">
					<div class="project-single-content reveal">
						<div class="prose">
							<?php the_content(); ?>
						</div>
					</div>

					<aside class="project-sidebar reveal delay-1">
						<div class="sidebar-card">
							<h2><?php esc_html_e( 'Project details', 'custom-theme' ); ?></h2>
							<ul class="project-details">
								<?php if ( $client ) : ?>
									<li><span><?php esc_html_e( 'Made for', 'custom-theme' ); ?></span><strong><?php echo esc_html( $client ); ?></strong></li>
								<?php endif; ?>
								<?php if ( $year ) : ?>
									<li><span><?php esc_html_e( 'Year', 'custom-theme' ); ?></span><strong><?php echo esc_html( $year ); ?></strong></li>
								<?php endif; ?>
								<?php if ( $tags ) : ?>
									<li>
										<span><?php esc_html_e( 'Services', 'custom-theme' ); ?></span>
										<strong><?php echo esc_html( implode( ', ', wp_list_pluck( $tags, 'name' ) ) ); ?></strong>
									</li>
								<?php endif; ?>
							</ul>

							<?php if ( $project_url ) : ?>
								<a class="btn btn-primary btn-full" href="<?php echo esc_url( $project_url ); ?>" target="_blank" rel="noopener noreferrer">
									<?php esc_html_e( 'Visit live project', 'custom-theme' ); ?>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14 5h5v5M19 5l-9 9M19 14v4a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</a>
							<?php endif; ?>
						</div>
					</aside>
				</div>
			</div>
		</section>

		<?php
		$related = new WP_Query( array(
			'post_type'      => 'project',
			'posts_per_page' => 3,
			'post__not_in'   => array( $current_id ),
			'orderby'        => 'rand',
		) );

		if ( $related->have_posts() ) :
			?>
			<section class="section section--soft">
				<div class="container">
					<div class="section-head reveal">
						<span class="eyebrow"><?php esc_html_e( 'Keep exploring', 'custom-theme' ); ?></span>
						<h2><?php esc_html_e( "More things we've built.", 'custom-theme' ); ?></h2>
					</div>

					<div class="projects-grid projects-grid--related">
						<?php
						while ( $related->have_posts() ) :
							$related->the_post();
							get_template_part( 'template-parts/card', 'project' );
						endwhile;
						?>
					</div>
				</div>
			</section>
			<?php
			wp_reset_postdata();
		endif;
		?>

		<?php get_template_part( 'template-parts/cta' ); ?>
	</main>

	<?php
endwhile;
get_footer(); ?>