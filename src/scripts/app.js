class App {
	constructor() {
		this.init();
	}

	init() {
		$ = jQuery

		this.bindMobileMenu();
		this.initProjectsSlider();

		$(window).scroll(function () {
			var scrollPos = $(window).scrollTop(),
				navH = $('.tabs').height();
			$('.tab-section').each(function (i) {
				var offT = $(this).offset().top;
				if ((offT - scrollPos - navH - 50) <= 0) {
					$('.tab-item.active').removeClass('active')
					$('.tab-item').eq(i).addClass('active')
				}
			})
		});

		$(document).ready(function () {
			var current = 0;
			var next = 1;

			setInterval(function () {
				var $currentLabel = $('#word-switcher label').eq(current);
				var $nextLabel = $('#word-switcher label').eq(next);

				$currentLabel.removeClass('active');
				$nextLabel.addClass('active');

				// Assuming the element you want to get the width of has a class of "my-class"
				var elementWidth = $('#word-switcher .active').width();

				$('#word-switcher').css('padding-right', (elementWidth + 24) + "px");
				current = next;
				next++;

				if (next >= $('#word-switcher label').length) {
					next = 0;
				}
			}, 2000);
		});

	}

	bindMobileMenu() {
		const $toggle = $('.navbar-toggle');
		const $overlay = $('.mobile-menu-overlay');
		const $close = $('.mobile-menu-close');
		const $links = $('.mobile-menu a');
		const $body = $('body');

		const openMenu = () => {
			$overlay.addClass('active').attr('aria-hidden', 'false');
			$toggle.attr('aria-expanded', 'true');
			$body.addClass('no-scroll');
		};

		const closeMenu = () => {
			$overlay.removeClass('active').attr('aria-hidden', 'true');
			$toggle.attr('aria-expanded', 'false');
			$body.removeClass('no-scroll');
		};

		$toggle.on('click', function () {
			if ($overlay.hasClass('active')) {
				closeMenu();
			} else {
				openMenu();
			}
		});

		$close.on('click', closeMenu);
		$links.on('click', closeMenu);

		$(document).on('keyup', function (event) {
			if (event.key === 'Escape') {
				closeMenu();
			}
		});

	}

	initProjectsSlider() {
		if (document.querySelector('.projectsSwiper')) {
			const projectsSwiper = new Swiper('.projectsSwiper', {
				slidesPerView: 1,
				spaceBetween: 16,
				loop: false,
				speed: 600,
				navigation: {
					nextEl: '.slider-arrow-next',
					prevEl: '.slider-arrow-prev',
				},
				breakpoints: {
					1024: {
						slidesPerView: 2,
						spaceBetween: 40,
					}
				}
			});
		}
	}
}

new App(document.querySelector("main"), false);
