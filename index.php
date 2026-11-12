<?php
// Apopka Water Damage Restoration — front controller / router. Plain PHP 8.
// Clean URLs, no trailing slash except the homepage. Slash forms of a
// no-slash route answer 308 to the no-slash form.
// Local only: no deploy, no domain, no external service calls.
$ROOT = __DIR__;
require $ROOT . '/data/pages.php';
require $ROOT . '/data/media.php';
require $ROOT . '/includes/functions.php';
require $ROOT . '/includes/lead-handler.php';

$PAGES = build_pages();
$TODAY = date('Y-m-d');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$rawPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rawurldecode($rawPath);

// 1. Slash form of a no-slash route -> 308 to the no-slash form.
if ($path !== '/' && strlen($path) > 1 && str_ends_with($path, '/')) {
    $target = rtrim($path, '/');
    header('Location: ' . $target, true, 308);
    exit;
}

// 2. Sitemap (dynamic, loc + date-only lastmod).
if ($path === '/sitemap.xml') {
    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    $all = array_merge(['/'], array_keys($PAGES));
    foreach ($all as $slug) {
        echo '  <url><loc>' . esc(site_url($slug)) . '</loc><lastmod>' . $TODAY . '</lastmod></url>' . "\n";
    }
    echo '</urlset>';
    exit;
}

// 3. Static files (assets, favicons, manifest, robots, llms).
$MIME = [
    'css' => 'text/css', 'js' => 'text/javascript', 'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg', 'png' => 'image/png', 'ico' => 'image/x-icon',
    'svg' => 'image/svg+xml', 'json' => 'application/manifest+json',
    'webmanifest' => 'application/manifest+json', 'txt' => 'text/plain',
    'xml' => 'application/xml',
];
$isStatic = str_starts_with($path, '/assets/') ||
    in_array($path, ['/favicon.ico', '/favicon.svg', '/favicon-16x16.png', '/favicon-32x32.png',
        '/favicon-48x48.png', '/favicon-192x192.png', '/favicon-512x512.png',
        '/apple-touch-icon.png', '/site.webmanifest', '/robots.txt', '/llms.txt'], true);
if ($isStatic) {
    $file = $ROOT . $path;
    if (is_file($file)) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        header('Content-Type: ' . ($MIME[$ext] ?? 'application/octet-stream'));
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
    http_response_code(404);
    echo 'Not found';
    exit;
}

// 4. Lead form submission (homepage or any known page). No mail is sent;
// the renderer shows an honest notice instead.
$form = null;
if ($method === 'POST' && ($path === '/' || isset($PAGES[$path]))) {
    $form = handle_lead_post($_POST);
}

// 5. Routes.
if ($path === '/') {
    render_home($form);
    exit;
}
if (isset($PAGES[$path])) {
    render_page($path, $PAGES[$path], $form);
    exit;
}

// 6. 404.
http_response_code(404);
$HEAD = [
    'title' => 'Page Not Found | ' . $SITE['brand'],
    'description' => 'The page you asked for is not here. Call ' . $SITE['phone'] . ' for 24/7 emergency water damage help in Apopka, FL 32703.',
    'canonical' => site_url('/'),
    'og_type' => 'website',
    'ld' => ld_json([ld_local_business()]),
];
$currentSlug = $path;
$show_map = false;
$is_404 = true;
require $ROOT . '/includes/header.php';
?>
<section class="hero hero-short">
  <div class="container hero-content">
    <p class="eyebrow on-navy"><?= esc($HOME_META['eyebrow']) ?></p>
    <h1>Page Not Found</h1>
    <p class="hero-intro">The page you asked for is not here.</p>
    <div class="hero-ctas">
      <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
      <a class="btn btn-cream" href="/">Back to home</a>
    </div>
  </div>
</section>
<?php
require $ROOT . '/includes/footer.php';
exit;

