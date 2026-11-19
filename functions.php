<?php
/**
 * Custom Theme — modern team portfolio.
 *
 * @package Custom_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function custom_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment', 'gallery', 'caption', 'style', 'script' ) );

	add_image_size( 'team-avatar', 120, 120, true );
	add_image_size( 'team-member', 640, 800, true );
	add_image_size( 'project-card', 900, 675, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'custom-theme' ),
		'footer'  => __( 'Footer Menu', 'custom-theme' ),
	) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * Serve a smaller generated size for the custom logo lockup.
 *
 * @param string $html    Custom logo HTML.
 * @param int    $blog_id Blog ID.
 * @return string
 */
function custom_theme_custom_logo_html( $html, $blog_id ) {
	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image( $logo_id, 'medium', false, array(
		'class'   => 'custom-logo',
		'alt'     => get_post_meta( $logo_id, '_wp_attachment_image_alt', true ),
		'loading' => false,
	) );

	if ( ! $logo ) {
		return $html;
	}

	return sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		$logo
	);
}
add_filter( 'get_custom_logo', 'custom_theme_custom_logo_html', 10, 2 );

/**
 * Brand name shown in the site header and footer.
 *
 * Kept separate from the WordPress site title so the logo lockup can read
 * "Paweks" while the dashboard title stays untouched.
 *
 * @return string
 */
function custom_theme_brand_name() {
	return apply_filters( 'custom_theme_brand_name', 'Paweks' );
}

/**
 * Output the logo mark used in the header and footer lockup.
 */
function custom_theme_brand_mark() {
	?>
	<span class="brand-mark" aria-hidden="true">
		<svg class="brand-mark-svg" viewBox="0 0 44 44" fill="none" focusable="false">
			<path d="M15.5 34V10h8.2a7.4 7.4 0 0 1 0 14.8h-8.2" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M31 26.6c.5 2.4 1.4 3.3 3.8 3.8-2.4.5-3.3 1.4-3.8 3.8-.5-2.4-1.4-3.3-3.8-3.8 2.4-.5 3.3-1.4 3.8-3.8Z" fill="currentColor" opacity="0.85" />
		</svg>
	</span>
	<?php
}

/**
 * Output the full brand lockup (mark + wordmark).
 */
function custom_theme_brand_lockup() {
	?>
	<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( custom_theme_brand_name() ); ?>">
		<?php custom_theme_brand_mark(); ?>
		<span class="brand-text">
			<span class="brand-name"><?php echo esc_html( custom_theme_brand_name() ); ?></span>
		</span>
	</a>
	<?php
}

/**
 * Enqueue styles and scripts.
 */
