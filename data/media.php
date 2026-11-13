<?php
// Apopka Water Damage Restoration — image map.
// ALL images are fresh for this site: real photographs, re-encoded 16:9
// with metadata stripped. No image from any past site is used here.
// Entries are added by the image worker as slots are filled; page_img()
// returns null for any slot with no entry or no file on disk, so a missing
// image renders a dark navy panel instead of a broken <img>.
// Alt text is place + topic (accessibility metadata describing the image);
// no on-site claim that any image is a real job photo.

$IMG = '/assets/img/';

$PAGE_IMG = [
    // VISUAL IMAGE-REUSE AUDIT 2026-11-13 (qa/IMAGE-VISUAL-AUDIT-2026-11-13.md):
    // 10 files confirmed same-photo as live images on other portfolio sites
    // + 4 wrong-place/branded shots — their entries were REMOVED, so those
    // slots rendered the navy empty panel. Removed files stay on disk in
    // assets/img/ (do NOT delete — they are the audit evidence).
    // CYCLE 1 (2026-11-13) FILLED ALL 16 REMOVED SLOTS: 24 created images
    // (qa/FINDINGS-OPT-C1-IMAGES-2026-11-13.md §8.2 — created only because
    // no real photo of that exact place/service exists; never claimed as
    // real job photos) + 2 real Pexels photos (storm card 12243107,
    // appliance card 3829552). Every install file was verified by BOTH nets
    // on fresh disk reads (qa/hashnet-c1-install.json) + viewed full-size
    // before install. The 2 reuse heroes (structural-drying 8101101,
    // about 6195125) were replaced the same way.
    // Homepage hero.
    '/' => [
        'hero' => ['file' => 'hero-apopka.jpg', 'alt' => 'Floodwater on a palm-lined street in Apopka, FL after heavy rain'],
    ],
    // Service pages: 'card' alt is the page short title; 'hero' alt is a
    // descriptive sentence with place. Card and hero are DIFFERENT photos
    // (QA 2026-11-11: same file served both; 14 fresh card photos wired).
    // structural-drying card filled Cycle 1 (2026-11-13) with a created
    // colour drying-equipment image (both nets + viewed); previously no
    // honest colour photo existed in stock.
    '/emergency-water-extraction' => [
        'card' => ['file' => 'card-emergency-water-extraction-apopka.jpg', 'alt' => 'Emergency Water Extraction in Apopka'],
        'hero' => ['file' => 'emergency-water-extraction-apopka.jpg', 'alt' => 'Technician extracting standing water from a tiled floor with a wet/dry vacuum in Apopka, FL'],
    ],
    '/burst-pipe-water-damage' => [
        'card' => ['file' => 'card-burst-pipe-water-damage-apopka.jpg', 'alt' => 'Burst Pipe Water Damage Cleanup in Apopka'],
        'hero' => ['file' => 'burst-pipe-water-damage-apopka.jpg', 'alt' => 'Large red shutoff valve wheel for stopping water after a burst pipe in Apopka, FL'],
    ],
    '/ac-leak-water-damage' => [
        'card' => ['file' => 'card-ac-leak-water-damage-apopka.jpg', 'alt' => 'AC Leak Water Damage in Apopka'],
        'hero' => ['file' => 'ac-leak-water-damage-apopka.jpg', 'alt' => 'HVAC technician inspecting a leaking indoor air handler unit in Apopka, FL'],
    ],
    '/slab-leak-water-damage' => [
        'card' => ['file' => 'card-slab-leak-water-damage-apopka.jpg', 'alt' => 'Slab Leak Water Damage in Apopka'],
        'hero' => ['file' => 'slab-leak-water-damage-apopka.jpg', 'alt' => 'Water pooled on a cracked concrete slab floor with plumber tools in a home in Apopka, FL'],
    ],
    '/water-heater-leak-cleanup' => [
        'card' => ['file' => 'card-water-heater-leak-cleanup-apopka.jpg', 'alt' => 'Water Heater Leak Cleanup in Apopka'],
        'hero' => ['file' => 'water-heater-leak-cleanup-apopka.jpg', 'alt' => 'Plumber inspecting a leaking tank water heater in a garage in Apopka, FL'],
    ],
    '/appliance-leak-water-damage' => [
        'card' => ['file' => 'card-appliance-leak-water-damage-apopka.jpg', 'alt' => 'Appliance Leak Water Damage in Apopka'],
        'hero' => ['file' => 'appliance-leak-water-damage-apopka.jpg', 'alt' => 'Hands loading dishes into an open dishwasher in a home kitchen in Apopka, FL'],
    ],
    '/ceiling-water-damage-repair' => [
        'card' => ['file' => 'card-ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Ceiling Water Damage Repair in Apopka'],
        'hero' => ['file' => 'ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Water-stained and sagging ceiling with repair tools in a living room in Apopka, FL'],
    ],
    '/storm-roof-leak-water-damage' => [
        'card' => ['file' => 'card-storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Storm Roof Leak Water Damage in Apopka'],
        'hero' => ['file' => 'storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Roofers repairing storm-damaged asphalt shingles on a brick house in Apopka, FL'],
    ],
    '/flood-damage-cleanup' => [
        'card' => ['file' => 'card-flood-damage-cleanup-apopka.jpg', 'alt' => 'Flood Damage Cleanup in Apopka'],
        'hero' => ['file' => 'flood-damage-cleanup-apopka.jpg', 'alt' => 'Floodwater covering a palm-lined residential street in Apopka, FL'],
    ],
    '/sewage-backup-cleanup' => [
        'card' => ['file' => 'card-sewage-backup-cleanup-apopka.jpg', 'alt' => 'Septic and Sewage Backup Cleanup in Apopka'],
        'hero' => ['file' => 'sewage-backup-cleanup-apopka.jpg', 'alt' => 'Gloved hands sanitizing a toilet bowl with a brush and detergent in a home in Apopka, FL'],
    ],
    '/mold-remediation' => [
        'card' => ['file' => 'card-mold-remediation-apopka.jpg', 'alt' => 'Mold Remediation in Apopka'],
        'hero' => ['file' => 'mold-remediation-apopka.jpg', 'alt' => 'Worker in protective gear removing black mold from a wall in a home in Apopka, FL'],
    ],
    '/mold-inspection' => [
        'card' => ['file' => 'card-mold-inspection-apopka.jpg', 'alt' => 'Mold Inspection in Apopka'],
        'hero' => ['file' => 'mold-inspection-apopka.jpg', 'alt' => 'Inspector with a clipboard and moisture meter at the front door of a home in Apopka, FL'],
    ],
    '/structural-drying' => [
        'card' => ['file' => 'card-structural-drying-apopka.jpg', 'alt' => 'Structural Drying in Apopka'],
        'hero' => ['file' => 'structural-drying-apopka.jpg', 'alt' => 'Air movers and a dehumidifier drying a wet living room in Apopka, FL'],
    ],
    '/wet-flooring-water-damage' => [
        'card' => ['file' => 'wet-flooring-water-damage-apopka.jpg', 'alt' => 'Flooded Carpet and Wet Floor Cleanup in Apopka'],
        'hero' => ['file' => 'wet-flooring-water-damage-apopka.jpg', 'alt' => 'Worker in rubber boots brushing muddy water off a concrete floor in Apopka, FL'],
    ],
    '/mobile-home-water-damage' => [
        'card' => ['file' => 'card-mobile-home-water-damage-apopka.jpg', 'alt' => 'Mobile Home Water Damage in Apopka'],
        'hero' => ['file' => 'mobile-home-water-damage-apopka.jpg', 'alt' => 'Manufactured home in a sunny Florida mobile home park in Apopka, FL'],
    ],
    '/commercial-water-damage' => [
        'card' => ['file' => 'card-commercial-water-damage-apopka.jpg', 'alt' => 'Commercial Water Damage in Apopka'],
        'hero' => ['file' => 'commercial-water-damage-apopka.jpg', 'alt' => 'Professional cleaning crew at work in a commercial dining space in Apopka, FL'],
    ],
    '/leak-detection' => [
        'card' => ['file' => 'card-leak-detection-apopka.jpg', 'alt' => 'Leak Detection in Apopka'],
        'hero' => ['file' => 'leak-detection-apopka.jpg', 'alt' => 'Technician aiming a thermal imaging camera at a damp wall in a home in Apopka, FL'],
    ],
    '/water-damage-insurance-claim-help' => [
        'card' => ['file' => 'water-damage-insurance-claim-help-apopka.jpg', 'alt' => 'Water Damage Insurance Claim Help in Apopka'],
        'hero' => ['file' => 'water-damage-insurance-claim-help-apopka.jpg', 'alt' => 'Inspector in a hard hat holding a clipboard while documenting a home inspection in Apopka, FL'],
    ],
    // New routes (tabs 20..25, full-content rebuild 2026-11-12). Hero only;
    // no homepage card. page_img() returns null until the file lands in
    // assets/img/, so a missing photo is a navy hero, never a broken image.
    '/about' => [
        'hero' => ['file' => 'about-apopka.jpg', 'alt' => 'Water damage restoration crew with cleaning equipment in a home in Apopka, FL'],
    ],
    '/contact' => [
        'hero' => ['file' => 'contact-apopka.jpg', 'alt' => 'Homeowner calling for emergency help on the phone at home in Apopka, FL'],
    ],
    '/resources/apopka-ac-drain-line-tips' => [
        'hero' => ['file' => 'blog-ac-drain-line-apopka.jpg', 'alt' => 'HVAC technician clearing a condensate drain line at an outdoor air conditioning unit in Apopka, FL'],
    ],
    '/resources/who-pays-for-water-damage-florida' => [
        'hero' => ['file' => 'blog-who-pays-apopka.jpg', 'alt' => 'Homeowner reviewing insurance paperwork at a wooden desk in Apopka, FL'],
    ],
    // Hurricane alt carries NO place claim: the photo was shot in Tenerife
    // (Canary Islands), not Florida — palms + storm seascape only.
    '/resources/apopka-hurricane-water-damage-checklist' => [
        'hero' => ['file' => 'blog-hurricane-checklist-apopka.jpg', 'alt' => 'Palm trees bending in strong hurricane winds over a stormy ocean'],
    ],
    // '/resources/how-fast-mold-grows-florida' hero was REMOVED 2026-11-13 (visual audit: same photo live on Lancaster/Midvale/Texas/Broken Arrow) — filled Cycle 1 (2026-11-13) with a created image, verified by both nets + viewed.
    '/resources/how-fast-mold-grows-florida' => [
        'hero' => ['file' => 'blog-mold-timeline-apopka.jpg', 'alt' => 'Black mold streaks spreading across a damp interior wall in a home in Apopka, FL'],
    ],
    // Process steps (homepage phase grid).
    'process-1' => [
        'img' => ['file' => 'process-1-emergency-call-apopka.jpg', 'alt' => 'Woman making an emergency phone call from home in Apopka, FL'],
    ],
    'process-2' => [
        'img' => ['file' => 'process-2-stop-source-apopka.jpg', 'alt' => 'Blue water shutoff valve with a red wheel handle in Apopka, FL'],
    ],
    'process-3' => [
        'img' => ['file' => 'process-3-inspection-apopka.jpg', 'alt' => 'Technician holding a tablet showing a thermal image during a moisture inspection in Apopka, FL'],
    ],
    // 'process-4' img was REMOVED 2026-11-13 (visual audit: same photo live on Lancaster) — filled Cycle 1 (2026-11-13) with a created image, verified by both nets + viewed.
    'process-4' => [
        'img' => ['file' => 'process-4-extraction-apopka.jpg', 'alt' => 'Technician extracting standing water with a wet/dry vacuum on a tiled floor in Apopka, FL'],
    ],
    'process-5' => [
        'img' => ['file' => 'process-5-demolition-apopka.jpg', 'alt' => 'Worker removing water-damaged drywall during controlled demolition in Apopka, FL'],
    ],
    'process-6' => [
        'img' => ['file' => 'process-6-drying-apopka.jpg', 'alt' => 'Large floor fan on a concrete floor during structural drying in Apopka, FL'],
    ],
    'process-7' => [
        'img' => ['file' => 'process-7-cleaning-apopka.jpg', 'alt' => 'Gloved hand wiping a white tile wall with a blue cloth during cleaning in Apopka, FL'],
    ],
    'process-8' => [
        'img' => ['file' => 'process-8-repairs-apopka.jpg', 'alt' => 'Worker installing drywall on a ceiling during repairs in a home in Apopka, FL'],
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
    if (!$img) return '';
    $out = '<img src="' . esc($img['src']) . '" alt="' . esc($img['alt']) . '" width="' . (int) $w .
        '" height="' . (int) $h . '"';
    if ($kind !== null) $out .= srcset_attr($img, $kind);
    return $out . ' loading="' . $loading . '">';
}

// Responsive variants (Cycle 1, SEO P2-3): variant files are
// "<stem>-<width>w.jpg" next to the main file. Returns the srcset +
// sizes attributes, or '' when no variant exists on disk. The main
// file's own width comes from getimagesize so it is always true.
function srcset_attr($img, $kind) {
    global $IMG;
    $sizes = [
        'hero' => '(max-width: 640px) 390px, 1280px',
        'card' => '(max-width: 640px) 348px, 387px',
        'process' => '(max-width: 640px) 348px, 598px',
    ][$kind] ?? null;
    $variantWidths = ['hero' => [800], 'card' => [400], 'process' => [600]][$kind] ?? null;
    if ($sizes === null || $variantWidths === null) return '';
    $dir = __DIR__ . '/../assets/img/';
    $main = @getimagesize($dir . $img['file']);
    if ($main === false) return '';
    $stem = substr($img['file'], 0, -4);
    $parts = [];
    foreach ($variantWidths as $vw) {
        $vf = $stem . '-' . $vw . 'w.jpg';
        if (is_file($dir . $vf)) $parts[] = $IMG . $vf . ' ' . $vw . 'w';
    }
    if (!$parts) return '';
    $parts[] = $IMG . $img['file'] . ' ' . $main[0] . 'w';
    return ' srcset="' . esc(implode(', ', $parts)) . '" sizes="' . esc($sizes) . '"';
}

// True intrinsic dimensions of a media entry, for width/height attrs.
function img_dims_attr($img) {
    $d = @getimagesize(__DIR__ . '/../assets/img/' . $img['file']);
    if ($d === false) return '';
    return ' width="' . (int) $d[0] . '" height="' . (int) $d[1] . '"';
}
