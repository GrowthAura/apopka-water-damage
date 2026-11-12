<?php
// Apopka Water Damage Restoration — shared helpers. Written fresh for
// this site.

function esc($s) {
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

function site_url($slug = '/') {
    global $SITE;
    $base = rtrim($SITE['url'], '/');
    if ($slug === '/' || $slug === '') return $base . '/';
    return $base . '/' . ltrim($slug, '/');
}

function phone_link($text = null) {
    global $SITE;
    $label = $text === null ? $SITE['phone'] : $text;
    return '<a href="' . esc($SITE['phone_href']) . '">' . esc($label) . '</a>';
}

// Nav active state: returns ' aria-current="page"' when $slug is the page
// being rendered, '' otherwise. Used by the header nav + mobile menu.
function nav_active($slug, $currentSlug) {
    return ($slug !== null && $slug !== '' && $slug === $currentSlug) ? ' aria-current="page"' : '';
}

// Wrap the FIRST occurrence of $anchor inside $text in a link.
// The words stay verbatim; only the short span becomes the anchor.
// If the link points at the page being rendered, no link is emitted at all
// (body copy never links to itself).
function linkify($text, $anchor, $href, $currentSlug = null) {
    if ($href === $currentSlug || $anchor === '' || $anchor === null) {
        return esc($text);
    }
    $pos = mb_strpos($text, $anchor);
    if ($pos === false) {
        return esc($text);
    }
    $before = mb_substr($text, 0, $pos);
    $after  = mb_substr($text, $pos + mb_strlen($anchor));
    return esc($before) . '<a href="' . esc($href) . '">' . esc($anchor) . '</a>' . esc($after);
}

// Apply several links to one sentence, left to right. Each anchor is
// linked once; a self-link is left as plain text. Anchors must not overlap.
function linkify_multi($text, $links, $currentSlug = null) {
    $out = '';
    $rest = $text;
    foreach ($links as $lnk) {
        if ($lnk['href'] === $currentSlug) continue;
        $pos = mb_strpos($rest, $lnk['anchor']);
        if ($pos === false) continue;
        $out .= esc(mb_substr($rest, 0, $pos));
        $out .= '<a href="' . esc($lnk['href']) . '">' . esc($lnk['anchor']) . '</a>';
        $rest = mb_substr($rest, $pos + mb_strlen($lnk['anchor']));
    }
    $out .= esc($rest);
    return $out;
}

// A paragraph array: ['text' => ..., 'anchor' => ..., 'href' => ...]
// or a plain string paragraph.
function render_para($para, $currentSlug = null) {
    if (is_string($para)) {
        return '<p>' . esc($para) . '</p>';
    }
    $html = '<p>';
    if (!empty($para['anchor']) && !empty($para['href'])) {
        $html .= linkify($para['text'], $para['anchor'], $para['href'], $currentSlug);
    } else {
        $html .= esc($para['text']);
    }
    return $html . '</p>';
}

// Service card paragraph: body + closing sentence verbatim, with only the
// short anchor spans linked. Ends with a period.
function card_para($card, $currentSlug = null) {
    $sentence = linkify_multi($card['sentence'], $card['links'], $currentSlug);
    return '<p>' . esc($card['body']) . ' ' . $sentence . '.</p>';
}

function bullets_html($items) {
    $out = '<ul>';
    foreach ($items as $it) {
        $out .= '<li>' . esc($it) . '</li>';
    }
    return $out . '</ul>';
}

// ---- Page map: every route the site serves -------------------------------
// Skeleton pages reuse ONLY their doc-verbatim homepage summary as content.
// No words are invented for them; their full guides await their own docs.
// Cards with two links (mold, structural, leak detection) map to two routes.
function build_pages() {
    global $SERVICES;
    $pages = [];
    foreach ($SERVICES as $c) {
        $pages[$c['slug']] = [
            'type' => 'service', 'h1' => $c['full'], 'kind' => 'service',
            'summary' => $c, 'parent' => null,
        ];
        foreach ($c['also'] ?? [] as $extra) {
            $pages[$extra['slug']] = [
                'type' => 'service', 'h1' => $extra['full'], 'kind' => 'service',
                'summary' => $c, 'parent' => null,
            ];
        }
    }
    return $pages;
}

function page_meta($slug, $pages) {
    global $HOME_META, $SITE;
    if ($slug === '/') {
        return ['title' => $HOME_META['title'], 'description' => $HOME_META['description']];
    }
    $p = $pages[$slug];
    // Titles: H1 alone — the " | Brand" suffix pushed 15/18 inner titles
    // over 60 chars. Homepage keeps its verbatim 60ch doc title.
    // Descriptions: meta only, trimmed at a word boundary to <=160 chars;
    // visible page text is untouched.
    $desc = $p['summary']['body'];
    if (strlen($desc) > 160) {
        $desc = rtrim(substr($desc, 0, 160));
        $sp = strrpos($desc, ' ');
        if ($sp !== false) $desc = substr($desc, 0, $sp);
    }
    return ['title' => $p['h1'],
            'description' => $desc];
}

// ---- JSON-LD -------------------------------------------------------------
function ld_local_business() {
    global $SITE;
    return [
        '@type' => 'LocalBusiness',
        '@id' => site_url('/') . '#business',
        'name' => $SITE['brand'],
        'description' => '24/7 emergency water damage restoration in Apopka, FL 32703 and 32712. Crew dispatched immediately.',
        'telephone' => $SITE['phone'],
        'url' => site_url('/'),
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Apopka',
            'addressRegion' => 'FL',
            'postalCode' => '32703',
            'addressCountry' => 'US',
        ],
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Apopka'],
            ['@type' => 'AdministrativeArea', 'name' => 'Orange County'],
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '00:00', 'closes' => '23:59',
        ],
    ];
}

