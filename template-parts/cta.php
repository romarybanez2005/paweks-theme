<?php
/**
 * Call-to-action panel.
 *
 * @package Custom_Theme
 */

$contact_email = custom_theme_contact_email();
$section_id    = isset( $args['id'] ) ? $args['id'] : '';
?>
<section class="section cta-section"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
	<div class="container">
		<div class="cta-panel reveal">
			<span class="cta-orb cta-orb-one" aria-hidden="true"></span>
			<span class="cta-orb cta-orb-two" aria-hidden="true"></span>

			<span class="eyebrow eyebrow-light"><?php esc_html_e( "Let's build together", 'custom-theme' ); ?></span>
			<h2><?php esc_html_e( 'Looking for a team to build with?', 'custom-theme' ); ?></h2>
			<p><?php esc_html_e( "We're students looking for internships, freelance practice and collaborators. Bring an idea, a brief or just a hello — we'd love to hear from you.", 'custom-theme' ); ?></p>

			<div class="cta-actions">
				<a class="btn btn-light" href="mailto:<?php echo esc_attr( $contact_email ); ?>">
					<?php esc_html_e( 'Get in touch', 'custom-theme' ); ?>
					<svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</a>
				<a class="btn btn-outline-light" href="<?php echo esc_url( custom_theme_project_url() ); ?>"><?php esc_html_e( 'See our work', 'custom-theme' ); ?></a>
			</div>
		</div>
	</div>
</section>