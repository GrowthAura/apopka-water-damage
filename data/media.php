<?php
// Apopka Water Damage Restoration - image map.
// ALL images are fresh for this site: real photographs, re-encoded 16:9
// with metadata stripped. No image from any past site is used here.
// Entries are added by the image worker as slots are filled; page_img()
// returns null for any slot with no entry or no file on disk, so a missing
// image renders a dark navy panel instead of a broken <img>.
// Alt text describes what the photo actually shows, place-free (Stage 2B
// 2026-11-18: no alt asserts a place the photo does not verifiably show;
// 6 slots replaced this round — see qa/FINDINGS-10X-A2Z-STAGE2B-2026-11-18.md);
// no on-site claim that any image is a real job photo.

$IMG = '/assets/img/';

$PAGE_IMG = [
    // VISUAL IMAGE-REUSE AUDIT 2026-11-13 (qa/IMAGE-VISUAL-AUDIT-2026-11-13.md):
    // 10 files confirmed same-photo as live images on other portfolio sites
    // + 4 wrong-place/branded shots - their entries were REMOVED, so those
    // slots rendered the navy empty panel. Removed files stay on disk in
    // assets/img/ (do NOT delete - they are the audit evidence).
    // CYCLE 1 (2026-11-13) FILLED ALL 16 REMOVED SLOTS: 24 created images
    // (qa/FINDINGS-OPT-C1-IMAGES-2026-11-13.md §8.2 - created only because
    // no real photo of that exact place/service exists; never claimed as
    // real job photos) + 2 real Pexels photos (storm card 12243107,
    // appliance card 3829552). Every install file was verified by BOTH nets
    // on fresh disk reads (qa/hashnet-c1-install.json) + viewed full-size
    // before install. The 2 reuse heroes (structural-drying 8101101,
    // about 6195125) were replaced the same way.
    // CYCLE 2 (2026-11-13, Stage 2): 9 weak real photos swapped for created
    // images (burst hero + burst/appliance/slab/storm/mobile-home/mold cards
    // + sewage hero + process-3) - real-photo sourcing exhausted first
    // (Pexels burst-pipe picks all live elsewhere; no fitting real photo
    // found for any of the 9 slots; see qa/FINDINGS-OPT-C2-STAGE2-
    // 2026-11-13.md). Install nets on fresh disk reads: md5 0 hits over
    // 29,526 files; aHash 2 d16<=40 flags, both adjudicated DIFFERENT by
    // viewed pixels + MAD 60.83 / 58.60 (false positives - street scenes
    // vs a concrete-floor detail shot). All 9 viewed full-size before
    // install; EXIF 0, JFIF-only. Alts below describe the new photos.
    // CYCLE 4 STAGE 2 (2026-11-14): 5 created images installed after the
    // Pexels retry was exhausted (no fitting real photo exists for any of
    // the 5 slots; see qa/c4-stage2-images.md §1 - incl. Pexels 21528760,
    // rejected: wrong floor + already live on Tulsa Repair + Chesterfield).
    // About hero (two technicians, faces visible), mobile-home hero
    // (manufactured home + floodwater), process-6 (colour fan on wet
    // concrete), wet-flooring card (boots + squeegee + muddy water),
    // insurance-claim-help card (inspector + clipboard + claim paperwork).
    // Sewage hero retuned 1440x1080 -> 1280x960 (same photo, MAD 0.14).
    // Nets on fresh disk reads BEFORE install: md5 0 hits over 36,985
    // files; aHash 11 process-6 flags d16<=40 all adjudicated DIFFERENT
    // by viewed pixels + MAD64 44.46-88.58; both cards 0 flags d16<=64.
    // All 12 installed files viewed full-size before install (worker) and
    // re-viewed by the coordinator; EXIF 0, JFIF-only. Never claimed as
    // real job photos. Alts below describe the new photos.
    // CYCLE 6 STAGE 2 (2026-11-14): homepage hero REPLACED - the old file
    // (Pexels 27398545) was the SAME photo live on Cape Coral's
    // flood-cleanup page + Houston TX (P1-1/P3-5, qa/FINDINGS-OPT-C6-IMAGES).
    // Pexels retry exhausted honestly (4 candidates viewed full-size:
    // 13865772 live on Lancaster storm hero - confirmed in Lancaster's live
    // data/pages.json; 14216445 dark, puddles only; 28447761 European, no
    // palms; 28447808 B&W European). Replacement is a CREATED image
    // (qa/c6-created/media-generation-c6-hero-created-0-*.jpg) - never
    // claimed as a real job photo; alt carries NO place claim. Nets on
    // fresh disk reads BEFORE install: md5 0 hits over 45,991 files;
    // aHash 0 flags d16<=40 (qa/c6-stage2-nets.json). EXIF 0, JFIF-only.
    // Old files backed up in qa/c6-stage2-backup/. 400w hero variants
    // added for all 25 heroes this cycle (srcset hero [400, 800]).
    // Homepage hero.
    // LUXURY HOME HERO SWAP (2026-11-23, his ruling ~05:04 PKT): the Stage 2B
    // hero (Pexels 13865773, flooded lakeside path, Sanford FL) showed the
    // DISASTER, not the restoration — and its "City of Sanford" sign named
    // the wrong city centre-frame. Replaced with Pexels 29181494 (Sergei
    // Starostin): a restoration worker in a hard hat laying new floor tiles
    // with mortar in a bright room — the rebuild step, the professional at
    // work. Fresh 1920w CDN re-download, 16:9 crop (y=100). Pexels page
    // carries NO location metadata: no place claim, no GPS tag, alt
    // place-free. STANDING RULE: HOME HERO = RESTORATION, NOT FLOOD.
    // Nets CLEAR pre-install (md5 0/101,014 fresh disk reads; aHash 0 flags
    // over 93,029 mains; control exact-copy flagged md5 + aHash 0, MAD 0.0;
    // sibling 29181495 live on Lancaster adjudicated DIFFERENT by viewed
    // pixels, MAD 61.66; see qa/FINDINGS-LUXURY-HERO-SWAP-2026-11-23.md §5).
    // EXIF 0. Old hero-apopka-lux.* files stay on disk as audit evidence
    // (do NOT delete); the flood card keeps 13865773 per coordinator
    // decision (card topic IS flood cleanup).
    '/' => [
        'hero' => ['file' => 'hero-apopka-restoration.jpg', 'alt' => 'Restoration worker in a hard hat laying new floor tiles with mortar in a bright room'],
    ],
    // Service pages: 'card' alt describes the card photo; 'hero' alt describes
    // the hero photo, both place-free. Card and hero are DIFFERENT photos
    // (QA 2026-11-11: same file served both; 14 fresh card photos wired).
    // structural-drying card filled Cycle 1 (2026-11-13) with a created
    // colour drying-equipment image (both nets + viewed); previously no
    // honest colour photo existed in stock.
    '/emergency-water-extraction' => [
        'card' => ['file' => 'card-emergency-water-extraction-apopka.jpg', 'alt' => 'Worker in a white protective suit vacuuming a wet floor with a yellow canister wet/dry vacuum'],
        'hero' => ['file' => 'emergency-water-extraction-apopka.jpg', 'alt' => 'Technician extracting standing water from a tiled floor with a yellow wet/dry vacuum'],
    ],
    '/burst-pipe-water-damage' => [
        'card' => ['file' => 'card-burst-pipe-water-damage-apopka.jpg', 'alt' => 'Cracked copper pipe under a sink spraying water onto a wet floor, with a wrench nearby'],
        'hero' => ['file' => 'burst-pipe-water-damage-apopka.jpg', 'alt' => 'Burst copper pipe spraying water onto a flooded tile floor in a laundry room'],
    ],
    '/ac-leak-water-damage' => [
        'card' => ['file' => 'card-ac-leak-water-damage-apopka.jpg', 'alt' => 'Technician inspecting an open wall-mounted air handler unit with water dripping from the drain pipe'],
        'hero' => ['file' => 'ac-leak-water-damage-apopka.jpg', 'alt' => 'HVAC technician inspecting a leaking indoor air handler unit'],
    ],
    '/slab-leak-water-damage' => [
        'card' => ['file' => 'card-slab-leak-water-damage-apopka.jpg', 'alt' => 'Cracked wet concrete slab floor with a moisture meter and toolbox'],
        'hero' => ['file' => 'slab-leak-water-damage-apopka.jpg', 'alt' => 'Water pooled on a cracked concrete slab floor with plumber tools'],
    ],
    '/water-heater-leak-cleanup' => [
        'card' => ['file' => 'card-water-heater-leak-cleanup-apopka.jpg', 'alt' => 'White tank water heater in a garage with water pooled around its base'],
        'hero' => ['file' => 'water-heater-leak-cleanup-apopka.jpg', 'alt' => 'Plumber inspecting a leaking tank water heater in a garage'],
    ],
    '/appliance-leak-water-damage' => [
        'card' => ['file' => 'card-appliance-leak-water-damage-apopka.jpg', 'alt' => 'Open dishwasher dripping water onto a tile floor'],
        'hero' => ['file' => 'appliance-leak-water-damage-apopka.jpg', 'alt' => 'Water leaking from a front-loading washing machine onto a tile floor'],
    ],
    '/ceiling-water-damage-repair' => [
        'card' => ['file' => 'card-ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Worker on a ladder repairing a water-stained ceiling with a trowel'],
        'hero' => ['file' => 'ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Water-stained and sagging ceiling with repair tools in a living room'],
    ],
    '/storm-roof-leak-water-damage' => [
        'card' => ['file' => 'card-storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Roofer repairing torn shingles on a single-story home'],
        'hero' => ['file' => 'storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Roofers repairing storm-damaged asphalt shingles on a brick house'],
    ],
    '/flood-damage-cleanup' => [
        'card' => ['file' => 'card-flood-damage-cleanup-apopka.jpg', 'alt' => 'Flooded lakeside path with palm trees and caution tape beside a lake'],
        'hero' => ['file' => 'flood-damage-cleanup-apopka.jpg', 'alt' => 'Technician extracting muddy floodwater from a living room floor with sandbags stacked at the open doorway'],
    ],
    '/sewage-backup-cleanup' => [
        'card' => ['file' => 'card-sewage-backup-cleanup-apopka.jpg', 'alt' => 'Two workers in protective suits and respirators extracting dark contaminated water from a flooded bathroom floor with a wet/dry vacuum'],
        'hero' => ['file' => 'sewage-backup-cleanup-apopka.jpg', 'alt' => 'Worker in blue gloves cleaning a toilet after a sewage backup in a bathroom'],
    ],
    '/mold-remediation' => [
        'card' => ['file' => 'card-mold-remediation-apopka.jpg', 'alt' => 'Worker in protective gear scraping black mold streaks off a wall under plastic containment sheeting'],
        'hero' => ['file' => 'mold-remediation-apopka.jpg', 'alt' => 'Worker in protective gear removing black mold from a wall'],
    ],
    // CYCLE 4 (2026-11-14): mold-inspection card files deleted - the card
    // was never served (mold-inspection is an 'also' link, not a homepage
    // card), so the declaration is removed with the files. Hero untouched.
    '/mold-inspection' => [
        'hero' => ['file' => 'mold-inspection-apopka.jpg', 'alt' => 'Inspector with a clipboard and moisture meter at the front door of a home'],
    ],
    '/structural-drying' => [
        'card' => ['file' => 'card-structural-drying-apopka.jpg', 'alt' => 'Two yellow air movers and a dehumidifier drying a wet living room with peeled-back carpet'],
        'hero' => ['file' => 'structural-drying-apopka.jpg', 'alt' => 'Air movers and a dehumidifier drying a wet living room'],
    ],
    // CYCLE 5 STAGE 2 (2026-11-14): the wet-flooring card files were
    // DELETED - declared but never served (wet-flooring is an 'also'
    // link under the doc homepage tab's combined H3 "Structural Drying
    // and Wet Flooring", which has ONE shared body paragraph already
    // serving the structural-drying card; no standalone homepage-tab
    // H3/body exists for a separate card, so wiring one would duplicate
    // the shared paragraph or import inner-tab copy. Same mechanism +
    // same resolution as the C4 mold-inspection orphan deletion. The
    // service stays linked from the homepage via the parent card's
    // closing sentence. Hero untouched.
    '/wet-flooring-water-damage' => [
        'hero' => ['file' => 'wet-flooring-water-damage-apopka.jpg', 'alt' => 'Worker in rubber boots brushing muddy water off a concrete floor'],
    ],
    '/mobile-home-water-damage' => [
        'card' => ['file' => 'card-mobile-home-water-damage-apopka.jpg', 'alt' => 'Technician in a high-visibility vest inspecting the skirting of a manufactured home with puddles around it'],
        'hero' => ['file' => 'mobile-home-water-damage-apopka.jpg', 'alt' => 'Manufactured home with floodwater pooled around its foundation in a sunny mobile home park'],
    ],
    '/commercial-water-damage' => [
        'card' => ['file' => 'card-commercial-water-damage-apopka.jpg', 'alt' => 'Janitorial crew with a wet/dry vacuum, floor buffer, and mop cleaning a large dining space'],
        'hero' => ['file' => 'commercial-water-damage-apopka.jpg', 'alt' => 'Professional cleaning crew at work in a commercial dining space'],
    ],
    '/leak-detection' => [
        'card' => ['file' => 'card-leak-detection-apopka.jpg', 'alt' => 'Close-up of water meters and pressure gauges on blue and red pipes'],
        'hero' => ['file' => 'leak-detection-apopka.jpg', 'alt' => 'Technician aiming a thermal imaging camera at a damp wall'],
    ],
    // CYCLE 5 STAGE 2 (2026-11-14): the insurance-claim-help card
    // files were DELETED - declared but never served (insurance-claim
    // help is an 'also' link under the doc homepage tab's combined H3
    // "Leak Detection and Insurance Claim Help", one shared body
    // paragraph already serving the leak-detection card; no standalone
    // homepage-tab H3/body exists for a separate card). Same mechanism
    // + same resolution as the C4 mold-inspection orphan deletion. The
    // service stays linked from the homepage via the parent card's
    // closing sentence. Hero untouched.
    '/water-damage-insurance-claim-help' => [
        'hero' => ['file' => 'water-damage-insurance-claim-help-apopka.jpg', 'alt' => 'Insurance adjuster in a hard hat photographing a water-stained ceiling with a smartphone while holding a clipboard and claim folder'],
    ],
    // New routes (tabs 20..25, full-content rebuild 2026-11-12). Hero only;
    // no homepage card. page_img() returns null until the file lands in
    // assets/img/, so a missing photo is a navy hero, never a broken image.
    '/about' => [
        'hero' => ['file' => 'about-apopka.jpg', 'alt' => 'Two restoration technicians at work in a bright living room, one pressing a moisture meter against a wall and the other positioning a yellow air mover on a wet floor'],
    ],
    '/contact' => [
        'hero' => ['file' => 'contact-apopka.jpg', 'alt' => 'Homeowner calling for emergency help on the phone at home'],
    ],
    // LUXURY STAGE 2B (2026-11-23): real photo - Pexels 5463575, technician
    // with manifold gauges at a rooftop outdoor AC condenser. Fresh 1600w
    // download, 16:9 crop (y=100). Nets CLEAR pre-install (md5 0/100,370;
    // aHash 0 flags; Pexels-ID net zero hits anywhere). EXIF 0. The tech's
    // shirt carries legible Spanish text; location unstated on the Pexels
    // page; alt stays place-free. Installed on the BLOG hero (outdoor
    // condenser work matches the drain-line topic), not the AC service hero
    // (indoor leak). Old created file stays on disk as audit evidence.
    '/resources/apopka-ac-drain-line-tips' => [
        'hero' => ['file' => 'blog-ac-drain-line-apopka-lux.jpg', 'alt' => 'Technician checking an outdoor air conditioning unit with manifold gauges on a rooftop'],
    ],
    '/resources/who-pays-for-water-damage-florida' => [
        'hero' => ['file' => 'blog-who-pays-apopka.jpg', 'alt' => 'Homeowner reviewing insurance paperwork at a wooden table in a bright home, with palm trees and neighbouring houses visible through the window'],
    ],
    // Hurricane hero REMOVED 2026-11-23 (Luxury Stage 2B): the old file
    // (Pexels 12661315) was shot in Tenerife, Canary Islands - wrong place,
    // and must not stay. No real Florida storm photo passed the full gate:
    // Pexels 13865771 was rejected on viewed pixels - same Sanford lakefront
    // as the new home hero (same sign, fallen palm, caution tape), a
    // duplicate motif, not a fresh photo; its staged files are kept in
    // qa/luxury-stage2b-2026-11-23/candidates/rejected/ for a coordinator
    // overrule. Slot stays honestly empty (navy panel - the codebase's own
    // mechanism, same as the 2026-11-13 visual-audit removals) until a real
    // Apopka storm frame is extracted from YouTube (see
    // qa/FINDINGS-LUXURY-STAGE2B-2026-11-23.md §2). Sitemap image:loc is
    // 47, not 48, while this slot is empty - honest consequence, not a
    // regression. Old file stays on disk as audit evidence (do NOT delete).
    '/resources/apopka-hurricane-water-damage-checklist' => [
    ],
    // '/resources/how-fast-mold-grows-florida' hero was REMOVED 2026-11-13 (visual audit: same photo live on Lancaster/Midvale/Texas/Broken Arrow) - filled Cycle 1 (2026-11-13) with a created image, verified by both nets + viewed.
    '/resources/how-fast-mold-grows-florida' => [
        'hero' => ['file' => 'blog-mold-timeline-apopka.jpg', 'alt' => 'Black mold streaks spreading across a damp interior wall'],
    ],
    // Process steps (homepage phase grid).
    'process-1' => [
        'img' => ['file' => 'process-1-emergency-call-apopka.jpg', 'alt' => 'Woman making an emergency phone call from home'],
    ],
    'process-2' => [
        'img' => ['file' => 'process-2-stop-source-apopka.jpg', 'alt' => 'Blue water shutoff valve with an orange, rusty wheel handle'],
    ],
    'process-3' => [
        'img' => ['file' => 'process-3-inspection-apopka.jpg', 'alt' => 'Technician holding a tablet showing a thermal image during a moisture inspection'],
    ],
    // 'process-4' img was REMOVED 2026-11-13 (visual audit: same photo live on Lancaster) - filled Cycle 1 (2026-11-13) with a created image, verified by both nets + viewed.
    'process-4' => [
        'img' => ['file' => 'process-4-extraction-apopka.jpg', 'alt' => 'Technician extracting standing water with a wet/dry vacuum on a tiled floor'],
    ],
    'process-5' => [
        'img' => ['file' => 'process-5-demolition-apopka.jpg', 'alt' => 'Worker removing water-damaged drywall during controlled demolition'],
    ],
    'process-6' => [
        'img' => ['file' => 'process-6-drying-apopka.jpg', 'alt' => 'Large floor fan on a concrete floor during structural drying'],
    ],
    'process-7' => [
        'img' => ['file' => 'process-7-cleaning-apopka.jpg', 'alt' => 'Worker in protective gear spraying disinfectant mist onto a damp wall after water damage'],
    ],
    'process-8' => [
        'img' => ['file' => 'process-8-repairs-apopka.jpg', 'alt' => 'Worker installing drywall on a ceiling during repairs'],
    ],
];

