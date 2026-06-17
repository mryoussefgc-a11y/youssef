/* =========================================================================
   LittleEase — theme.js
   Vanilla JS only. No frameworks, no dependencies.
   ========================================================================= */
(function () {
  'use strict';

  /* ---------------------------------------------------------------------
     FAQ accordion — only one item open at a time.
     Uses native <details>; we just close siblings when one opens.
     Works without JS too (every item simply toggles independently).
  --------------------------------------------------------------------- */
  function initFaq() {
    var groups = document.querySelectorAll('[data-faq]');
    groups.forEach(function (group) {
      var items = group.querySelectorAll('details');
      items.forEach(function (item) {
        item.addEventListener('toggle', function () {
          if (!item.open) return;
          items.forEach(function (other) {
            if (other !== item) other.open = false;
          });
        });
      });
    });
  }

  /* ---------------------------------------------------------------------
     Sticky header — add a subtle shadow once the page is scrolled.
  --------------------------------------------------------------------- */
  function initStickyHeader() {
    var header = document.querySelector('[data-sticky-header]');
    if (!header) return;
    var onScroll = function () {
      header.classList.toggle('is-stuck', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---------------------------------------------------------------------
     Smooth in-page scrolling for hash links (e.g. CTA -> #bundle),
     accounting for the sticky header height.
  --------------------------------------------------------------------- */
  function initAnchorScroll() {
    document.addEventListener('click', function (e) {
      var link = e.target.closest('a[href^="#"]');
      if (!link) return;
      var id = link.getAttribute('href');
      if (id === '#' || id.length < 2) return;
      var target = document.querySelector(id);
      if (!target) return;
      e.preventDefault();
      var header = document.querySelector('[data-sticky-header]');
      var offset = header ? header.offsetHeight + 12 : 0;
      var top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  }

  function init() {
    initFaq();
    initStickyHeader();
    initAnchorScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
