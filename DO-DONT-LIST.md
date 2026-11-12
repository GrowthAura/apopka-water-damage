# Apopka FL Water Damage Restoration — DO / DON'T LIST

Top authority for this build. Every line below is a standing order from the user or a direct consequence of the source doc.

## THE STANDARD — Noorullah's order, 2026-11-12 (applies to EVERY future work on this site)
- Content 1001% wohi ho jo usne docs mein diya hai, aur bilkul waise ho jaisi usne instructions di hain — na ek lafz kam, na ek lafz zyada, na kuch invent karna hai.
- Har site ek se badh kar ek ho — is site ko pichli sites se BEHTAR banao.
- CORRECTION (2026-11-12, verified by fresh fetch): the "HOMEPAGE ONLY" claim below was WRONG. Plain documents.get returns Tab 1 ONLY. With includeTabsContent=true the doc has 25 tabs, 42,901 words. The full content WAS in his doc all along. NEVER trust a Tab-1-only read again: fetch docs ONLY with includeTabsContent=true, verify the tabs array + per-tab word counts BEFORE claiming anything about coverage.

## Source of truth
- Google Doc 1LfF_CNNyium0TldmxA3no6Wv_nFZFyPm8bok5MAlKGY, "Apopka FL Water Damage Restoration — Page Copy" — 25 tabs, 42,901 words (verified 2026-11-12, doc-tabs.json + extracted-tab01..25.txt in build dir).
- Tab 01 Homepage: 2,753 words, H1 x1, H2 x13, H3 x31, FAQ 8.
- Tabs 02–19: full pages for all 18 service routes, 1,688–2,084 words each (own URL + Meta Title + Meta Description + Eyebrow + H1 per tab). These go VERBATIM onto their pages — the old summary-only inner pages are superseded.
- Tab 20 About (/about/, 904 words) + Tab 21 Contact (/contact/, 496 words) — content EXISTS in the doc: build both pages verbatim. NO Privacy tab exists — do NOT build Privacy, do NOT invent it.
- Tabs 22–25: 4 blog guides (~1,100 words each) under /resources/ — build all 4 verbatim.
- Total routes: 25 (homepage + 18 services + About + Contact + 4 blogs).
- Phone ONLY (407) 787-9139. ZIPs 32703 + 32712, Orange County / Central Florida, Lake Apopka / Wekiva River basin.
- Homepage meta title verbatim 60ch: "Water Damage Restoration Apopka FL | 24/7 Emergency Response".
- Homepage meta description verbatim 108ch: "24/7 water damage restoration in Apopka, FL 32703 & 32712. Crew dispatched immediately. Call (407) 787-9139."
- NO domain in the doc, NO street address. Do NOT invent either.
- 0 hyperlink objects in the doc. Links are paths in parentheses ONLY — they are the sole authority for links. Never infer a link from pasted text. Headings are real named styles in Tab 01; check each tab's own styles/labels, never assume.

