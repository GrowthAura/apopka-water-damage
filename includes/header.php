<?php
// Apopka Water Damage Restoration - page head + header. Written fresh
// for this site. Expects before include: $HEAD (title, description,
// canonical, ld json, og_type), $currentSlug, and the data arrays from
// data/pages.php.
global $SITE, $SERVICES;
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script>document.documentElement.classList.add('js');</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= esc($HEAD['title']) ?></title>
<meta name="description" content="<?= esc($HEAD['description']) ?>">
<meta name="robots" content="<?= esc($HEAD['robots'] ?? 'index, follow') ?>">
<?php if (empty($HEAD['no_canonical'])): ?>
<link rel="canonical" href="<?= esc($HEAD['canonical']) ?>">
<?php endif; ?>
<meta property="og:type" content="<?= esc($HEAD['og_type'] ?? 'website') ?>">
<meta property="og:title" content="<?= esc($HEAD['title']) ?>">
<meta property="og:description" content="<?= esc($HEAD['description']) ?>">
<meta property="og:url" content="<?= esc($HEAD['canonical']) ?>">
<meta property="og:site_name" content="<?= esc($SITE['brand']) ?>">
<?php $ogImage = $HEAD['og_image'] ?? null; ?>
<?php if ($ogImage): ?>
<meta property="og:image" content="<?= esc($ogImage) ?>">
<meta name="twitter:image" content="<?= esc($ogImage) ?>">
<?php endif; ?>
<meta name="twitter:card" content="<?= $ogImage ? 'summary_large_image' : 'summary' ?>">
<meta name="twitter:title" content="<?= esc($HEAD['title']) ?>">
<meta name="twitter:description" content="<?= esc($HEAD['description']) ?>">
<meta name="theme-color" content="#0F1D2E">
<link rel="manifest" href="/site.webmanifest">
<!-- C2 Stage 2 (CLS P3-1): preload the two woff2 files actually fetched
     on every page. Italic was never fetched in 75 probes - not preloaded. -->
<link rel="preload" href="/assets/fonts/fraunces-normal.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/inter-var.woff2" as="font" type="font/woff2" crossorigin>
<?php /* STAGE 3 (2026-11-17, mobile SI): hero image preload (exact WebP
     srcset/sizes as the hero <picture>); JSON-LD moved to end of <body>
     (footer.php) so the ~11.7KB schema block no longer sits in <head>
     ahead of the body markup. */ ?>
<?= $HEAD['hero_preload'] ?? '' ?>
<link rel="icon" href="/favicon.ico">
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="stylesheet" href="/assets/css/styles.css?v=16">
<noscript><style>.reveal{opacity:1 !important;transform:none !important;}</style></noscript>
</head>
<body id="top">
<!-- STAGE 2A (P1-4): the topbar lives OUTSIDE the sticky header now.
     It scrolls away with the document; the sticky header's own height
     never changes, so the first scroll can no longer shift the page. -->
<div class="topbar">
  <div class="topbar-inner">
    <span>24/7 Emergency Service <span class="topbar-dot" aria-hidden="true">&middot;</span> Apopka, FL 32703 &amp; 32712</span>
    <a href="<?= esc($SITE['phone_href']) ?>">Call <?= esc($SITE['phone']) ?></a>
  </div>
</div>
<header class="site-header">
  <div class="container header-row">
    <a class="brand" href="/" aria-label="Apopka Water Damage Restoration, home">
      <span class="brand-mark" aria-hidden="true"><svg viewBox="0 0 24 24" width="24" height="24"><circle cx="12" cy="12" r="10.6" fill="none" stroke="#B98A1F" stroke-width="1.5"/><path d="M7.2 17.5 L12 6.5 L16.8 17.5 M9.3 13.2 H14.7" fill="none" stroke="#FBF8F2" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
      <span class="brand-word">Apopka<br>Water Damage<small><?= esc($SITE['brand_small']) ?></small></span>
    </a>
    <nav class="main-nav" aria-label="Main">
      <a href="/"<?= nav_active('/', $currentSlug ?? null) ?>>Home</a>
      <details>
        <summary>Services</summary>
        <div class="nav-drop">
          <p class="drop-group">Water Damage Services</p>
          <?php foreach ($SERVICES as $s): ?>
          <a href="<?= esc($s['slug']) ?>"<?= nav_active($s['slug'], $currentSlug ?? null) ?>><?= esc($s['nav']) ?></a>
          <?php foreach ($s['also'] ?? [] as $x): ?>
          <a href="<?= esc($x['slug']) ?>"<?= nav_active($x['slug'], $currentSlug ?? null) ?>><?= esc($x['nav']) ?></a>
          <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </details>
      <a href="/about"<?= nav_active('/about', $currentSlug ?? null) ?>>About</a>
      <a href="/contact"<?= nav_active('/contact', $currentSlug ?? null) ?>>Contact</a>
    </nav>
    <a class="btn btn-ocean header-cta" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
    <div class="mobile-head">
      <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
      <details class="mobile-menu-wrap">
        <summary class="btn btn-outline" aria-label="Open menu"><svg viewBox="0 0 20 20" width="20" height="20" aria-hidden="true"><path d="M3 5h14M3 10h14M3 15h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></summary>
        <!-- STAGE 2A (P2-3): links scroll; Contact + call are pinned in a
             fixed foot outside the scrollable area, visible on open. -->
        <div class="mobile-menu">
          <div class="mobile-menu-links">
          <a href="/"<?= nav_active('/', $currentSlug ?? null) ?>>Home</a>
          <p class="drop-group">Water Damage Services</p>
          <?php foreach ($SERVICES as $s): ?>
          <a href="<?= esc($s['slug']) ?>"<?= nav_active($s['slug'], $currentSlug ?? null) ?>><?= esc($s['nav']) ?></a>
          <?php foreach ($s['also'] ?? [] as $x): ?>
          <a href="<?= esc($x['slug']) ?>"<?= nav_active($x['slug'], $currentSlug ?? null) ?>><?= esc($x['nav']) ?></a>
          <?php endforeach; ?>
          <?php endforeach; ?>
          </div>
          <div class="mobile-menu-foot">
          <a href="/about"<?= nav_active('/about', $currentSlug ?? null) ?>>About</a>
          <a href="/contact"<?= nav_active('/contact', $currentSlug ?? null) ?>>Contact</a>
          <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
          </div>
        </div>
      </details>
    </div>
  </div>
</header>
<main>
