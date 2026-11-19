<?php

/**
 * Front page template.
 *
 * @package Custom_Theme
 */

get_header();

$team_count    = (int) wp_count_posts('team')->publish;
$project_count = (int) wp_count_posts('project')->publish;

$features = array(
	array(
		'title' => __('Front-end development', 'custom-theme'),
		'text'  => __('Responsive, accessible interfaces built with HTML, CSS and JavaScript — then tested until they feel right.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m8 8-4 4 4 4M16 8l4 4-4 4M13.5 5l-3 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),
	array(
		'title' => __('UI/UX design', 'custom-theme'),
		'text'  => __('Wireframes, prototypes and simple design systems in Figma, shaped around how people actually use the web.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18" stroke="currentColor" stroke-width="1.8"/><path d="m11.5 11.6 6.2 2.5-2.7 1.2-1.1 2.7-2.4-6.4Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
	),
	array(
		'title' => __('WordPress & PHP', 'custom-theme'),
		'text'  => __('Themes, custom post types and the back-end basics that make a website easy for real people to update.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.4" stroke="currentColor" stroke-width="1.8"/><path d="m7.2 9 2.2 5.6L11.8 9.8l2.4 4.8L16.8 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),
	array(
		'title' => __('Content & brand', 'custom-theme'),
		'text'  => __('Clear copy, tidy visuals and a consistent voice that makes a student project feel finished and considered.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20l3.6-.9 10-10a2.3 2.3 0 0 0-3.2-3.2l-10 10L4 20Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="m13.2 7.2 3.6 3.6" stroke="currentColor" stroke-width="1.8"/></svg>',
	),
	array(
		'title' => __('Technical Writing', 'custom-theme'),
		'text'  => __('Creating clear and concise technical documentation with a focus on accuracy and readability.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.5 3.5h7.3L18 7.7v12.8H6.5V3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M13.8 3.5v4.2H18" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9.5 12h5.5M9.5 15.5h5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
	),
	array(
		'title' => __('Mobile Development', 'custom-theme'),
		'text'  => __('Developing cross-platform mobile solutions with an emphasis on intuitive design, seamless functionality, and user satisfaction.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="6.5" y="2.5" width="11" height="19" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M10.5 5.5h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M10.8 18.5h2.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
	),
	array(
		'title' => __('IOT & Hardware', 'custom-theme'),
		'text'  => __('Developing smart connected devices with a focus on automation, functionality, and efficiency.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="7" y="7" width="10" height="10" rx="2.2" stroke="currentColor" stroke-width="1.8"/><rect x="10.2" y="10.2" width="3.6" height="3.6" rx="1" stroke="currentColor" stroke-width="1.6"/><path d="M10 3.5V7M14 3.5V7M10 17v3.5M14 17v3.5M3.5 10H7M3.5 14H7M17 10h3.5M17 14h3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
	),
	array(
		'title' => __('Project Management', 'custom-theme'),
		'text'  => __('Managing project workflows, resources, and timelines to achieve defined goals.', 'custom-theme'),
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="5" y="4.5" width="14" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M9 4.5V3h6v1.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="m8.8 12.4 2.2 2.2 4.4-4.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),

);

$skills = array(
	array(
		'name'  => __('HTML, CSS & JavaScript', 'custom-theme'),
		'level' => __('Confident', 'custom-theme'),
		'value' => 86,
		'text'  => __('Semantic markup, responsive layouts and the vanilla JavaScript that makes a page interactive.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m8 8-4 4 4 4M16 8l4 4-4 4M13.5 5l-3 14" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),
	array(
		'name'  => __('UI/UX', 'custom-theme'),
		'level' => __('Confident', 'custom-theme'),
		'value' => 80,
		'text'  => __('User flows, wireframes, prototypes and a small design system we can hand to a developer.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5.5 3.5v15l4.2-4.2 2.4 5.2 2.9-1.3-2.3-5h5.8L5.5 3.5Z" stroke="currentColor" stroke-width="1.9" stroke-linejoin="round"/></svg>',
	),
	array(
		'name'  => __('WordPress & PHP', 'custom-theme'),
		'level' => __('Improving', 'custom-theme'),
		'value' => 72,
		'text'  => __('Custom themes, template files, loops, custom post types and the WordPress way of doing things.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.4" stroke="currentColor" stroke-width="1.9"/><path d="m7.2 9 2.2 5.6L11.8 9.8l2.4 4.8L16.8 9" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),
	array(
		'name'  => __('React & tooling', 'custom-theme'),
		'level' => __('Confident', 'custom-theme'),
		'value' => 80,
		'text'  => __('Components, props and state — plus the build tools that come with a modern front-end workflow.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.7"/><ellipse cx="12" cy="12" rx="9" ry="3.6" stroke="currentColor" stroke-width="1.7"/><ellipse cx="12" cy="12" rx="9" ry="3.6" transform="rotate(60 12 12)" stroke="currentColor" stroke-width="1.7"/><ellipse cx="12" cy="12" rx="9" ry="3.6" transform="rotate(120 12 12)" stroke="currentColor" stroke-width="1.7"/></svg>',
	),
	array(
		'name'  => __('Tailwind CSS', 'custom-theme'),
		'level' => __('Confident', 'custom-theme'),
		'value' => 80,
		'text'  => __('Styling web applications using utility-first CSS for faster and more flexible development.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3.5 8.5h9.2a2.2 2.2 0 1 0-2.2-2.2" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/><path d="M3.5 12.5h11.8a2.2 2.2 0 1 1-2.2 2.2" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/><path d="M3.5 16.5h5.6" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg>',
	),
	array(
		'name'  => __('Accessibility & performance', 'custom-theme'),
		'level' => __('Improving', 'custom-theme'),
		'value' => 67,
		'text'  => __('Keyboard navigation, colour contrast, semantic structure and keeping pages fast on real devices.', 'custom-theme'),
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="4.8" r="2" stroke="currentColor" stroke-width="1.9"/><path d="M4.5 9h15M12 9v5.5M12 14.5 9 20.5M12 14.5l3 6" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	),
);
?>

<main id="content" class="site-main">

	<section class="hero">
		<span class="hero-orb hero-orb-one" aria-hidden="true"></span>
		<span class="hero-orb hero-orb-two" aria-hidden="true"></span>
		<span class="hero-grid-lines" aria-hidden="true"></span>

		<div class="container hero-grid">
			<div class="hero-copy reveal">
				<span class="eyebrow"><span class="eyebrow-dot"></span><?php esc_html_e('Student team portfolio', 'custom-theme'); ?></span>
				<h1><?php esc_html_e("We're students turning", 'custom-theme'); ?> <span class="text-gradient"><?php esc_html_e('ideas into real projects', 'custom-theme'); ?></span>.</h1>
				<p class="hero-subtitle"><?php esc_html_e('A small team of student designers and developers building our skills in public — one project, one late-night bug fix and one small win at a time.', 'custom-theme'); ?></p>

				<div class="hero-actions">
					<a class="btn btn-primary" href="<?php echo esc_url(custom_theme_team_url()); ?>">
						<?php esc_html_e('Meet the team', 'custom-theme'); ?>
						<svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
					<a class="btn btn-ghost" href="<?php echo esc_url(custom_theme_project_url()); ?>"><?php esc_html_e('See our work', 'custom-theme'); ?></a>
				</div>

				<div class="hero-tags" aria-label="<?php esc_attr_e('Our disciplines', 'custom-theme'); ?>">
					<span><?php esc_html_e('Web design', 'custom-theme'); ?></span>
					<span><?php esc_html_e('Front-end', 'custom-theme'); ?></span>
					<span><?php esc_html_e('UI/UX', 'custom-theme'); ?></span>
					<span><?php esc_html_e('WordPress', 'custom-theme'); ?></span>
				</div>
			</div>

			<div class="hero-visual reveal delay-1" aria-hidden="true">
				<div class="visual-glow"></div>
				<div class="visual-card">
					<div class="visual-card-top">
						<span class="live-dot"></span>
						<span><?php esc_html_e('Student portfolio', 'custom-theme'); ?></span>
						<span class="visual-pill"><?php echo esc_html(gmdate('Y')); ?></span>
					</div>

					<?php
					$hero_team = new WP_Query(array(
						'post_type'      => 'team',
						'posts_per_page' => 4,
						'orderby'        => 'date',
						'order'          => 'ASC',
					));

					if ($hero_team->have_posts()) :
					?>
						<div class="visual-avatars">
							<?php
							while ($hero_team->have_posts()) :
								$hero_team->the_post();
								if (has_post_thumbnail()) :
									the_post_thumbnail('team-avatar', array('class' => 'visual-avatar', 'loading' => 'lazy'));
								else :
							?>
									<span class="visual-avatar visual-avatar-fallback"><?php echo esc_html(custom_theme_initials(get_the_title())); ?></span>
								<?php
								endif;
							endwhile;
							if ($team_count > 4) :
								?>
								<span class="visual-avatar visual-avatar-more">+<?php echo esc_html($team_count - 4); ?></span>
							<?php
							endif;
							?>
						</div>
					<?php
						wp_reset_postdata();
					else :
					?>
						<div class="visual-avatars">
							<span class="visual-avatar visual-avatar-fallback">UX</span>
							<span class="visual-avatar visual-avatar-fallback visual-avatar-alt">DEV</span>
							<span class="visual-avatar visual-avatar-fallback visual-avatar-alt2">STR</span>
						</div>
					<?php
					endif;
					?>

					<h3><?php esc_html_e('Learning by building.', 'custom-theme'); ?></h3>
					<p><?php esc_html_e('Assignments, Activities and Projects — this is where we put what we learn into practice.', 'custom-theme'); ?></p>

					<div class="visual-progress">
						<div class="visual-progress-head">
							<span><?php esc_html_e('From classroom to portfolio', 'custom-theme'); ?></span>
							<strong><?php echo esc_html(gmdate('Y')); ?></strong>
						</div>
						<div class="progress-track"><span style="width:72%"></span></div>
					</div>
				</div>

				<div class="float-card float-card-top">
					<span class="float-icon">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 20V12M10 20V6M15 20v-5M20 20V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
						</svg>
					</span>
					<div>
						<?php if ($project_count > 0) : ?>
							<strong><?php echo esc_html($project_count); ?></strong>
							<span><?php esc_html_e('Projects built', 'custom-theme'); ?></span>
						<?php else : ?>
							<strong><?php echo esc_html(gmdate('Y')); ?></strong>
							<span><?php esc_html_e('building our portfolio', 'custom-theme'); ?></span>
						<?php endif; ?>
					</div>
				</div>

				<div class="float-card float-card-bottom">
					<span class="status-dot"></span>
					<span><?php esc_html_e('Open to internships', 'custom-theme'); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="stats-wrap">
		<div class="container">
			<div class="stats-card reveal">
				<div class="stat">
					<span class="stat-number" data-count="<?php echo esc_attr($team_count); ?>"><?php echo esc_html($team_count); ?></span>
					<span class="stat-label"><?php esc_html_e('Students on the team', 'custom-theme'); ?></span>
				</div>
				<div class="stat">
					<span class="stat-number" data-count="<?php echo esc_attr($project_count); ?>"><?php echo esc_html($project_count); ?></span>
					<span class="stat-label"><?php esc_html_e('Projects built', 'custom-theme'); ?></span>
				</div>
				<div class="stat">
					<span class="stat-number" data-count="12">12</span><span class="stat-suffix">+</span>
					<span class="stat-label"><?php esc_html_e('Tools & technologies', 'custom-theme'); ?></span>
				</div>
				<div class="stat">
					<span class="stat-number" data-count="500">500</span><span class="stat-suffix">+</span>
					<span class="stat-label"><?php esc_html_e('Hours of practice', 'custom-theme'); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="section section--soft" id="about">
		<div class="container">
			<div class="about-grid">
				<div class="about-copy reveal">
					<span class="eyebrow"><?php esc_html_e('About us', 'custom-theme'); ?></span>
					<h2><?php esc_html_e('Students today. Builders already.', 'custom-theme'); ?></h2>
					<p class="about-lead"><?php esc_html_e("We're a small group of students who learn by making. No agency, no polished client list — just coursework, activities, projects and a shared habit of finishing what we start.", 'custom-theme'); ?></p>
					<p><?php esc_html_e('This portfolio is our workshop. Everything here started as a class brief, an activity or a problem we wanted to solve for ourselves. We design it, build it, break it and fix it — and we write down what we learn along the way.', 'custom-theme'); ?></p>
					<p><?php esc_html_e('We are not pretending to have years of experience. What we do have is time, curiosity and a genuine wish to be useful. Give us a brief, a tricky layout or a first version to improve, and we will take it seriously.', 'custom-theme'); ?></p>

					<div class="about-pills" aria-label="<?php esc_attr_e('What we are looking for', 'custom-theme'); ?>">
						<span><?php esc_html_e('Internships', 'custom-theme'); ?></span>
						<span><?php esc_html_e('Freelance practice', 'custom-theme'); ?></span>
						<span><?php esc_html_e('Projects', 'custom-theme'); ?></span>
						<span><?php esc_html_e('Collaborations', 'custom-theme'); ?></span>
						<span><?php esc_html_e('Portfolio feedback', 'custom-theme'); ?></span>
					</div>
				</div>

				<aside class="about-card reveal delay-1">
					<span class="about-card-label"><?php esc_html_e('Right now', 'custom-theme'); ?></span>
					<ul class="about-list">
						<li>
							<span class="about-check">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="m5 12.5 4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
							<div>
								<strong><?php esc_html_e('Learning in public', 'custom-theme'); ?></strong>
								<span><?php esc_html_e('Sharing each project, including the messy parts.', 'custom-theme'); ?></span>
							</div>
						</li>
						<li>
							<span class="about-check">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="m5 12.5 4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
							<div>
								<strong><?php esc_html_e('Building a portfolio', 'custom-theme'); ?></strong>
								<span><?php esc_html_e('Turning coursework into work we can show.', 'custom-theme'); ?></span>
							</div>
						</li>
						<li>
							<span class="about-check">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="m5 12.5 4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
							<div>
								<strong><?php esc_html_e('Looking for a first opportunity', 'custom-theme'); ?></strong>
								<span><?php esc_html_e('Internships, junior roles and freelance practice.', 'custom-theme'); ?></span>
							</div>
						</li>
					</ul>

					<a class="link-arrow" href="#contact">
						<?php esc_html_e('Work with us', 'custom-theme'); ?>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
				</aside>
			</div>
		</div>
	</section>

	<section class="section services">
		<div class="container">
			<div class="section-head reveal">
				<span class="eyebrow"><?php esc_html_e('What we do', 'custom-theme'); ?></span>
				<h2><?php esc_html_e("Skills we're building every day.", 'custom-theme'); ?></h2>
				<p><?php esc_html_e("We're not an agency — we're students who practise by shipping. Every project adds another tool to the toolkit.", 'custom-theme'); ?></p>
			</div>

			<div class="feature-grid">
				<?php foreach ($features as $index => $feature) : ?>
					<article class="feature-card reveal<?php echo $index > 0 ? ' delay-' . min($index, 3) : ''; ?>">
						<span class="feature-icon"><?php echo $feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></span>
						<h3><?php echo esc_html($feature['title']); ?></h3>
						<p><?php echo esc_html($feature['text']); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section team-preview">
		<div class="container">
			<div class="section-head reveal">
				<span class="eyebrow"><?php esc_html_e('The team', 'custom-theme'); ?></span>
				<h2><?php esc_html_e('The students behind the work.', 'custom-theme'); ?></h2>
				<p><?php esc_html_e('Different minds and different strengths, one shared standard: show up, learn fast and finish.', 'custom-theme'); ?></p>
			</div>

			<?php
			$team_query = new WP_Query(array(
				'post_type'      => 'team',
				'posts_per_page' => 4,
				'orderby'        => 'title',
				'order'          => 'ASC',
			));

			if ($team_query->have_posts()) :
			?>
				<div class="team-grid">
					<?php
					while ($team_query->have_posts()) :
						$team_query->the_post();
						get_template_part('template-parts/card', 'team');
					endwhile;
					?>
				</div>
			<?php
				wp_reset_postdata();
			else :
			?>
				<div class="empty-state reveal">
					<p><?php esc_html_e('Our team page is still being written. Add the first student profile from the WordPress dashboard.', 'custom-theme'); ?></p>
					<?php if (current_user_can('edit_posts')) : ?>
						<a class="btn btn-ghost btn-small" href="<?php echo esc_url(admin_url('post-new.php?post_type=team')); ?>"><?php esc_html_e('Add a team member', 'custom-theme'); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="section-actions">
				<a class="btn btn-ghost" href="<?php echo esc_url(custom_theme_team_url()); ?>">
					<?php esc_html_e('Meet everyone', 'custom-theme'); ?>
					<svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>
	</section>

	<section class="section section--soft" id="skills">
		<div class="container">
			<div class="section-head reveal">
				<span class="eyebrow"><?php esc_html_e('Skills', 'custom-theme'); ?></span>
				<h2><?php esc_html_e('An honest look at what we know.', 'custom-theme'); ?></h2>
				<p><?php esc_html_e("Confident means we use it without hand-holding. Improving means we're practising. Exploring means we're curious and just getting started.", 'custom-theme'); ?></p>
			</div>

			<div class="skills-grid">
				<?php foreach ($skills as $index => $skill) : ?>
					<article class="skill-card reveal<?php echo $index % 3 > 0 ? ' delay-' . min($index % 3, 3) : ''; ?>">
						<span class="skill-icon"><?php echo $skill['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></span>
						<div class="skill-head">
							<h3><?php echo esc_html($skill['name']); ?></h3>
							<span class="skill-level"><?php echo esc_html($skill['level']); ?></span>
						</div>
						<p><?php echo esc_html($skill['text']); ?></p>
						<div class="skill-bar" role="presentation">
							<span style="--level:<?php echo esc_attr($skill['value']); ?>%"></span>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<p class="skill-note reveal">
				<?php esc_html_e('Also exploring:', 'custom-theme'); ?>
				<span><?php esc_html_e('TypeScript', 'custom-theme'); ?></span>
				<span><?php esc_html_e('Git & Collaboration', 'custom-theme'); ?></span>
				<span><?php esc_html_e('Node.js', 'custom-theme'); ?></span>
				<span><?php esc_html_e('SEO', 'custom-theme'); ?></span>
				<span><?php esc_html_e('Motion design', 'custom-theme'); ?></span>
			</p>
		</div>
	</section>

	<section class="section projects-preview">
		<div class="container">
			<div class="section-head reveal">
				<span class="eyebrow"><?php esc_html_e('Selected work', 'custom-theme'); ?></span>
				<h2><?php esc_html_e("Things we've built so far.", 'custom-theme'); ?></h2>
				<p><?php esc_html_e('Activities, Assignments and Projects — small in scale, serious in effort.', 'custom-theme'); ?></p>
			</div>

			<?php
			$project_query = new WP_Query(array(
				'post_type'      => 'project',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			));

			if ($project_query->have_posts()) :
			?>
				<div class="projects-grid">
					<?php
					while ($project_query->have_posts()) :
						$project_query->the_post();
						get_template_part('template-parts/card', 'project');
					endwhile;
					?>
				</div>
			<?php
				wp_reset_postdata();
			else :
			?>
				<div class="empty-state reveal">
					<p><?php esc_html_e('No projects published yet. Add the first build from the WordPress dashboard.', 'custom-theme'); ?></p>
					<?php if (current_user_can('edit_posts')) : ?>
						<a class="btn btn-ghost btn-small" href="<?php echo esc_url(admin_url('post-new.php?post_type=project')); ?>"><?php esc_html_e('Add a project', 'custom-theme'); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="section-actions">
				<a class="btn btn-ghost" href="<?php echo esc_url(custom_theme_project_url()); ?>">
					<?php esc_html_e('Browse all projects', 'custom-theme'); ?>
					<svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>
	</section>

	<?php get_template_part('template-parts/cta', null, array('id' => 'contact')); ?>

</main>

<?php get_footer(); ?>