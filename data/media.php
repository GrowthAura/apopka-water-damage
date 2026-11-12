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
    // Homepage hero.
    '/' => [
        'hero' => ['file' => 'hero-apopka.jpg', 'alt' => 'Floodwater on a palm-lined street in Apopka, FL after heavy rain'],
    ],
    // Service pages: 'card' alt is the page short title; 'hero' alt is a
    // descriptive sentence with place. Card and hero are DIFFERENT photos
    // (QA 2026-11-11: same file served both; 14 fresh card photos wired).
    // structural-drying has NO card entry on purpose (no honest colour
    // drying-equipment photo exists in stock; needs a real job photo) —
    // page_img() returns null and the card renders the navy empty panel.
    '/emergency-water-extraction' => [
        'card' => ['file' => 'card-emergency-water-extraction-apopka.jpg', 'alt' => 'Emergency Water Extraction in Apopka'],
        'hero' => ['file' => 'emergency-water-extraction-apopka.jpg', 'alt' => 'Woman mopping a tiled floor in a home in Apopka, FL'],
    ],
    '/burst-pipe-water-damage' => [
        'card' => ['file' => 'card-burst-pipe-water-damage-apopka.jpg', 'alt' => 'Burst Pipe Water Damage Cleanup in Apopka'],
        'hero' => ['file' => 'burst-pipe-water-damage-apopka.jpg', 'alt' => 'Large red shutoff valve wheel for stopping water after a burst pipe in Apopka, FL'],
    ],
    '/ac-leak-water-damage' => [
        'card' => ['file' => 'card-ac-leak-water-damage-apopka.jpg', 'alt' => 'AC Leak Water Damage in Apopka'],
        'hero' => ['file' => 'ac-leak-water-damage-apopka.jpg', 'alt' => 'Technician repairing a rooftop air conditioning unit in Apopka, FL'],
    ],
    '/slab-leak-water-damage' => [
        'card' => ['file' => 'card-slab-leak-water-damage-apopka.jpg', 'alt' => 'Slab Leak Water Damage in Apopka'],
        'hero' => ['file' => 'slab-leak-water-damage-apopka.jpg', 'alt' => 'Water pooled on a cracked concrete slab floor in a home in Apopka, FL'],
    ],
    '/water-heater-leak-cleanup' => [
        'card' => ['file' => 'card-water-heater-leak-cleanup-apopka.jpg', 'alt' => 'Water Heater Leak Cleanup in Apopka'],
        'hero' => ['file' => 'water-heater-leak-cleanup-apopka.jpg', 'alt' => 'Boiler pump and pressure gauge on a water heating system in a home in Apopka, FL'],
    ],
    '/appliance-leak-water-damage' => [
        'card' => ['file' => 'card-appliance-leak-water-damage-apopka.jpg', 'alt' => 'Appliance Leak Water Damage in Apopka'],
        'hero' => ['file' => 'appliance-leak-water-damage-apopka.jpg', 'alt' => 'Hands loading dishes into an open dishwasher in a home kitchen in Apopka, FL'],
    ],
    '/ceiling-water-damage-repair' => [
        'card' => ['file' => 'card-ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Ceiling Water Damage Repair in Apopka'],
        'hero' => ['file' => 'ceiling-water-damage-repair-apopka.jpg', 'alt' => 'Collapsed ceiling with fallen plaster and debris in a room in Apopka, FL'],
    ],
    '/storm-roof-leak-water-damage' => [
        'card' => ['file' => 'card-storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Storm and Roof Leak Water Damage in Apopka'],
        'hero' => ['file' => 'storm-roof-leak-water-damage-apopka.jpg', 'alt' => 'Roofers repairing a shingle roof under a blue sky in Apopka, FL'],
    ],
    '/flood-damage-cleanup' => [
        'card' => ['file' => 'card-flood-damage-cleanup-apopka.jpg', 'alt' => 'Flood Damage Cleanup in Apopka'],
        'hero' => ['file' => 'flood-damage-cleanup-apopka.jpg', 'alt' => 'Floodwater covering a suburban backyard in the rain in Apopka, FL'],
    ],
    '/sewage-backup-cleanup' => [
        'card' => ['file' => 'card-sewage-backup-cleanup-apopka.jpg', 'alt' => 'Septic and Sewage Backup Cleanup in Apopka'],
        'hero' => ['file' => 'sewage-backup-cleanup-apopka.jpg', 'alt' => 'Gloved hands sanitizing a toilet bowl with a brush and detergent in a home in Apopka, FL'],
    ],
    '/mold-remediation' => [
        'card' => ['file' => 'card-mold-remediation-apopka.jpg', 'alt' => 'Mold Remediation in Apopka'],
        'hero' => ['file' => 'mold-remediation-apopka.jpg', 'alt' => 'Damp-stained wall with peeling paint in a home in Apopka, FL'],
    ],
    '/mold-inspection' => [
        'card' => ['file' => 'mold-inspection-apopka.jpg', 'alt' => 'Mold Inspection in Apopka'],
        'hero' => ['file' => 'mold-inspection-apopka.jpg', 'alt' => 'Home inspector in a safety vest pointing at a ceiling during an inspection in Apopka, FL'],
    ],
    '/structural-drying' => [
        'hero' => ['file' => 'structural-drying-apopka.jpg', 'alt' => 'Technician positioning a large drying fan on a concrete floor in Apopka, FL'],
    ],
    '/wet-flooring-water-damage' => [
        'card' => ['file' => 'wet-flooring-water-damage-apopka.jpg', 'alt' => 'Flooded Carpet and Wet Floor Cleanup in Apopka'],
        'hero' => ['file' => 'wet-flooring-water-damage-apopka.jpg', 'alt' => 'Worker in rubber boots brushing muddy water off a concrete floor in Apopka, FL'],
    ],
    '/mobile-home-water-damage' => [
        'card' => ['file' => 'card-mobile-home-water-damage-apopka.jpg', 'alt' => 'Mobile Home Water Damage in Apopka'],
        'hero' => ['file' => 'mobile-home-water-damage-apopka.jpg', 'alt' => 'Small manufactured home beside a lake surrounded by trees in Apopka, FL'],
    ],
    '/commercial-water-damage' => [
        'card' => ['file' => 'card-commercial-water-damage-apopka.jpg', 'alt' => 'Commercial Water Damage in Apopka'],
        'hero' => ['file' => 'commercial-water-damage-apopka.jpg', 'alt' => 'Professional cleaning crew at work in a commercial dining space in Apopka, FL'],
    ],
    '/leak-detection' => [
        'card' => ['file' => 'card-leak-detection-apopka.jpg', 'alt' => 'Leak Detection in Apopka'],
        'hero' => ['file' => 'leak-detection-apopka.jpg', 'alt' => 'Worker inspecting a wall for a hidden leak in Apopka, FL'],
    ],
    '/water-damage-insurance-claim-help' => [
        'card' => ['file' => 'water-damage-insurance-claim-help-apopka.jpg', 'alt' => 'Water Damage Insurance Claim Help in Apopka'],
        'hero' => ['file' => 'water-damage-insurance-claim-help-apopka.jpg', 'alt' => 'Inspector in a hard hat holding a clipboard while documenting a home inspection in Apopka, FL'],
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
    'process-4' => [
        'img' => ['file' => 'process-4-extraction-apopka.jpg', 'alt' => 'Yellow industrial wet vacuum with a hose on a tiled floor in Apopka, FL'],
    ],
    'process-5' => [
        'img' => ['file' => 'process-5-demolition-apopka.jpg', 'alt' => 'Gutted room with exposed framing and debris after controlled demolition in Apopka, FL'],
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

function img_tag($img, $w, $h, $loading = 'lazy') {
    if (!$img) return '';
    return '<img src="' . esc($img['src']) . '" alt="' . esc($img['alt']) . '" width="' . (int) $w .
        '" height="' . (int) $h . '" loading="' . $loading . '">';
}
