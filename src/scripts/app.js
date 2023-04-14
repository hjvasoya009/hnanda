class App {
	constructor() {
		this.init();
	}

	init() {
		$ = jQuery

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

				$('#word-switcher').css('padding-right', (elementWidth + 22) + "px");
				current = next;
				next++;

				if (next >= $('#word-switcher label').length) {
					next = 0;
				}
			}, 2000);
		});

	}
}

new App(document.querySelector("main"), false);
