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
// Every inner page carries its OWN tab's full content verbatim
// ($FULL_PAGES, generated from doc tabs 02..25). The $SERVICES loop below
// only keeps the homepage card data in shape; the full pages override it.
function build_pages() {
    global $SERVICES, $FULL_PAGES;
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
    foreach ($FULL_PAGES as $slug => $fp) {
        $pages[$slug] = [
            'type' => $fp['type'], 'h1' => $fp['h1'], 'kind' => $fp['type'],
            'full' => $fp, 'parent' => null,
        ];
    }
    return $pages;
}

// Trim at a word boundary to <= $max chars. Meta only; visible page text
// is untouched.
function trim_words_meta($s, $max) {
    if (strlen($s) <= $max) return $s;
    $t = rtrim(substr($s, 0, $max));
    $sp = strrpos($t, ' ');
    return $sp !== false ? substr($t, 0, $sp) : $t;
}

function page_meta($slug, $pages) {
    global $HOME_META, $SITE, $FULL_PAGES;
    if ($slug === '/') {
        return ['title' => $HOME_META['title'], 'description' => $HOME_META['description']];
    }
    if (isset($FULL_PAGES[$slug])) {
        // Titles: the tab's H1 alone, trimmed at a word boundary to <=60
        // (two blog H1s are 62-63ch; the doc's own Meta Titles run 54-64ch
        // and are NOT used as <title> — same class as the Round 1 P3 fix).
        // Descriptions: the tab's Meta Description verbatim (all <=108ch).
        $fp = $FULL_PAGES[$slug];
        return ['title' => trim_words_meta($fp['meta_title'], 60),
                'description' => trim_words_meta($fp['meta_description'], 160)];
    }
    $p = $pages[$slug];
    $desc = $p['summary']['body'];
    return ['title' => $p['h1'],
            'description' => trim_words_meta($desc, 160)];
}

// Render text with its doc links. Each link is applied once, left to
// right, on the doc's FULL phrase (the anchor is never a partial phrase).
// A self-link or a second link to the same target on this page stays
// plain text (paren annotation already stripped from $text).
function render_linked($text, $links, $currentSlug, &$used) {
    $out = '';
    $rest = $text;
    foreach ($links as $lnk) {
        $anchor = $lnk[0];
        $href = $lnk[1];
        if ($href === $currentSlug || in_array($href, $used, true)) continue;
        $pos = mb_strpos($rest, $anchor);
        if ($pos === false) continue;
        $out .= esc(mb_substr($rest, 0, $pos));
        $out .= '<a href="' . esc($href) . '">' . esc($anchor) . '</a>';
        $rest = mb_substr($rest, $pos + mb_strlen($anchor));
        $used[] = $href;
    }
    $out .= esc($rest);
    return $out;
}

// Render a full page's body blocks (h2 / h3 / p / ul) in doc order.
function render_block_list($blocks, $slug, &$used) {
    $out = '';
    foreach ($blocks as $b) {
        if ($b['t'] === 'h2') {
            $out .= '<h2>' . esc($b['x']) . '</h2>';
        } elseif ($b['t'] === 'h3') {
            $out .= '<h3>' . esc($b['x']) . '</h3>';
        } elseif ($b['t'] === 'p') {
            $out .= '<p>' . render_linked($b['x'], $b['l'] ?? [], $slug, $used) . '</p>';
        } elseif ($b['t'] === 'ul') {
            $out .= '<ul>';
            foreach ($b['items'] as $it) {
                $out .= '<li>' . render_linked($it['x'], $it['l'] ?? [], $slug, $used) . '</li>';
            }
            $out .= '</ul>';
        }
    }
    return $out;
}

