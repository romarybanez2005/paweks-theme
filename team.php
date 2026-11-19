<?php
/**
 * Template Name: Team Portfolio
 * Description: A page template that displays the team in a portfolio grid.
 *
 * @package Custom_Theme
 */

get_header();

$team_count = (int) wp_count_posts( 'team' )->publish;
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
				<span class="eyebrow"><?php esc_html_e( 'The people', 'custom-theme' ); ?></span>
				<h1><?php esc_html_e( 'Meet the students.', 'custom-theme' ); ?></h1>
				<p><?php esc_html_e( "We're students who learn by building. Different courses, different strengths, one shared goal: get a little better with every project.", 'custom-theme' ); ?></p>
				<div class="page-hero-meta">
					<span><strong><?php echo esc_html( $team_count ); ?></strong> <?php esc_html_e( 'students on the team', 'custom-theme' ); ?></span>
					<span class="meta-dot" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Design · Development · Content', 'custom-theme' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<?php
			$team = new WP_Query( array(
				'post_type'      => 'team',
				'posts_per_page' => -1,
				'orderby'        => 'title',
				'order'          => 'ASC',
			) );

			if ( $team->have_posts() ) :
				?>
				<div class="team-grid team-grid--archive">
					<?php
					while ( $team->have_posts() ) :
						$team->the_post();
						get_template_part( 'template-parts/card', 'team' );
					endwhile;
					?>
				</div>
				<?php
				wp_reset_postdata();
			else :
				?>
				<div class="empty-state reveal">
					<p><?php esc_html_e( 'No student profiles yet. Add the first one from the WordPress dashboard.', 'custom-theme' ); ?></p>
					<?php if ( current_user_can( 'edit_posts' ) ) : ?>
						<a class="btn btn-ghost btn-small" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=team' ) ); ?>"><?php esc_html_e( 'Add a team member', 'custom-theme' ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php get_footer(); ?>