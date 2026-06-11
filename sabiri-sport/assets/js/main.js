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
