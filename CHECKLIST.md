# Apopka FL Water Damage Restoration — CHECKLIST

Build: plain PHP 8, Pleasant Grove / San Bruno pattern. Local only.

## Content (verbatim from Google Doc 1LfF_CNNyium0TldmxA3no6Wv_nFZFyPm8bok5MAlKGY)
- [ ] Homepage: eyebrow, H1 x1, intro, trust badges x4, all H2 x13, H3 x31, FAQ 8, final CTA
- [ ] Service cards x15 with verbatim body + "Read more" link sentences (paths in parentheses only)
- [ ] Process steps x8 (H3 Step 1-8) verbatim
- [ ] Categories x3 (Cat 1/2/3) + close para verbatim
- [ ] Cost section: intro + 5 factor bullets + close para verbatim
- [ ] Insurance section: 2 paras + link to /water-damage-insurance-claim-help verbatim
- [ ] Signs section: intro + 8 bullets verbatim
- [ ] First-hour section: intro + 8 bullets verbatim
- [ ] Serving section + Why-us section (intro + 6 bullets) verbatim
- [ ] 0 em/en dashes anywhere in output
- [ ] Meta title 60ch verbatim, meta description 108ch verbatim

## Routes (19)
- [ ] / (homepage)
- [ ] /emergency-water-extraction
- [ ] /burst-pipe-water-damage
- [ ] /ac-leak-water-damage
- [ ] /slab-leak-water-damage
- [ ] /water-heater-leak-cleanup
- [ ] /appliance-leak-water-damage
- [ ] /ceiling-water-damage-repair
- [ ] /storm-roof-leak-water-damage
- [ ] /flood-damage-cleanup
- [ ] /sewage-backup-cleanup
- [ ] /mold-remediation
- [ ] /mold-inspection
- [ ] /structural-drying
- [ ] /wet-flooring-water-damage
- [ ] /mobile-home-water-damage
- [ ] /commercial-water-damage
- [ ] /leak-detection
- [ ] /water-damage-insurance-claim-help (ONE route, appears twice in doc)
- [ ] Linked pages carry ONLY their verbatim homepage summary

## Scaffold
- [ ] index.php front controller (308 slash redirect, sitemap.xml, static serving, 404)
- [ ] includes/header.php, footer.php, functions.php, lead-form.php, lead-handler.php
- [ ] data/pages.php, data/media.php (null-guards: missing file renders no img, never broken)
- [ ] assets/css/styles.css (fresh), assets/js/main.js (fresh)
- [ ] .htaccess (308 no-slash), robots.txt (Allow:/, NO Host:), llms.txt (19 pages), site.webmanifest, fresh favicon set

## Design rules
- [ ] Body 18px sitewide; headings own sizes; container 1280px; body 88ch, hero intro 72ch, H1 24ch, H2 36ch
- [ ] Button 1 = ONLY "(407) 787-9139"; Button 2 "Request Emergency Help" equal size/prominence/visibility
- [ ] Sticky call bar hidden while hero on screen; hamburger 46x46, Escape closes; overflow 0 at 320/390/1280; Button 2 visible at scroll-0

## SEO / AEO / GEO
- [ ] LocalBusiness + BreadcrumbList every page; FAQPage + WebSite homepage; Service on service pages; HowTo for 8 steps; SpeakableSpecification FAQ + hero intro
- [ ] JSON-LD valid 19/19; FAQ schema 8/8 = visible Q&A
- [ ] Self-canonical 1/page; sitemap 19/19, date-only lastmod; slash 308; 404 page
- [ ] 0 broken links, 0 orphans, 0 self-links in body copy, anchors max 3-5 words, 1 link per target per page in body copy
- [ ] Lead form honest no-mail-yet notice

## Images
- [ ] Fresh real photos only; 0 banned Lynnwood / past-site images
- [ ] Viewed-pixel check per slot + height measured; EXIF/XMP stripped + verified; no "AI" in filename/path/alt/metadata
- [ ] Unfilled slots flagged honestly, not forced (list in qa/IMAGE-LOG.md)

## Verification
- [ ] Routes 200 (19/19), H1 1/page, canonical 1/page = sitemap, slash 308, 404
- [ ] 0 other-site traces (name/phone/domain/cities), 0 dashes, JSON-LD valid 19/19
- [ ] Overflow 0 at 320/390/1280, 18px body computed, Button 2 visible scroll-0
- [ ] Desktop + mobile screenshots per page, viewed; review PDF in ~/workspace/your_files/apopka-review-pack.pdf
- [ ] Findings logged in qa/FINDINGS.md; PROGRESS.md updated