// ---- JSON-LD -------------------------------------------------------------
// Business node (2026-11-12 10x upgrade): HomeAndConstructionBusiness,
// the 2026-11-08 research verdict's best subtype — NEVER EmergencyService
// (schema.org defines that as a fire station / ER). One @id (#business)
// shared by every page. Description is the homepage meta description,
// verbatim from the doc. NO street address (none in the doc), NO geo,
// NO Review/AggregateRating, NO sameAs, NO price/founding date.
// areaServed lists only places the doc itself names: Apopka + Orange
// County + Central Florida, plus Zellwood and Plymouth (named as reached
// areas in the Serving section). No neighbouring city is claimed.
// $imageUrl is that page's real hero photo; when omitted it defaults to
// the homepage hero.
function ld_local_business($imageUrl = null) {
    global $SITE, $SERVICES, $HOME_META;
    if ($imageUrl === null) {
        $homeHero = page_img('/', 'hero');
        $imageUrl = $homeHero ? site_url($homeHero['src']) : null;
    }
    $offers = [];
    foreach ($SERVICES as $s) {
        $offers[] = ld_offer($s);
        foreach ($s['also'] ?? [] as $x) {
            $offers[] = ld_offer($x);
        }
    }
    $out = [
        '@type' => 'HomeAndConstructionBusiness',
        'additionalType' => 'https://schema.org/ProfessionalService',
        '@id' => site_url('/') . '#business',
        'name' => $SITE['brand'],
        'description' => $HOME_META['description'],
        'url' => site_url('/'),
        'telephone' => '+1-407-787-9139',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Apopka',
            'addressRegion' => 'FL',
            'postalCode' => ['32703', '32712'],
            'addressCountry' => 'US',
        ],
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Apopka'],
            ['@type' => 'AdministrativeArea', 'name' => 'Orange County'],
            ['@type' => 'AdministrativeArea', 'name' => 'Central Florida'],
            ['@type' => 'Place', 'name' => 'Zellwood'],
            ['@type' => 'Place', 'name' => 'Plymouth'],
            ['@type' => 'PostalCode', 'postalCode' => '32703'],
            ['@type' => 'PostalCode', 'postalCode' => '32712'],
        ],
        // U-3 (Cycle 1): only terms verified verbatim in page copy —
        // "IICRC S500 Drying Methods" is a homepage category heading.
        'knowsAbout' => ['Water damage restoration', 'Emergency water extraction',
            'Structural drying', 'Mold remediation', 'IICRC S500 Drying Methods'],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '00:00', 'closes' => '23:59',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Water Damage Restoration Services',
            'itemListElement' => $offers,
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+1-407-787-9139',
            'contactType' => 'customer service',
            'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Orange County'],
            'availableLanguage' => 'English',
            // U-5 (Cycle 1): mirrors openingHoursSpecification — 24/7
            // is stated everywhere on the site; no new fact.
            'hoursAvailable' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '00:00', 'closes' => '23:59',
            ],
        ],
        // The real footer map URL already embedded on every page.
        'hasMap' => 'https://www.google.com/maps?q=' . rawurlencode($SITE['map_query']) . '&output=embed',
    ];
    if ($imageUrl !== null) {
        $out['image'] = $imageUrl;
    }
    return $out;
}