function custom_theme_enqueue_assets() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' ) ? $theme->get( 'Version' ) : '1.0.0';

	wp_enqueue_style(
		'custom-theme-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'custom-theme-base',
		get_stylesheet_uri(),
		array( 'custom-theme-fonts' ),
		$version
	);

	$theme_css = get_template_directory() . '/assets/css/theme.css';
	if ( file_exists( $theme_css ) ) {
		wp_enqueue_style(
			'custom-theme-theme',
			get_template_directory_uri() . '/assets/css/theme.css',
			array( 'custom-theme-base' ),
			filemtime( $theme_css )
		);
	}

	$theme_js = get_template_directory() . '/assets/js/theme.js';
	if ( file_exists( $theme_js ) ) {
		wp_enqueue_script(
			'custom-theme-script',
			get_template_directory_uri() . '/assets/js/theme.js',
			array(),
			filemtime( $theme_js ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_assets' );

/**
 * Register team member post type.
 */
function custom_theme_register_team_post_type() {
	$labels = array(
		'name'               => __( 'Team Members', 'custom-theme' ),
		'singular_name'      => __( 'Team Member', 'custom-theme' ),
		'add_new'            => __( 'Add Team Member', 'custom-theme' ),
		'add_new_item'       => __( 'Add New Team Member', 'custom-theme' ),
		'edit_item'          => __( 'Edit Team Member', 'custom-theme' ),
		'new_item'           => __( 'New Team Member', 'custom-theme' ),
		'view_item'          => __( 'View Team Member', 'custom-theme' ),
		'search_items'       => __( 'Search Team Members', 'custom-theme' ),
		'not_found'          => __( 'No team members found', 'custom-theme' ),
		'not_found_in_trash' => __( 'No team members in trash', 'custom-theme' ),
	);

	register_post_type( 'team', array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'members' ),
		'menu_icon'    => 'dashicons-groups',
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	) );
}
add_action( 'init', 'custom_theme_register_team_post_type' );

/**
 * Register project post type.
 */
function custom_theme_register_project_post_type() {
	$labels = array(
		'name'               => __( 'Projects', 'custom-theme' ),
		'singular_name'      => __( 'Project', 'custom-theme' ),
		'add_new'            => __( 'Add Project', 'custom-theme' ),
		'add_new_item'       => __( 'Add New Project', 'custom-theme' ),
		'edit_item'          => __( 'Edit Project', 'custom-theme' ),
		'new_item'           => __( 'New Project', 'custom-theme' ),
		'view_item'          => __( 'View Project', 'custom-theme' ),
		'search_items'       => __( 'Search Projects', 'custom-theme' ),
		'not_found'          => __( 'No projects found', 'custom-theme' ),
		'not_found_in_trash' => __( 'No projects in trash', 'custom-theme' ),
	);

	register_post_type( 'project', array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'projects' ),
		'menu_icon'    => 'dashicons-layout',
		'show_in_rest' => true,
		'taxonomies'   => array( 'post_tag' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	) );
}
add_action( 'init', 'custom_theme_register_project_post_type' );

/**
 * Ensure archives show every team member / project.
 */
function custom_theme_archive_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'team' ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}

	if ( $query->is_post_type_archive( 'project' ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}
}
add_action( 'pre_get_posts', 'custom_theme_archive_query' );

/**
 * Flush rewrite rules when the theme is activated.
 */
function custom_theme_after_switch_theme() {
	delete_option( 'custom_theme_rewrite_version' );
}
add_action( 'after_switch_theme', 'custom_theme_after_switch_theme' );

/**
 * Flush rewrite rules once when the theme version changes.
 *
 * The theme was already active when these templates were added, so the
 * activation hook would not run. This keeps /members/ and /projects/ working.
 */
function custom_theme_maybe_flush_rewrites() {
	$version = wp_get_theme()->get( 'Version' );

	if ( get_option( 'custom_theme_rewrite_version' ) !== $version ) {
		flush_rewrite_rules();
		update_option( 'custom_theme_rewrite_version', $version );
	}
}
add_action( 'init', 'custom_theme_maybe_flush_rewrites', 20 );

/**
 * Default primary menu.
 */
