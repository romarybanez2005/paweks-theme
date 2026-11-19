/**
 * Custom Theme — interactions.
 */
(function () {
	'use strict';

	var body = document.body;
	var header = document.getElementById('site-header');
	var navToggle = document.querySelector('.nav-toggle');
	var mainNav = document.getElementById('main-nav');
	var backToTop = document.querySelector('.back-to-top');
	var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* Mobile navigation ------------------------------------------------------ */
	function closeNav() {
		body.classList.remove('nav-open');
		if (navToggle) {
			navToggle.setAttribute('aria-expanded', 'false');
		}
	}

	function openNav() {
		body.classList.add('nav-open');
		if (navToggle) {
			navToggle.setAttribute('aria-expanded', 'true');
		}
	}

	if (navToggle && mainNav) {
		navToggle.addEventListener('click', function () {
			if (body.classList.contains('nav-open')) {
				closeNav();
			} else {
				openNav();
			}
		});

		mainNav.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', closeNav);
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				closeNav();
			}
		});

		document.addEventListener('click', function (event) {
			if (!body.classList.contains('nav-open')) {
				return;
			}

			if (mainNav.contains(event.target) || navToggle.contains(event.target)) {
				return;
			}

			closeNav();
		});

		var desktopQuery = window.matchMedia('(min-width: 981px)');
		var handleDesktopChange = function (event) {
			if (event.matches) {
				closeNav();
			}
		};

		if (typeof desktopQuery.addEventListener === 'function') {
			desktopQuery.addEventListener('change', handleDesktopChange);
		} else if (typeof desktopQuery.addListener === 'function') {
			desktopQuery.addListener(handleDesktopChange);
		}
	}

	/* Sticky header + back to top ------------------------------------------- */
	function onScroll() {
		var scrollY = window.scrollY || window.pageYOffset;

		if (header) {
			header.classList.toggle('scrolled', scrollY > 8);
		}

		if (backToTop) {
			backToTop.classList.toggle('is-visible', scrollY > 480);
		}
	}

	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	if (backToTop) {
		backToTop.addEventListener('click', function (event) {
			event.preventDefault();
			window.scrollTo({
				top: 0,
				behavior: prefersReducedMotion ? 'auto' : 'smooth'
			});
		});
	}

	/* Scroll reveal ---------------------------------------------------------- */
	var revealItems = document.querySelectorAll('.reveal');

	if (revealItems.length) {
		if (!('IntersectionObserver' in window) || prefersReducedMotion) {
			revealItems.forEach(function (item) {
				item.classList.add('is-visible');
			});
		} else {
			var revealObserver = new IntersectionObserver(
				function (entries, observer) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('is-visible');
							observer.unobserve(entry.target);
						}
					});
				},
				{ threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
			);

			revealItems.forEach(function (item) {
				revealObserver.observe(item);
			});
		}
	}

	/* Animated counters ------------------------------------------------------ */
	var counters = document.querySelectorAll('[data-count]');

	function setCounterValue(element, value) {
		element.textContent = Math.round(value).toLocaleString();
	}

	function animateCounter(element) {
		var target = parseInt(element.getAttribute('data-count'), 10) || 0;

		if (prefersReducedMotion || target === 0) {
			setCounterValue(element, target);
			return;
		}

		var duration = 1500;
		var start = null;

		function step(timestamp) {
			if (start === null) {
				start = timestamp;
			}

			var progress = Math.min((timestamp - start) / duration, 1);
			var eased = 1 - Math.pow(1 - progress, 3);
			setCounterValue(element, target * eased);

			if (progress < 1) {
				window.requestAnimationFrame(step);
			} else {
				setCounterValue(element, target);
			}
		}

		window.requestAnimationFrame(step);
	}

	if (counters.length) {
		if (!('IntersectionObserver' in window)) {
			counters.forEach(animateCounter);
		} else {
			var counterObserver = new IntersectionObserver(
				function (entries, observer) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							animateCounter(entry.target);
							observer.unobserve(entry.target);
						}
					});
				},
				{ threshold: 0.5 }
			);

			counters.forEach(function (counter) {
				setCounterValue(counter, 0);
				counterObserver.observe(counter);
			});
		}
	}

	/* Dark mode toggle ------------------------------------------------------- */
	var root = document.documentElement;
	var themeToggle = document.querySelector('.theme-toggle');
	var themeMeta = document.getElementById('theme-color-meta');

	function currentMode() {
		return root.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
	}

	function syncToggle(mode) {
		if (!themeToggle) {
			return;
		}

		var isDark = mode === 'dark';
		themeToggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
		themeToggle.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');

		if (themeMeta) {
			themeMeta.setAttribute('content', isDark ? '#140d0f' : '#fffafb');
		}
	}

	syncToggle(currentMode());

	if (themeToggle) {
		themeToggle.addEventListener('click', function () {
			var next = currentMode() === 'dark' ? 'light' : 'dark';

			root.classList.add('theme-anim');
			root.setAttribute('data-theme', next);

			try {
				localStorage.setItem('custom-theme-mode', next);
			} catch (e) {}

			syncToggle(next);

			window.clearTimeout(window.__themeAnimTimer);
			window.__themeAnimTimer = window.setTimeout(function () {
				root.classList.remove('theme-anim');
			}, 420);
		});

	}

	/* Project tag filtering -------------------------------------------------- */
	var filterBar = document.querySelector('.filter-bar');

	if (filterBar) {
		var filterButtons = filterBar.querySelectorAll('.filter-btn');
		var projectCards = document.querySelectorAll('.project-card');
		var emptyMessage = document.querySelector('.filter-empty');

		filterButtons.forEach(function (button) {
			button.addEventListener('click', function () {
				var filter = button.getAttribute('data-filter');
				var visibleCount = 0;

				filterButtons.forEach(function (item) {
					var isActive = item === button;
					item.classList.toggle('is-active', isActive);
					item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
				});

				projectCards.forEach(function (card) {
					var tags = (card.getAttribute('data-tags') || '').split(' ').filter(Boolean);
					var show = filter === 'all' || tags.indexOf(filter) !== -1;

					card.classList.toggle('is-hidden', !show);

					if (show) {
						visibleCount += 1;
					}
				});

				if (emptyMessage) {
					emptyMessage.hidden = visibleCount !== 0;
				}
			});
		});
	}
})();