function page_img($slug, $kind) {
    global $PAGE_IMG, $IMG;
    $entry = $PAGE_IMG[$slug][$kind] ?? null;
    if (!$entry) return null;
    $disk = __DIR__ . '/../assets/img/' . $entry['file'];
    if (!is_file($disk)) return null;
    return ['src' => $IMG . $entry['file'], 'alt' => $entry['alt'], 'file' => $entry['file']];
}

function img_tag($img, $w, $h, $loading = 'lazy', $kind = null) {
    return picture_tag($img, $w, $h, $loading, $kind);
}

// DESIGN+SPEED 2026-11-17 (WebP): <picture> with a WebP <source> and the
// original JPEG <img> as fallback. The WebP re-encodes (same stems,
// same dimensions, q75) sit next to the JPEGs; browsers that understand
// WebP fetch the <source> srcset, everything else gets the JPEG srcset
// untouched. $extra is appended verbatim to the <img> (e.g. fetchpriority).
// When no WebP variant exists on disk the plain <img> is emitted, so a
// missing re-encode can never break an image.
function picture_tag($img, $w = null, $h = null, $loading = 'lazy', $kind = null, $extra = '') {
    if (!$img) return '';
    if ($w === null || $h === null) {
        $d = @getimagesize(__DIR__ . '/../assets/img/' . $img['file']);
        if ($d === false) return '';
        $w = (int) $d[0];
        $h = (int) $d[1];
    }
    $imgTag = '<img src="' . esc($img['src']) . '" alt="' . esc($img['alt']) . '" width="' . (int) $w .
        '" height="' . (int) $h . '"';
    if ($kind !== null) $imgTag .= srcset_attr($img, $kind);
    if ($loading !== '' && $loading !== null) $imgTag .= ' loading="' . $loading . '"';
    $imgTag .= $extra . '>';
    if ($kind === null) return $imgTag;
    $webp = srcset_attr($img, $kind, 'webp');
    if ($webp === '') return $imgTag;
    return '<picture><source type="image/webp"' . $webp . '>' . $imgTag . '</picture>';
}