function ld_website() {
    global $SITE;
    return [
        '@type' => 'WebSite',
        '@id' => site_url('/') . '#website',
        'url' => site_url('/'),
        'name' => $SITE['brand'],
    ];
}

function ld_breadcrumb($crumbs, $canonical = null) {
    $items = [];
    $i = 1;
    $n = count($crumbs);
    foreach ($crumbs as $c) {
        $item = ['@type' => 'ListItem', 'position' => $i, 'name' => $c['label']];
        if (!empty($c['href'])) {
            $item['item'] = site_url($c['href']);
        } elseif ($canonical !== null && $i === $n) {
            // Current page: the item is the page itself.
            $item['item'] = $canonical;
        }
        $items[] = $item;
        $i++;
    }
    $out = ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
    if ($canonical !== null) $out['@id'] = $canonical . '#breadcrumb';
    return $out;
}

function ld_faq($faqs, $canonical = null) {
    $items = [];
    foreach ($faqs as $f) {
        $items[] = [
            '@type' => 'Question',
            'name' => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
        ];
    }
    $out = ['@type' => 'FAQPage', 'mainEntity' => $items];
    if ($canonical !== null) $out['@id'] = $canonical . '#faq';
    return $out;
}

function ld_service($name, $areaName, $canonical = null) {
    global $SITE;
    $out = [
        '@type' => 'Service',
        'name' => $name,
        'serviceType' => 'Water Damage Restoration',
        'provider' => ['@id' => site_url('/') . '#business'],
        'areaServed' => ['@type' => 'City', 'name' => $areaName],
    ];
    if ($canonical !== null) $out['@id'] = $canonical . '#service';
    return $out;
}

// HowTo for the 8-step process. Steps are verbatim from the doc; no tools
// or supplies are listed because the doc names none.
function ld_howto($steps, $canonical = null) {
    $items = [];
    foreach ($steps as $i => $s) {
        $items[] = [
            '@type' => 'HowToStep',
            'position' => $i + 1,
            'name' => $s['h3'],
            'text' => $s['text'],
        ];
    }
    $out = [
        '@type' => 'HowTo',
        'name' => 'Our Water Damage Restoration Process, Step by Step',
        'step' => $items,
    ];
    if ($canonical !== null) $out['@id'] = $canonical . '#howto';
    return $out;
}

// Speakable: only content that exists verbatim on the page (hero intro +
// FAQ section).
function ld_speakable($canonical = null) {
    $out = [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['.hero-intro', '#faq'],
    ];
    if ($canonical !== null) $out['@id'] = $canonical . '#speakable';
    return $out;
}

// WebPage node: ties the page into the @id graph (isPartOf WebSite,
// about the business on the homepage / the service on service pages).
function ld_webpage($canonical, $title, $aboutId = null) {
    $out = [
        '@type' => 'WebPage',
        '@id' => $canonical,
        'url' => $canonical,
        'name' => $title,
        'isPartOf' => ['@id' => site_url('/') . '#website'],
    ];
    if ($aboutId !== null) $out['about'] = ['@id' => $aboutId];
    return $out;
}

function ld_json($graph) {
    $data = ['@context' => 'https://schema.org', '@graph' => $graph];
    return '<script type="application/ld+json">' .
        json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) .
        '</script>';
}

// Visible breadcrumb trail. Chrome, exempt from the body-copy link rule.
function crumbs_html($crumbs) {
    $out = '<nav class="crumbs" aria-label="Breadcrumb">';
    $first = true;
    foreach ($crumbs as $c) {
        if (!$first) $out .= '<span aria-hidden="true">›</span> ';
        $first = false;
        if (!empty($c['href'])) {
            $out .= '<a href="' . esc($c['href']) . '">' . esc($c['label']) . '</a>';
        } else {
            $out .= '<span aria-current="page">' . esc($c['label']) . '</span>';
        }
    }
    return $out . '</nav>';
}