// ---------------------------------------------------------------------------
function hero_buttons($formTarget = '#request-service') {
    global $SITE;
    return '<div class="hero-ctas">' .
        '<a class="btn btn-ocean" href="' . esc($SITE['phone_href']) . '">' . esc($SITE['phone']) . '</a>' .
        '<a class="btn btn-cream" href="' . esc($formTarget) . '">Request Emergency Help</a>' .
        '</div>';
}

function call_strip() {
    global $SITE;
    return '<section class="call-strip"><div class="container">' .
        '<p>Call ' . esc($SITE['phone']) . ' now for water damage Apopka FL 32703 help. A crew is dispatched immediately.</p>' .
        '<a class="btn btn-navy" href="' . esc($SITE['phone_href']) . '">' . esc($SITE['phone']) . '</a>' .
        '</div></section>';
}

function final_cta_compact() {
    global $FINAL_CTA_H2, $FINAL_CTA_PARAS;
    $out = '<section class="final-cta"><div class="container"><div class="final-cta-card reveal">';
    $out .= '<h2>' . esc($FINAL_CTA_H2) . '</h2>';
    foreach ($FINAL_CTA_PARAS as $p) $out .= '<p>' . esc($p) . '</p>';
    $out .= hero_buttons('#request-service');
    $out .= '</div></div></section>';
    return $out;
}

