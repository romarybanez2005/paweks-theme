<?php
/**
 * Single team member.
 *
 * @package Custom_Theme
 */

get_header();

while ( have_posts() ) :
	the_post();

	$role     = get_post_meta( get_the_ID(), '_team_role', true );
	$linkedin = get_post_meta( get_the_ID(), '_team_linkedin', true );
	$github   = get_post_meta( get_the_ID(), '_team_github', true );
	$twitter  = get_post_meta( get_the_ID(), '_team_twitter', true );
	$email    = custom_theme_contact_email();
	?>

	<main id="content" class="site-main">
		<section class="page-hero page-hero--compact">
			<span class="page-hero-orb" aria-hidden="true"></span>
			<div class="container">
				<div class="page-hero-inner reveal">
					<a class="back-link" href="<?php echo esc_url( custom_theme_team_url() ); ?>">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
						<?php esc_html_e( 'All team members', 'custom-theme' ); ?>
					</a>
					<span class="eyebrow"><?php esc_html_e( 'Student profile', 'custom-theme' ); ?></span>
					<h1><?php the_title(); ?></h1>
					<?php if ( $role ) : ?>
						<p class="page-hero-role"><?php echo esc_html( $role ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="section">
			<div class="container">
				<div class="profile-grid">
					<div class="profile-media reveal">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'team-member', array( 'class' => 'profile-photo', 'loading' => 'eager' ) ); ?>
						<?php else : ?>
							<span class="profile-placeholder" aria-hidden="true"><?php echo esc_html( custom_theme_initials( get_the_title() ) ); ?></span>
						<?php endif; ?>
					</div>

					<div class="profile-body reveal delay-1">
						<div class="profile-intro">
							<h2><?php esc_html_e( 'About', 'custom-theme' ); ?></h2>
							<div class="prose">
								<?php the_content(); ?>
							</div>
						</div>

						<?php if ( $linkedin || $github || $twitter ) : ?>
							<div class="profile-socials">
								<span><?php esc_html_e( 'Connect', 'custom-theme' ); ?></span>
								<div class="social-links">
									<?php if ( $linkedin ) : ?>
										<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'LinkedIn', 'custom-theme' ); ?>">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.94 8.5H3.56V21h3.38V8.5ZM5.25 3A1.97 1.97 0 1 0 5.24 7a1.97 1.97 0 0 0 0-4ZM21 13.7c0-3.7-1.98-5.42-4.62-5.42-2.13 0-3.08 1.17-3.61 2v-1.78H9.39c.04.95 0 12.5 0 12.5h3.38v-6.98c0-.37.03-.75.14-1.02.3-.75.98-1.53 2.12-1.53 1.5 0 2.1 1.14 2.1 2.8V21H21v-7.3Z"/></svg>
										</a>
									<?php endif; ?>
									<?php if ( $github ) : ?>
										<a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'GitHub', 'custom-theme' ); ?>">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.88 1.52 2.31 1.08 2.87.83.09-.64.35-1.08.63-1.33-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02a9.5 9.5 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.38.2 2.4.1 2.65.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.86v2.75c0 .27.18.58.69.48A10 10 0 0 0 12 2Z"/></svg>
										</a>
									<?php endif; ?>
									<?php if ( $twitter ) : ?>
										<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'X / Twitter', 'custom-theme' ); ?>">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.53 3H21l-7.19 8.21L22 21h-6.11l-4.78-6.25L5.6 21H2l7.69-8.78L2 3h6.27l4.32 5.7L17.53 3Zm-1.07 16h1.9L7.4 4.9H5.36L16.46 19Z"/></svg>
										</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>

						<div class="profile-actions">
							<a class="btn btn-primary" href="mailto:<?php echo esc_attr( $email ); ?>"><?php esc_html_e( 'Get in touch', 'custom-theme' ); ?></a>
							<a class="btn btn-ghost" href="<?php echo esc_url( custom_theme_team_url() ); ?>"><?php esc_html_e( 'Back to team', 'custom-theme' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
		$related = new WP_Query( array(
			'post_type'      => 'team',
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'orderby'        => 'rand',
		) );

		if ( $related->have_posts() ) :
			?>
			<section class="section section--soft">
				<div class="container">
					<div class="section-head reveal">
						<span class="eyebrow"><?php esc_html_e( 'More of the team', 'custom-theme' ); ?></span>
						<h2><?php esc_html_e( 'Meet more of the students behind the work.', 'custom-theme' ); ?></h2>
					</div>

					<div class="team-grid team-grid--related">
						<?php
						while ( $related->have_posts() ) :
							$related->the_post();
							get_template_part( 'template-parts/card', 'team' );
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