// Served-image URL for the image sitemap: the WebP re-encode when it
// exists on disk (that is what <picture> serves to browsers), else the
// JPEG. og:image / schema ImageObject keep the JPEG (universal).
function webp_src($img) {
    $webp = substr($img['src'], 0, -4) . '.webp';
    if (is_file(__DIR__ . '/../assets/img/' . basename($webp))) return $webp;
    return $img['src'];
}

// STAGE 3 (2026-11-17, mobile SI): <link rel="preload" as="image"> for the
// hero, carrying the EXACT WebP srcset + sizes the <picture> <source> uses
// (srcset_attr, same helper), so the browser issues the hero request from
// <head> in parallel with CSS + fonts instead of discovering it after
// parsing the ~14KB <head> + header markup. Identical srcset/sizes means
// the preload picks the same variant the <picture> would - no double
// download. Returns '' when no WebP hero variant exists on disk.
function hero_preload_link($img) {
    if (!$img) return '';
    $webp = srcset_attr($img, 'hero', 'webp');
    if ($webp === '') return '';
    $attrs = str_replace(' srcset="', ' imagesrcset="', $webp);
    $attrs = str_replace(' sizes="', ' imagesizes="', $attrs);
    return '<link rel="preload" as="image"' . $attrs . ' fetchpriority="high">';
}