## DO
- Keep every visible word 100% verbatim from the doc. Do not cut, shorten, paraphrase or invent a single line.
- Strip em dashes and en dashes at build time without changing words.
- Body text 20px sitewide (20x DESIGN POLISH 2026-11-12 — supersedes the old 18px rule; 20px chosen over 19px because Button 2 stays in-viewport at 320x844 and 390x844 on all 25 routes at 20px, measured; see qa/FINDINGS-DESIGN-20x-2026-11-12.md). Headings scale in proportion (H1 clamp 2.5rem–4.25rem, H2 1.95rem–2.8rem, H3 1.3rem–1.7rem); .lead 21px, hero intro 20px, buttons/nav/form/footer text 19px. Wide-text rule: body text 88ch, hero intro 72ch, hero H1 24ch, H2 36ch; container 1280px.
- Button 1 = ONLY the call number "(407) 787-9139", nothing else written in it. Button 2 ("Request Emergency Help") = EQUAL to Button 1: same size, same prominence, same visibility.
- Mobile: sticky call bar hidden while hero is on screen, hamburger 46x46, Escape closes, no overflow at 320/390, Button 2 visible at scroll-0.
- URL form: homepage / only, every other route NO trailing slash. Slash form answers 308 to no-slash. Self-canonical 1/page. Sitemap date-only lastmod. robots Allow:/ with NO Host: line.
- Every inner page carries its OWN tab's FULL content verbatim (URL + meta + eyebrow + H1 + all headings + all body + FAQ where the tab has one). No summary-only pages. No invented words.
- /water-damage-insurance-claim-help appears twice in the homepage tab (service list + insurance section) but is ONE route (Tab 19).
- CONTENT-FULLNESS GATE (mandatory in every QA round): count visible words per page — total + main-body excl. header/footer/sticky bar + UNIQUE prose (excl. repeated template). EMPTY = main <100 words, THIN = 100–300. A page returning 200 with H1=1 can still be effectively empty. Rendered-state checks (real clicks / mirror render) are mandatory, never curl alone.
- llms.txt lists all 25 pages. Sitemap 25/25. JSON-LD per tab content (FAQPage where the tab has FAQ, Service on service pages, HowTo only where the tab has steps).
- 0 broken links, 0 orphans, 0 self-links in body copy (header/footer exempt), anchors max 3-5 words, 1 link per target per page in body copy.
- Lead form: honest no-mail-yet notice. No backend mail until he gives an address. The form must not pretend to send.
- SEO + AEO + GEO on verbatim doc facts only (SCHEMA BEST-EVER 2026-11-12, see qa/FINDINGS-SCHEMA-SEO-10x-2026-11-12.md): @type HomeAndConstructionBusiness (+additionalType ProfessionalService) + BreadcrumbList every page, FAQPage + WebSite on homepage (WebSite publisher → #business, inLanguage en-US), Service schema on service pages (serviceType = verbatim nav label, image = page hero), HowTo only where the tab has numbered steps (steps verbatim, no invented tools/supplies), Article on the 4 blogs (NO dates — none in the doc), llms.txt with all 25 pages. Business @id ...#business single + identical on all 25 pages; hasOfferCatalog all 18 services (verbatim labels + live URLs); areaServed Apopka + Orange County + Central Florida + Zellwood + Plymouth ONLY (doc-supported); NO street address; description = homepage meta description verbatim; image = that page's real hero. SpeakableSpecification DROPPED (2026-11-08 verdict: news-only beta). NEVER: Review/AggregateRating, sameAs, geo, priceRange, foundingDate, QAPage, ClaimReview, DiscussionForumPosting, EmergencyService type. Keep citable facts (IICRC S500, 24-48h mold window, cost range $1,000-$3,000 / $3,000-$10,000+) exactly as written, no invented source.
- Images: every image fresh for Apopka, real photographic, topic-fit + place-fit by VIEWED pixels, height measured (never width alone), EXIF/XMP stripped + verified, no "AI" word in filename/path/alt/metadata, never claimed as a real job photo. If a slot has no fitting photo, flag it honestly. Do NOT force a wrong photo.
- Verify VISUALLY with real screenshots (desktop + mobile) before any claim. Code checks alone never prove a design.
- LCP <1.8s mobile target, CLS 0.

## DON'T
- NEVER clone/copy any file from Lynnwood, San Bruno, Acworth, Pleasant Grove or Tulsa (CSS, components, pages data, favicon). Write CSS/PHP/JS fresh; design language only (Fraunces + Inter, warm paper #FBF8F2, deep ink #0F1D2E, ocean #0B7AB5).
- ZERO images from any past site, ever. Lynnwood's 16 images are BANNED: img-hero.jpg, img-burst-pipe.jpg, img-crawlspace.jpg, img-crawlspace-pump.jpg, img-crew.jpg, img-drying.jpg, img-drying-lineup.jpg, img-exterior.jpg, img-extraction-action.jpg, img-flood.jpg, img-flood-exterior.jpg, img-mold.jpg, img-mold-inspection.jpg, img-mold-tech.jpg, img-pipe-repair.jpg, img-vapor-barrier.jpg. Plus all San Bruno / Acworth / Pleasant Grove / Tulsa images.
- Google differentiation ABSOLUTE: zero traces of Lynnwood / San Bruno / Acworth / Tulsa anywhere (name, phone, domain, cities, comments, filenames, alt, schema, sitemap, robots, manifest, llms.txt, image metadata).
- Do NOT invent: domain, street address, About/Contact/Privacy, reviews, certifications beyond the doc, rates beyond the doc's own cost range, service areas beyond the doc, or any page not in the doc.
- Do NOT add a link not in the doc. Doc paths in parentheses are the only authority.
- Do NOT push / deploy / touch domain / DNS / Vercel / GitHub Pages. LOCAL ONLY until his word + token.
- Do NOT claim the site is done while image slots are still pending. Say so plainly.
