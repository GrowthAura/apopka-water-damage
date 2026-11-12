<?php
// Apopka Water Damage Restoration — page head + header. Written fresh
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
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?= esc($HEAD['canonical']) ?>">
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
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= esc($HEAD['title']) ?>">
<meta name="twitter:description" content="<?= esc($HEAD['description']) ?>">
<meta name="theme-color" content="#0F1D2E">
<link rel="manifest" href="/site.webmanifest">
<link rel="icon" href="/favicon.ico">
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..700;1,9..144,400..700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/styles.css?v=5">
<?= $HEAD['ld'] ?? '' ?>
<noscript><style>.reveal{opacity:1 !important;transform:none !important;}</style></noscript>
</head>
<body>
<header class="site-header">
  <div class="topbar">
    <div class="topbar-inner">
      <span>24/7 Emergency Service &middot; Apopka, FL 32703 &amp; 32712</span>
      <a href="<?= esc($SITE['phone_href']) ?>">Call <?= esc($SITE['phone']) ?></a>
    </div>
  </div>
  <div class="container header-row">
    <a class="brand" href="/" aria-label="Apopka Water Damage Restoration, home">
      <span class="brand-mark" aria-hidden="true"><svg viewBox="0 0 24 24" width="24" height="24"><path d="M12 2.5C12 2.5 5.5 10.2 5.5 14.8a6.5 6.5 0 0 0 13 0C18.5 10.2 12 2.5 12 2.5Z" fill="#0B7AB5"/><path d="M9.2 15.2a2.8 2.8 0 0 0 2.3 2.7" fill="none" stroke="#FBF8F2" stroke-width="1.4" stroke-linecap="round"/></svg></span>
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
        <div class="mobile-menu">
          <a href="/"<?= nav_active('/', $currentSlug ?? null) ?>>Home</a>
          <p class="drop-group">Water Damage Services</p>
          <?php foreach ($SERVICES as $s): ?>
          <a href="<?= esc($s['slug']) ?>"<?= nav_active($s['slug'], $currentSlug ?? null) ?>><?= esc($s['nav']) ?></a>
          <?php foreach ($s['also'] ?? [] as $x): ?>
          <a href="<?= esc($x['slug']) ?>"<?= nav_active($x['slug'], $currentSlug ?? null) ?>><?= esc($x['nav']) ?></a>
          <?php endforeach; ?>
          <?php endforeach; ?>
          <a href="/about"<?= nav_active('/about', $currentSlug ?? null) ?>>About</a>
          <a href="/contact"<?= nav_active('/contact', $currentSlug ?? null) ?>>Contact</a>
          <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
        </div>
      </details>
    </div>
  </div>
</header>
<main>
