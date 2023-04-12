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

	}
}

new App(document.querySelector("main"), false);
