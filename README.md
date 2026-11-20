# Paweks — WordPress Professional Portfolio

## 🌐 Live Website

Local development preview:

http://portfolio.test

> **Production URL:** _To be added after the site is deployed._

## 📌 Project Overview

The Paweks WordPress Professional Portfolio is a team-developed website created as the final project for the Cloud Computing subject of the Bachelor of Science in Information Technology (BSIT) program.

The portfolio showcases the team's members, skills, projects, and professional information through a customized WordPress theme.

## 🎯 Project Objectives

- Develop a professional and responsive team portfolio website.
- Showcase the skills, projects, and achievements of the team members.
- Apply WordPress customization and web development skills.
- Use custom post types and custom fields to keep portfolio content easy to manage.
- Utilize GitHub for version control and project progress monitoring.
- Deploy the website using a web hosting platform.

## 🛠️ Technologies Used

| Technology | Purpose |
| --- | --- |
| WordPress | Content management system |
| PHP | WordPress theme development and functionality |
| HTML5 | Website structure and content |
| CSS3 | Website styling, layout, responsive design, and dark mode |
| JavaScript | Interactive website functionality and user experience |
| Git | Version control and tracking project changes |
| GitHub | Repository hosting and project collaboration |
| Laragon | Local WordPress development environment |
| MySQL | WordPress content database |
| Hostinger | Website hosting and deployment (planned) |

## 📂 Project Structure

```text
paweks-theme/
├── assets/
│   ├── css/
│   │   └── theme.css
│   ├── images/
│   │   ├── BarbaPic.png
│   │   ├── HorfillaPic.png
│   │   ├── PaylaPic.png
│   │   └── YbanezPic.png
│   └── js/
│       └── theme.js
├── template-parts/
│   ├── card-project.php
│   ├── card-team.php
│   └── cta.php
├── 404.php
├── archive-project.php
├── archive-team.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page-members.php
├── page-projects.php
├── page.php
├── README.md
├── screenshot.png
├── single-project.php
├── single-team.php
├── style.css
└── team.php
```

> The repository contains the custom theme only. WordPress core, plugins, and uploads live outside this repository.

## 🧩 Theme Features

- **Team Members and Projects:** Custom post types with public archives at `/members/` and `/projects/`.
- **Member Profiles:** Role, LinkedIn, GitHub, and X / Twitter details stored as post metadata.
- **Project Details:** Context, year, live project URL, and tag-based categorization.
- **Project Filtering:** Filter project cards by tag without reloading the page.
- **Dark Mode:** Light and dark themes with the selected mode saved in `localStorage`.
- **Responsive Navigation:** Accessible mobile menu with overlay, Escape-key support, and outside-click closing.
- **Homepage Sections:** Hero, statistics, about, services, team preview, skills, selected projects, and contact call to action.
- **Accessibility:** Skip link, ARIA attributes, keyboard-friendly controls, and reduced-motion support.
- **Lightweight Interactions:** Vanilla JavaScript only, with no front-end framework required.

## ⚙️ Theme Files and Functions

| File | Description |
| --- | --- |
| `functions.php` | Registers theme features, navigation menus, image sizes, team and project post types, metadata boxes, archive queries, and enqueues CSS and JavaScript assets. |
| `style.css` | Contains the WordPress theme metadata. The main stylesheet lives in `assets/css/theme.css`. |
| `front-page.php` | Builds the main portfolio homepage, including the hero, statistics, about, services, team preview, skills, projects preview, and contact sections. |
| `header.php` | Outputs the document head, site header, brand lockup, primary navigation, dark mode toggle, and mobile menu button. |
| `footer.php` | Outputs the site footer, footer navigation, contact email, copyright information, and back-to-top button. |
| `index.php` | Main fallback template for the blog, search results, and archives. |
| `page.php` | Default template for standard WordPress pages. |
| `page-members.php` | Page template that lists every team member. |
| `page-projects.php` | Page template that lists every project with tag filters. |
| `team.php` | Alternate "Team Portfolio" page template for displaying the team grid. |
| `archive-team.php` | Archive template for all team members. |
| `archive-project.php` | Archive template for all projects. |
| `single-team.php` | Single team member profile with biography, social links, related members, and contact call to action. |
| `single-project.php` | Single project page with project details, live project link, and related projects. |
| `404.php` | Custom "page not found" template. |
| `template-parts/card-team.php` | Reusable team member card used across the homepage, archives, and related profiles. |
| `template-parts/card-project.php` | Reusable project card used across the homepage, archives, and related projects. |
| `template-parts/cta.php` | Reusable contact call-to-action panel. |
| `assets/css/theme.css` | Defines the visual design, layout, typography, colors, responsive styling, and light/dark color variables. |
| `assets/js/theme.js` | Handles navigation, dark mode, scroll effects, counters, filtering, and other interactions. |
| `assets/images/` | Stores the team member profile photos. |
| `screenshot.png` | Theme preview image shown in the WordPress Appearance → Themes screen. |

