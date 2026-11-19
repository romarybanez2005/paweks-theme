<?php
/**
 * Project card.
 *
 * @package Custom_Theme
 */

$client     = get_post_meta( get_the_ID(), '_project_client', true );
$year       = get_post_meta( get_the_ID(), '_project_year', true );
$tags       = get_the_tags();
$tag_slugs  = array();
$tag_names  = array();
$excerpt    = get_the_excerpt();
$excerpt    = $excerpt ? wp_trim_words( wp_strip_all_tags( $excerpt ), 18, '…' ) : '';

if ( $tags ) {
	foreach ( $tags as $tag ) {
		$tag_slugs[] = $tag->slug;
		$tag_names[] = $tag->name;
	}
}
?>
<article <?php post_class( 'project-card reveal' ); ?> data-tags="<?php echo esc_attr( implode( ' ', $tag_slugs ) ); ?>">
	<a class="project-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'project-card', array( 'class' => 'project-photo', 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
			<span class="project-placeholder" aria-hidden="true"><?php echo esc_html( custom_theme_initials( get_the_title() ) ); ?></span>
		<?php endif; ?>
		<?php if ( $year ) : ?>
			<span class="project-year"><?php echo esc_html( $year ); ?></span>
		<?php endif; ?>
	</a>

	<div class="project-card-body">
		<?php if ( $client ) : ?>
			<div class="project-meta">
				<span><?php echo esc_html( $client ); ?></span>
			</div>
		<?php endif; ?>

		<h3 class="project-card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>

		<?php if ( $excerpt ) : ?>
			<p class="project-excerpt"><?php echo esc_html( $excerpt ); ?></p>
		<?php endif; ?>

		<?php if ( $tag_names ) : ?>
			<div class="project-tags">
				<?php foreach ( array_slice( $tag_names, 0, 3 ) as $tag_name ) : ?>
					<span class="tag"><?php echo esc_html( $tag_name ); ?></span>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<a class="link-arrow" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'View project', 'custom-theme' ); ?>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
		</a>
	</div>
</article>