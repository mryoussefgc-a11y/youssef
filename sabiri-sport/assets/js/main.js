/* Sabiri Sport — menu mobile */
(function () {
	var toggle = document.querySelector('.menu-toggle');
	var nav = document.querySelector('.main-nav');
	if (!toggle || !nav) return;

	toggle.addEventListener('click', function () {
		var open = nav.classList.toggle('is-open');
		document.body.classList.toggle('menu-open', open);
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
	});

	document.addEventListener('click', function (e) {
		if (!nav.classList.contains('is-open')) return;
		if (nav.contains(e.target) || toggle.contains(e.target)) return;
		nav.classList.remove('is-open');
		document.body.classList.remove('menu-open');
		toggle.setAttribute('aria-expanded', 'false');
	});
})();

/* Animations reveal au scroll */
(function () {
	var els = document.querySelectorAll('.reveal');
	if (!els.length) return;
	if (!('IntersectionObserver' in window)) {
		els.forEach(function (el) { el.classList.add('is-visible'); });
		return;
	}
	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				io.unobserve(entry.target);
			}
		});
	}, { threshold: 0.12 });
	els.forEach(function (el) { io.observe(el); });
})();