## 💻 JavaScript Functionality

The custom JavaScript file enhances the user experience through the following features:

- **Mobile Navigation:** Opens and closes the navigation menu on smaller screens.
- **Menu Accessibility:** Updates `aria-expanded`, closes the menu with the Escape key or an outside click, and resets the menu when the desktop layout returns.
- **Sticky Header Effects:** Adds a `scrolled` class to the header after the user scrolls down.
- **Back to Top:** Shows a back-to-top button after scrolling and smoothly returns the user to the top of the page.
- **Scroll Reveal:** Fades and moves elements into view using `IntersectionObserver` as they enter the viewport.
- **Animated Counters:** Counts the homepage statistics up to their target values when they become visible.
- **Dark Mode:** Switches between light and dark themes, updates the browser theme color, and remembers the user's choice with `localStorage`.
- **Project Tag Filtering:** Filters project cards by tag, updates `aria-pressed` states, and displays an empty-state message when no projects match.
- **Reduced Motion Support:** Respects the user's `prefers-reduced-motion` setting by disabling animations where appropriate.

## ⚡ Getting Started

1. Copy the theme folder into `wp-content/themes/` in a WordPress installation.
2. Activate the theme from **Appearance → Themes**.
3. Go to **Settings → Permalinks** and save the settings once to refresh the `/members/` and `/projects/` rewrite rules.
4. Add team members and projects from the WordPress dashboard.
5. Set a featured image and excerpt for each entry, then fill in the member or project details in the sidebar meta box.
6. Assign the **Members** and **Projects** page templates to pages if custom listing pages are needed.
7. Set the site logo and menus from **Appearance → Customize** and **Appearance → Menus**.

## 🚀 Development Progress

- [x] Set up local WordPress development environment with Laragon.
- [x] Create custom WordPress theme.
- [x] Develop initial theme structure and styling.
- [x] Register Team Members and Projects custom post types.
- [x] Build the homepage hero, statistics, about, services, team, skills, and projects sections.
- [x] Add member and project detail meta boxes.
- [x] Create single, archive, and page templates.
- [x] Implement custom JavaScript functionality.
- [x] Add responsive navigation and accessibility support.
- [x] Add dark mode with saved user preference.
- [x] Implement project tag filtering.
- [x] Initialize Git repository.
- [x] Upload custom theme files to GitHub.
- [x] Create project documentation using README.md.
- [x] Add portfolio content and team member profiles.
- [ ] Deploy website to Hostinger.
- [ ] Configure the production deployment workflow.
- [ ] Perform final responsiveness and functionality testing.
- [ ] Test website across different browsers.

## 👥 Team Members

| Member | Role |
| --- | --- |
| Romar Jhun Ybañez | Programmer |
| Dan Rave Payla | Technical Writer |
| John Paul Horfilla | Project Manager |
| Catherine Barba | Data Analyst |

## 🔗 Repository

GitHub Repository:

https://github.com/romarybanez2005/paweks-theme

## 🎓 Academic Project

Bachelor of Science in Information Technology (BSIT)

Subject: Cloud Computing

Project: WordPress Professional Portfolio

Developed by: Paweks Team

## 📄 License

This theme is released under the GNU General Public License v2 or later.