// One catalog entry: verbatim service label + live URL. No invented
// offers, prices or availability — the label and URL are the offer.
function ld_offer($s) {
    return [
        '@type' => 'Offer',
        'itemOffered' => [
            '@type' => 'Service',
            'name' => $s['nav'],
            'url' => site_url($s['slug']),
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
        'publisher' => ['@id' => site_url('/') . '#business'],
        'inLanguage' => 'en-US',
    ];
}

function ld_breadcrumb($crumbs, $canonical = null) {
    $items = [];
    $i = 1;
    $n = count($crumbs);
    foreach ($crumbs as $c) {
        $item = ['@type' => 'ListItem', 'position' => $i, 'name' => $c['label']];
        if (!empty($c['href'])) {
            // Cycle 1 P3-4: item as an object, not a bare URL string.
            // Cycle 2 U-3: name also inside the item object.
            $item['item'] = ['@id' => site_url($c['href']), 'name' => $c['label']];
        } elseif ($canonical !== null && $i === $n) {
            // Current page: the item is the page itself.
            $item['item'] = ['@id' => $canonical, 'name' => $c['label']];
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

function ld_service($name, $serviceType, $canonical, $imageUrl = null, $description = null) {
    global $SITE;
    $out = [
        '@type' => 'Service',
        'name' => $name,
        'serviceType' => $serviceType,
        'provider' => ['@id' => site_url('/') . '#business'],
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Apopka'],
            ['@type' => 'AdministrativeArea', 'name' => 'Orange County'],
            ['@type' => 'AdministrativeArea', 'name' => 'Central Florida'],
            ['@type' => 'Place', 'name' => 'Zellwood'],
            ['@type' => 'Place', 'name' => 'Plymouth'],
        ],
        'url' => $canonical,
    ];
    // $description is the page's verbatim meta description (doc text).
    if ($description !== null) {
        $out['description'] = $description;
    }
    if ($imageUrl !== null) {
        $out['image'] = $imageUrl;
    }
    if ($canonical !== null) $out['@id'] = $canonical . '#service';
    return $out;
}

// Article for the /resources/ guides. NO dates: the doc gives no publish
// or update date for any guide, so datePublished/dateModified are omitted
// rather than invented.
// $body is the blog tab's full visible article text verbatim (its blocks
// joined with blank lines) — Cycle 1 P2-1 articleBody.
function ld_article($canonical, $headline, $imageUrl = null, $description = null, $body = null, $imageMeta = null) {
    $out = [
        '@type' => 'Article',
        '@id' => $canonical . '#article',
        'headline' => $headline,
        'author' => ['@id' => site_url('/') . '#business'],
        'publisher' => ['@id' => site_url('/') . '#business'],
        'mainEntityOfPage' => $canonical,
        // Cycle 2 U-4: the article is part of the site.
        'isPartOf' => ['@id' => site_url('/') . '#website'],
        'inLanguage' => 'en-US',
        // U-2 (Cycle 1): about the business; articleSection is the URL
        // directory the blogs live under — honest, not invented.
        'about' => ['@id' => site_url('/') . '#business'],
        'articleSection' => 'Resources',
    ];
    // $description is the page's verbatim meta description (doc text).
    if ($description !== null) {
        $out['description'] = $description;
    }
    // Cycle 4 P3-2: Article.image as an ImageObject with the
    // already-known dimensions (same helper as primaryImageOfPage).
    if ($imageUrl !== null) {
        if ($imageMeta !== null && isset($imageMeta['width'], $imageMeta['height'])) {
            $imgObj = ['@type' => 'ImageObject', 'url' => $imageUrl,
                'width' => (int) $imageMeta['width'], 'height' => (int) $imageMeta['height']];
            if (!empty($imageMeta['alt'])) $imgObj['caption'] = $imageMeta['alt'];
            $out['image'] = $imgObj;
        } else {
            $out['image'] = $imageUrl;
        }
    }
    if ($body !== null && $body !== '') {
        $out['articleBody'] = $body;
    }
    return $out;
}

// Full visible article text, verbatim: the intro (lead) paragraph first,
// then every block's text in doc order (headings, paragraphs, list items),
// joined with blank lines. No trimming, no new words. FAQ Q&A are not
// blocks, so they stay out. Cycle 2 P3-1: the intro was previously omitted.
function article_body_text($blocks, $intro = null) {
    $parts = [];
    if ($intro !== null && $intro !== '') {
        $parts[] = $intro;
    }
    foreach ($blocks as $b) {
        if (($b['t'] ?? '') === 'ul') {
            foreach ($b['items'] as $it) {
                $parts[] = $it['x'];
            }
        } elseif (isset($b['x']) && $b['x'] !== '') {
            $parts[] = $b['x'];
        }
    }
    return implode("\n\n", $parts);
}

// HowTo for a tab's numbered step sequence. Steps are verbatim from the
// doc; tools are derived ONLY from that page's own step text (Cycle 1
// U-1): a tool is listed only when the equipment phrase appears in the
// page's steps. If a page names no equipment, 'tool' is omitted.
function ld_howto($steps, $canonical = null, $name = 'Our Water Damage Restoration Process, Step by Step') {
    $items = [];
    $stepText = '';
    foreach ($steps as $i => $s) {
        $items[] = [
            '@type' => 'HowToStep',
            'position' => $i + 1,
            'name' => $s['h3'] ?? $s['name'],
            'text' => $s['text'],
        ];
        $stepText .= ' ' . ($s['h3'] ?? $s['name']) . ' ' . $s['text'];
    }
    // [phrase in step text (case-insensitive), tool label]. Order is the
    // order tools first appear in the steps, not this list's order.
    $vocab = [
        ['truck-mounted extraction units', 'Truck-mounted extraction units'],
        ['truck-mounted extractors', 'Truck-mounted extractors'],
        ['portable extractors', 'Portable extractors'],
        ['submersible pumps', 'Submersible pumps'],
        ['moisture meters', 'Moisture meters'],
        ['thermal imaging camera', 'Thermal imaging camera'],
        ['weighted extraction tools', 'Weighted extraction tools'],
        ['commercial dehumidifiers', 'Commercial dehumidifiers'],
        ['dehumidifiers', 'Dehumidifiers'],
        ['air movers', 'Air movers'],
        ['hepa air scrubbers', 'HEPA air scrubbers'],
        ['air scrubbers', 'Air scrubbers'],
        ['respirators', 'Respirators'],
    ];
    $tools = [];
    $seen = [];
    foreach ($vocab as [$phrase, $label]) {
        $pos = mb_stripos($stepText, $phrase);
        if ($pos === false) continue;
        // Skip the generic form when the specific form already matched.
        if ($phrase === 'dehumidifiers' && isset($seen['commercial dehumidifiers'])) continue;
        if ($phrase === 'air scrubbers' && isset($seen['hepa air scrubbers'])) continue;
        $tools[] = ['pos' => $pos, 'tool' => ['@type' => 'HowToTool', 'name' => $label]];
        $seen[$phrase] = true;
    }
    usort($tools, fn($a, $b) => $a['pos'] <=> $b['pos']);
    $out = [
        '@type' => 'HowTo',
        'name' => $name,
        'step' => $items,
    ];
    if (!empty($tools)) {
        $out['tool'] = array_map(fn($t) => $t['tool'], $tools);
    }
    if ($canonical !== null) $out['@id'] = $canonical . '#howto';
    // Cycle 3 U-3: link the HowTo node to its page (the canonical already
    // in the graph). Honest only — nothing else points at #howto.
    if ($canonical !== null) $out['mainEntityOfPage'] = $canonical;
    return $out;
}

// WebPage node: ties the page into the @id graph (isPartOf WebSite,
// about the business on the homepage / the service on service pages).
// $mainEntityId (Cycle 2 U-2): the page's Service/Article @id when one
// exists; Cycle 3 U-1: home/about/contact pass '#business' (the page's
// subject IS the business) instead of null.
// $imageMeta (Cycle 3 U-2): ['alt','width','height'] from
// img_schema_meta() — real on-disk dims; primaryImageOfPage becomes an
// ImageObject with caption = the image's existing alt text.
function ld_webpage($canonical, $title, $aboutId = null, $imageUrl = null, $description = null, $mainEntityId = null, $imageMeta = null) {
    $out = [
        '@type' => 'WebPage',
        '@id' => $canonical,
        'url' => $canonical,
        'name' => $title,
        'isPartOf' => ['@id' => site_url('/') . '#website'],
        // Cycle 1 P3-3: inLanguage on every WebPage.
        'inLanguage' => 'en-US',
        // Cycle 1 P3-4: link to this page's BreadcrumbList node.
        'breadcrumb' => ['@id' => $canonical . '#breadcrumb'],
    ];
    if ($mainEntityId !== null) $out['mainEntity'] = ['@id' => $mainEntityId];
    if ($aboutId !== null) $out['about'] = ['@id' => $aboutId];
    if ($imageUrl !== null) {
        $out['image'] = $imageUrl;
        if ($imageMeta !== null && isset($imageMeta['width'], $imageMeta['height'])) {
            $imgObj = ['@type' => 'ImageObject', 'url' => $imageUrl,
                'width' => (int) $imageMeta['width'], 'height' => (int) $imageMeta['height']];
            if (!empty($imageMeta['alt'])) $imgObj['caption'] = $imageMeta['alt'];
            $out['primaryImageOfPage'] = $imgObj;
        } else {
            $out['primaryImageOfPage'] = $imageUrl;
        }
    }
    // $description is the page's verbatim meta description (doc text).
    if ($description !== null) {
        $out['description'] = $description;
    }
    return $out;
}

// All meaningful photos on a page, as absolute URLs, for the image
// sitemap: homepage hero + every service card + the 8 process photos;
// inner pages carry their hero only. Missing slots (no file) are skipped,
// never emitted as a broken URL.
function page_images($slug) {
    global $SERVICES;
    $out = [];
    $add = function ($img) use (&$out) {
        if ($img) $out[] = site_url($img['src']);
    };
    if ($slug === '/') {
        $add(page_img('/', 'hero'));
        // Only the cards the homepage actually renders (the 15 $SERVICES
        // cards; 'also' routes share their hero file as their card, so
        // adding them here would duplicate their own page's hero entry).
        foreach ($SERVICES as $c) {
            $add(page_img($c['slug'], 'card'));
        }
        for ($i = 1; $i <= 8; $i++) {
            $add(page_img('process-' . $i, 'img'));
        }
    } else {
        $add(page_img($slug, 'hero'));
    }
    return array_values(array_unique($out));
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
