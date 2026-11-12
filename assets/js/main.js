// Apopka Water Damage Restoration — vanilla JS only.
// Reveal-on-scroll via IntersectionObserver; mobile menu closes when a link
// inside it is tapped. FAQ uses native <details>, no JS needed.
(function () {
  'use strict';

  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    // Threshold 0.02 (was 0.12): a tall section container — e.g. the
    // 7,686px services section on a 390px phone — can never show 12% of
    // itself inside an 844px viewport, so it stayed invisible forever.
    // Any visible sliver now triggers the reveal.
    }, { threshold: 0.02 });
    revealEls.forEach(function (el) { observer.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in'); });
  }

  // Header gains a shadow once the page scrolls.
  var header = document.querySelector('.site-header');
  function onScrollHeader() {
    if (!header) return;
    header.classList.toggle('scrolled', window.scrollY > 8);
  }
  window.addEventListener('scroll', onScrollHeader, { passive: true });
  onScrollHeader();

  // Close the mobile menu after a link inside it is tapped.
  document.querySelectorAll('.mobile-menu a').forEach(function (link) {
    link.addEventListener('click', function () {
      var wrap = link.closest('.mobile-menu-wrap');
      if (wrap) wrap.removeAttribute('open');
    });
  });

  // Close the mobile menu on scroll (standing rule). Without this the
  // open panel rides the sticky header and covers content until dismissed.
  window.addEventListener('scroll', function () {
    document.querySelectorAll('.mobile-menu-wrap[open]').forEach(function (w) {
      w.removeAttribute('open');
    });
    syncExpanded();
  }, { passive: true });

  // Only one desktop dropdown open at a time.
  document.querySelectorAll('.main-nav details').forEach(function (detail) {
    detail.addEventListener('toggle', function () {
      if (!detail.open) return;
      document.querySelectorAll('.main-nav details').forEach(function (other) {
        if (other !== detail) other.removeAttribute('open');
      });
    });
  });

  // Keep aria-expanded in sync on every header <summary>.
  function syncExpanded() {
    document.querySelectorAll('header details summary').forEach(function (s) {
      s.setAttribute('aria-expanded', s.parentElement.open ? 'true' : 'false');
    });
  }
  document.querySelectorAll('header details').forEach(function (d) {
    d.addEventListener('toggle', syncExpanded);
  });
  syncExpanded();

  // Escape closes any open header dropdown / mobile menu.
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    document.querySelectorAll('header details[open]').forEach(function (d) {
      d.removeAttribute('open');
    });
    syncExpanded();
  });

  // Click outside the header closes open desktop dropdowns.
  document.addEventListener('click', function (e) {
    if (e.target.closest('.site-header')) return;
    document.querySelectorAll('.main-nav details[open]').forEach(function (d) {
      d.removeAttribute('open');
    });
    syncExpanded();
  });

  // Mobile call bar: hidden at first paint so it can never cover the hero
  // buttons; it slides in once the user has scrolled a little.
  var docEl = document.documentElement;
  function callbar() {
    if (window.scrollY > 80) {
      docEl.classList.add('callbar-on');
    } else {
      docEl.classList.remove('callbar-on');
    }
  }
  window.addEventListener('scroll', callbar, { passive: true });
  callbar();
})();