function render_home($form = null) {
    global $ROOT, $SITE, $HOME_META, $TRUST, $WHO_H2, $WHO_PARAS,
        $SERVICES, $SERVICES_H2, $SERVICES_INTRO, $WHY_H2, $WHY_INTRO,
        $WHY_LEAD, $WHY_REASONS, $PROCESS_H2, $PROCESS_INTRO, $PROCESS_STEPS,
        $CATEGORIES_H2, $CATEGORIES_INTRO, $CATEGORIES_BULLETS,
        $CATEGORIES_CLOSE, $COST_H2, $COST_INTRO, $COST_BULLETS, $COST_CLOSE,
        $INSURANCE_H2, $INSURANCE_PARAS, $SIGNS_H2, $SIGNS_INTRO,
        $SIGNS_BULLETS, $SIGNS_CLOSE, $FIRST_HOUR_H2, $FIRST_HOUR_INTRO,
        $FIRST_HOUR_BULLETS, $SERVING_H2, $SERVING_PARA, $WHY_US_H2,
        $WHY_US_INTRO, $WHY_US_BULLETS, $FAQ_H2, $FAQS, $FINAL_CTA_H2,
        $FINAL_CTA_PARAS;
    $homeHero = page_img('/', 'hero');
    $homeCanon = site_url('/');
    $HEAD = [
        'title' => $HOME_META['title'],
        'description' => $HOME_META['description'],
        'canonical' => $homeCanon,
        'og_type' => 'website',
        'og_image' => $homeHero ? site_url($homeHero['src']) : null,
        'ld' => ld_json([ld_local_business(), ld_website(),
            ld_webpage($homeCanon, $HOME_META['title'], site_url('/') . '#business'),
            ld_breadcrumb([['label' => 'Home', 'href' => '/']], $homeCanon),
            ld_faq($FAQS, $homeCanon), ld_howto($PROCESS_STEPS, $homeCanon), ld_speakable($homeCanon)]),
    ];
    $currentSlug = '/';
    $show_map = true;
    require $ROOT . '/includes/header.php';
    ?>
<section class="hero">
  <?php if ($homeHero): ?><div class="hero-media"><img src="<?= esc($homeHero['src']) ?>" alt="<?= esc($homeHero['alt']) ?>" width="1600" height="900" fetchpriority="high"></div><?php endif; ?>
  <div class="container hero-content">
    <p class="eyebrow on-navy"><?= esc($HOME_META['eyebrow']) ?></p>
    <h1><?= esc($HOME_META['h1']) ?></h1>
    <p class="hero-intro"><?= esc($HOME_META['intro']) ?></p>
    <?= hero_buttons() ?>
  </div>
</section>
<section class="trust-band"><div class="container"><ul>
  <?php foreach ($TRUST as $t): ?>
  <li><span class="check" aria-hidden="true">&#10003;</span><?= esc($t) ?></li>
  <?php endforeach; ?>
</ul></div></section>
<section class="section"><div class="container"><div class="split"><div class="content-block reveal">
  <h2><?= esc($WHO_H2) ?></h2>
  <?php foreach ($WHO_PARAS as $p): ?><p><?= esc($p) ?></p><?php endforeach; ?>
</div><aside class="sticky-aside reveal"><div class="brand-panel">
  <p class="panel-title">Emergency Water Damage?</p>
  <p>A crew is dispatched immediately.</p>
  <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
</div><div class="aside-call">
  <p>Water damage restoration in Apopka, FL starts the moment you pick up the phone.</p>
  <a class="btn btn-navy" href="#request-service">Request Emergency Help</a>
</div></aside></div></div></section>
<section class="section section-cream"><div class="container content-block reveal">
  <h2><?= esc($SERVICES_H2) ?></h2>
  <p class="lead"><?= esc($SERVICES_INTRO) ?></p>
  <div class="cards">
    <?php foreach ($SERVICES as $c): $cimg = page_img($c['slug'], 'card'); ?>
    <article class="card">
      <?php if ($cimg): ?><div class="card-media"><?= img_tag($cimg, 1200, 675) ?></div><?php else: ?><div class="card-media card-media-empty" aria-hidden="true"></div><?php endif; ?>
      <div class="card-body"><h3><?= esc($c['h3']) ?></h3><?= card_para($c, '/') ?></div>
    </article>
    <?php endforeach; ?>
  </div>
</div></section>
<section class="section"><div class="container content-block reveal">
  <h2><?= esc($WHY_H2) ?></h2>
  <p class="lead"><?= esc($WHY_INTRO) ?></p>
  <p><?= esc($WHY_LEAD) ?></p>
  <div class="cause-grid">
  <?php foreach ($WHY_REASONS as $c): ?>
  <div class="cause-card"><p class="cause-title"><?= esc($c['h3']) ?></p><p><?= esc($c['text']) ?></p></div>
  <?php endforeach; ?>
  </div>
</div></section>
<section class="section section-navy"><div class="container content-block reveal">
  <h2><?= esc($PROCESS_H2) ?></h2>
  <p class="lead"><?= esc($PROCESS_INTRO) ?></p>
  <div class="phase-grid">
    <?php foreach ($PROCESS_STEPS as $i => $s): $pimg = page_img('process-' . ($i + 1), 'img'); ?>
    <div class="phase-card">
      <?php if ($pimg): ?><div class="phase-media"><img src="<?= esc($pimg['src']) ?>" alt="<?= esc($pimg['alt']) ?>" width="1200" height="675" loading="lazy"></div><?php else: ?><div class="phase-media phase-media-empty" aria-hidden="true"></div><?php endif; ?>
      <h3><?= esc($s['h3']) ?></h3><p><?= esc($s['text']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</div></section>
<section class="section section-tint"><div class="container content-block reveal">
  <h2><?= esc($CATEGORIES_H2) ?></h2>
  <p><?= esc($CATEGORIES_INTRO) ?></p>
  <div class="cat-grid">
    <?php foreach ($CATEGORIES_BULLETS as $b):
        $pos = strpos($b, ': ');
        $lead = substr($b, 0, $pos); $rest = substr($b, $pos + 1);
    ?>
    <div class="cat-card"><p class="cat-title"><?= esc($lead) ?></p><p><?= esc(ltrim($rest)) ?></p></div>
    <?php endforeach; ?>
  </div>
  <p><?= esc($CATEGORIES_CLOSE) ?></p>
</div></section>
<section class="section"><div class="container content-block reveal">
  <h2><?= esc($COST_H2) ?></h2>
  <p><?= esc($COST_INTRO) ?></p>
  <?= bullets_html($COST_BULLETS) ?>
  <p><?= esc($COST_CLOSE) ?></p>
  <hr class="doc-divide">
  <h2><?= esc($INSURANCE_H2) ?></h2>
  <?php foreach ($INSURANCE_PARAS as $p): ?><?= render_para($p, '/') ?><?php endforeach; ?>
  <hr class="doc-divide">
  <h2><?= esc($SIGNS_H2) ?></h2>
  <p><?= esc($SIGNS_INTRO) ?></p>
  <?= bullets_html($SIGNS_BULLETS) ?>
  <p><?= esc($SIGNS_CLOSE) ?></p>
  <hr class="doc-divide">
  <h2><?= esc($FIRST_HOUR_H2) ?></h2>
  <p><?= esc($FIRST_HOUR_INTRO) ?></p>
  <?= bullets_html($FIRST_HOUR_BULLETS) ?>
  <hr class="doc-divide">
  <h2><?= esc($SERVING_H2) ?></h2>
  <p><?= esc($SERVING_PARA) ?></p>
  <hr class="doc-divide">
  <h2><?= esc($WHY_US_H2) ?></h2>
  <p><?= esc($WHY_US_INTRO) ?></p>
  <?= bullets_html($WHY_US_BULLETS) ?>
</div></section>
<section class="section section-cream" id="faq"><div class="container content-block reveal">
  <h2><?= esc($FAQ_H2) ?></h2>
  <div class="faq-list">
    <?php foreach ($FAQS as $f): ?>
    <details>
      <summary><h3><?= esc($f['q']) ?></h3><span class="faq-toggle" aria-hidden="true">+</span></summary>
      <div class="faq-answer"><p><?= esc($f['a']) ?></p></div>
    </details>
    <?php endforeach; ?>
  </div>
</div></section>
<?= call_strip() ?>
<section class="final-cta"><div class="container"><div class="final-cta-card reveal">
  <h2><?= esc($FINAL_CTA_H2) ?></h2>
  <?php foreach ($FINAL_CTA_PARAS as $p): ?><p><?= esc($p) ?></p><?php endforeach; ?>
  <?= hero_buttons() ?>
</div>
<div class="form-wrap">
  <?php require $ROOT . '/includes/lead-form.php'; ?>
</div></div></section>
<?php
    require $ROOT . '/includes/footer.php';
}

function render_page($slug, $page, $form = null) {
    global $ROOT, $SITE, $HOME_META, $PAGES;
    $meta = page_meta($slug, $PAGES);
    $crumbs = [['label' => 'Home', 'href' => '/'], ['label' => $page['h1']]];
    $pageCanon = site_url($slug);
    $graph = [ld_local_business(), ld_webpage($pageCanon, $meta['title'], $pageCanon . '#service'),
        ld_breadcrumb($crumbs, $pageCanon),
        ld_service($page['h1'], 'Apopka', $pageCanon)];
    $pageHero = page_img($slug, 'hero');
    $HEAD = [
        'title' => $meta['title'],
        'description' => $meta['description'],
        'canonical' => site_url($slug),
        'og_type' => 'website',
        'og_image' => $pageHero ? site_url($pageHero['src']) : null,
        'ld' => ld_json($graph),
    ];
    $currentSlug = $slug;
    $show_map = true;
    require $ROOT . '/includes/header.php';
    ?>
<section class="hero hero-short">
  <?php if ($pageHero): ?><div class="hero-media"><img src="<?= esc($pageHero['src']) ?>" alt="<?= esc($pageHero['alt']) ?>" width="1600" height="900" fetchpriority="high"></div><?php endif; ?>
  <div class="container hero-content">
    <p class="eyebrow on-navy"><?= esc($HOME_META['eyebrow']) ?></p>
    <h1><?= esc($page['h1']) ?></h1>
    <?= hero_buttons() ?>
  </div>
</section>
<section class="section"><div class="container content-block reveal">
  <?= crumbs_html($crumbs) ?>
  <?= card_para($page['summary'], $slug) ?>
  <div class="form-wrap">
    <?php require $ROOT . '/includes/lead-form.php'; ?>
  </div>
  <p class="back-home"><a href="/">Back to home</a></p>
</div></section>
<?= call_strip() ?>
<?= final_cta_compact() ?>
<?php
    require $ROOT . '/includes/footer.php';
}