function custom_theme_primary_menu_fallback() {
	$links = array(
		array(
			'label'  => __( 'Home', 'custom-theme' ),
			'url'    => home_url( '/' ),
			'active' => is_front_page() || is_home(),
		),
		array(
			'label'  => __( 'About', 'custom-theme' ),
			'url'    => custom_theme_about_url(),
			'active' => false,
		),
		array(
			'label'  => __( 'Members', 'custom-theme' ),
			'url'    => custom_theme_team_url(),
			'active' => is_post_type_archive( 'team' ) || is_singular( 'team' ),
		),
		array(
			'label'  => __( 'Skills', 'custom-theme' ),
			'url'    => custom_theme_skills_url(),
			'active' => false,
		),
		array(
			'label'  => __( 'Projects', 'custom-theme' ),
			'url'    => custom_theme_project_url(),
			'active' => is_post_type_archive( 'project' ) || is_singular( 'project' ),
		),
		array(
			'label'  => __( 'Contact', 'custom-theme' ),
			'url'    => home_url( '/#contact' ),
			'active' => false,
		),
	);

	echo '<ul class="primary-menu">';
	foreach ( $links as $link ) {
		$class = $link['active'] ? ' class="current-menu-item"' : '';
		echo '<li' . $class . '><a href="' . esc_url( $link['url'] ) . '">' . esc_html( $link['label'] ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Default footer menu.
 */
function custom_theme_footer_menu_fallback() {
	$links = array(
		__( 'Home', 'custom-theme' )     => home_url( '/' ),
		__( 'About', 'custom-theme' )    => custom_theme_about_url(),
		__( 'Members', 'custom-theme' )  => custom_theme_team_url(),
		__( 'Skills', 'custom-theme' )   => custom_theme_skills_url(),
		__( 'Projects', 'custom-theme' ) => custom_theme_project_url(),
		__( 'Contact', 'custom-theme' )  => home_url( '/#contact' ),
	);

	echo '<ul class="footer-menu">';
	foreach ( $links as $label => $url ) {
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Contact email helper.
 */
function custom_theme_contact_email() {
	return apply_filters( 'custom_theme_contact_email', get_option( 'admin_email' ) );
}

/**
 * About section URL.
 */
function custom_theme_about_url() {
	return home_url( '/#about' );
}

/**
 * Skills section URL.
 */
function custom_theme_skills_url() {
	return home_url( '/#skills' );
}

/**
 * Team archive URL (works with plain and pretty permalinks).
 */
function custom_theme_team_url() {
	$url = get_post_type_archive_link( 'team' );
	return $url ? $url : home_url( '/members/' );
}

/**
 * Project archive URL (works with plain and pretty permalinks).
 */
function custom_theme_project_url() {
	$url = get_post_type_archive_link( 'project' );
	return $url ? $url : home_url( '/projects/' );
}

/**
 * Build initials from a name.
 */
function custom_theme_initials( $name ) {
	$name  = trim( wp_strip_all_tags( (string) $name ) );
	$parts = preg_split( '/\s+/', $name );
	$out   = '';

	if ( empty( $parts ) ) {
		return '?';
	}

	foreach ( array_slice( $parts, 0, 2 ) as $part ) {
		$out .= function_exists( 'mb_substr' ) ? mb_substr( $part, 0, 1 ) : substr( $part, 0, 1 );
	}

	return strtoupper( $out );
}

/**
 * Team member details meta box.
 */
function custom_theme_add_meta_boxes() {
	add_meta_box( 'custom-theme-team-details', __( 'Member details', 'custom-theme' ), 'custom_theme_team_details_box', 'team', 'side' );
	add_meta_box( 'custom-theme-project-details', __( 'Project details', 'custom-theme' ), 'custom_theme_project_details_box', 'project', 'side' );
}
add_action( 'add_meta_boxes', 'custom_theme_add_meta_boxes' );

function custom_theme_team_details_box( $post ) {
	wp_nonce_field( 'custom_theme_team_details', 'custom_theme_team_details_nonce' );

	$role     = get_post_meta( $post->ID, '_team_role', true );
	$linkedin = get_post_meta( $post->ID, '_team_linkedin', true );
	$github   = get_post_meta( $post->ID, '_team_github', true );
	$twitter  = get_post_meta( $post->ID, '_team_twitter', true );
	?>
	<p>
		<label for="custom_theme_team_role"><strong><?php esc_html_e( 'Role', 'custom-theme' ); ?></strong></label>
		<input type="text" class="widefat" id="custom_theme_team_role" name="custom_theme_team_role" value="<?php echo esc_attr( $role ); ?>" placeholder="<?php esc_attr_e( 'e.g. Creative Director', 'custom-theme' ); ?>">
	</p>
	<p>
		<label for="custom_theme_team_linkedin"><strong><?php esc_html_e( 'LinkedIn URL', 'custom-theme' ); ?></strong></label>
		<input type="url" class="widefat" id="custom_theme_team_linkedin" name="custom_theme_team_linkedin" value="<?php echo esc_url( $linkedin ); ?>" placeholder="https://linkedin.com/in/...">
	</p>
	<p>
		<label for="custom_theme_team_github"><strong><?php esc_html_e( 'GitHub URL', 'custom-theme' ); ?></strong></label>
		<input type="url" class="widefat" id="custom_theme_team_github" name="custom_theme_team_github" value="<?php echo esc_url( $github ); ?>" placeholder="https://github.com/...">
	</p>
	<p>
		<label for="custom_theme_team_twitter"><strong><?php esc_html_e( 'X / Twitter URL', 'custom-theme' ); ?></strong></label>
		<input type="url" class="widefat" id="custom_theme_team_twitter" name="custom_theme_team_twitter" value="<?php echo esc_url( $twitter ); ?>" placeholder="https://x.com/...">
	</p>
	<?php
}

function custom_theme_save_team_details( $post_id ) {
	if ( ! isset( $_POST['custom_theme_team_details_nonce'] ) ) {
		return;
	}

	$nonce = sanitize_text_field( wp_unslash( $_POST['custom_theme_team_details_nonce'] ) );
	if ( ! wp_verify_nonce( $nonce, 'custom_theme_team_details' ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_team_role'     => 'custom_theme_team_role',
		'_team_linkedin' => 'custom_theme_team_linkedin',
		'_team_github'   => 'custom_theme_team_github',
		'_team_twitter'  => 'custom_theme_team_twitter',
	);

	foreach ( $fields as $meta_key => $field ) {
		$value = isset( $_POST[ $field ] ) ? wp_unslash( $_POST[ $field ] ) : '';
		$value = in_array( $meta_key, array( '_team_linkedin', '_team_github', '_team_twitter' ), true ) ? esc_url_raw( $value ) : sanitize_text_field( $value );
		update_post_meta( $post_id, $meta_key, $value );
	}
}
add_action( 'save_post_team', 'custom_theme_save_team_details' );

function custom_theme_project_details_box( $post ) {
	wp_nonce_field( 'custom_theme_project_details', 'custom_theme_project_details_nonce' );

	$client = get_post_meta( $post->ID, '_project_client', true );
	$year   = get_post_meta( $post->ID, '_project_year', true );
	$url    = get_post_meta( $post->ID, '_project_url', true );
	?>
	<p>
		<label for="custom_theme_project_client"><strong><?php esc_html_e( 'Made for / context', 'custom-theme' ); ?></strong></label>
		<input type="text" class="widefat" id="custom_theme_project_client" name="custom_theme_project_client" value="<?php echo esc_attr( $client ); ?>" placeholder="<?php esc_attr_e( 'e.g. Course project, hackathon, personal', 'custom-theme' ); ?>">
	</p>
	<p>
		<label for="custom_theme_project_year"><strong><?php esc_html_e( 'Year', 'custom-theme' ); ?></strong></label>
		<input type="text" class="widefat" id="custom_theme_project_year" name="custom_theme_project_year" value="<?php echo esc_attr( $year ); ?>" placeholder="<?php echo esc_attr( gmdate( 'Y' ) ); ?>">
	</p>
	<p>
		<label for="custom_theme_project_url"><strong><?php esc_html_e( 'Live project URL', 'custom-theme' ); ?></strong></label>
		<input type="url" class="widefat" id="custom_theme_project_url" name="custom_theme_project_url" value="<?php echo esc_url( $url ); ?>" placeholder="https://...">
	</p>
	<?php
}

function custom_theme_save_project_details( $post_id ) {
	if ( ! isset( $_POST['custom_theme_project_details_nonce'] ) ) {
		return;
	}

	$nonce = sanitize_text_field( wp_unslash( $_POST['custom_theme_project_details_nonce'] ) );
	if ( ! wp_verify_nonce( $nonce, 'custom_theme_project_details' ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$client = isset( $_POST['custom_theme_project_client'] ) ? sanitize_text_field( wp_unslash( $_POST['custom_theme_project_client'] ) ) : '';
	$year   = isset( $_POST['custom_theme_project_year'] ) ? sanitize_text_field( wp_unslash( $_POST['custom_theme_project_year'] ) ) : '';
	$url    = isset( $_POST['custom_theme_project_url'] ) ? esc_url_raw( wp_unslash( $_POST['custom_theme_project_url'] ) ) : '';

	update_post_meta( $post_id, '_project_client', $client );
	update_post_meta( $post_id, '_project_year', $year );
	update_post_meta( $post_id, '_project_url', $url );
}
add_action( 'save_post_project', 'custom_theme_save_project_details' );