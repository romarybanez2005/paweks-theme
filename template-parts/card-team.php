<?php
/**
 * Team member card.
 *
 * @package Custom_Theme
 */

$role = get_post_meta( get_the_ID(), '_team_role', true );
$bio  = get_the_excerpt();
$bio  = $bio ? wp_trim_words( wp_strip_all_tags( $bio ), 16, '…' ) : '';
?>
<article <?php post_class( 'team-card reveal' ); ?>>
	<a class="team-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'team-member', array( 'class' => 'team-photo', 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
			<span class="team-placeholder" aria-hidden="true"><?php echo esc_html( custom_theme_initials( get_the_title() ) ); ?></span>
		<?php endif; ?>
	</a>

	<div class="team-card-body">
		<h3 class="team-card-name">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>

		<?php if ( $role ) : ?>
			<p class="team-role"><?php echo esc_html( $role ); ?></p>
		<?php endif; ?>

		<?php if ( $bio ) : ?>
			<p class="team-bio"><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>

		<a class="link-arrow" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'View profile', 'custom-theme' ); ?>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
		</a>
	</div>
</article>