// Responsive variants (Cycle 1, SEO P2-3): variant files are
// "<stem>-<width>w.jpg" next to the main file. Returns the srcset +
// sizes attributes, or '' when no variant exists on disk. The main
// file's own width comes from getimagesize so it is always true.
// $ext picks the variant format: 'jpg' (fallback <img>) or 'webp'
// (the <picture> <source>). Same widths, same sizes either way.
function srcset_attr($img, $kind, $ext = 'jpg') {
    global $IMG;
    $sizes = [
        // STAGE 2B (2026-11-18, P3-8): 1920w variant for >=1600px viewports.
        // srcset_attr only lists a variant when the file exists on disk, so
        // only heroes with a TRUE 1920w source get a 1920w entry. The other
        // 1280w-master heroes have no true 1920 source: a Lanczos upscale
        // was tested (storm 1920w q70 WebP 250,516 B vs 1280w 165,668 B,
        // +52% bytes, zero new detail) and rejected on measured evidence.
        'hero' => '(max-width: 640px) 390px, (max-width: 1600px) 1280px, 1920px',
        'card' => '(max-width: 640px) 348px, 387px',
        'process' => '(max-width: 640px) 348px, 598px',
    ][$kind] ?? null;
    $variantWidths = ['hero' => [400, 800, 1920], 'card' => [400], 'process' => [400, 600]][$kind] ?? null;
    if ($sizes === null || $variantWidths === null) return '';
    $dir = __DIR__ . '/../assets/img/';
    $main = @getimagesize($dir . $img['file']);
    if ($main === false) return '';
    $stem = substr($img['file'], 0, -4);
    $parts = [];
    foreach ($variantWidths as $vw) {
        $vf = $stem . '-' . $vw . 'w.' . $ext;
        if (is_file($dir . $vf)) $parts[] = $IMG . $vf . ' ' . $vw . 'w';
    }
    if (!$parts) return '';
    $mainFile = ($ext === 'webp') ? $stem . '.webp' : $img['file'];
    if (!is_file($dir . $mainFile)) return '';
    $parts[] = $IMG . $mainFile . ' ' . $main[0] . 'w';
    return ' srcset="' . esc(implode(', ', $parts)) . '" sizes="' . esc($sizes) . '"';
}

// True intrinsic dimensions of a media entry, for width/height attrs.
function img_dims_attr($img) {
    $d = @getimagesize(__DIR__ . '/../assets/img/' . $img['file']);
    if ($d === false) return '';
    return ' width="' . (int) $d[0] . '" height="' . (int) $d[1] . '"';
}

// Real intrinsic dimensions + alt of a media entry, for the schema
// ImageObject (Cycle 3 U-2). Dimensions come from getimagesize on disk -
// never assumed. Returns null when the file is missing.
function img_schema_meta($img) {
    if (!$img) return null;
    $d = @getimagesize(__DIR__ . '/../assets/img/' . $img['file']);
    if ($d === false) return null;
    return ['alt' => $img['alt'], 'width' => (int) $d[0], 'height' => (int) $d[1]];
}
