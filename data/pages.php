<?php
// Apopka Water Damage Restoration — site and page data.
// Written fresh for this site. All visible copy is verbatim from the
// Google Doc "Apopka FL Water Damage Restoration — Page Copy" (homepage
// only, 2,753 words). Nothing here is invented: no domain, no street
// address, no About / Contact / Privacy content, no reviews, no rates
// beyond the doc's own cost range ($1,000 to $3,000 / $3,000 to $10,000
// or more, kept on the homepage cost section only).
// 0 hyperlink objects in the doc: links are the paths in parentheses
// only. Button 1 shows ONLY the phone number; Button 2
// ("Request Emergency Help") is its equal.

$SITE = [
    'brand'       => 'Apopka Water Damage Restoration',
    'brand_small' => 'WATER DAMAGE RESTORATION',
    'city'        => 'Apopka',
    'state'       => 'FL',
    'zips'        => '32703 and 32712',
    'zip'         => '32703',
    'county'      => 'Orange County',
    'phone'       => '(407) 787-9139',
    'phone_href'  => 'tel:+14077879139',
    'phone_plain' => '4077879139',
    'hours'       => '24/7',
    'map_query'   => 'Apopka, FL 32703',
    // Live URL: GitHub Pages project site (deployed 2026-11-12).
    // Swap for the real apex domain when it lands; canonicals, sitemap,
    // og and robots all derive from this.
    'url'         => 'https://growthaura.github.io/apopka-water-damage',
];

$HOME_META = [
    'title'       => 'Water Damage Restoration Apopka FL | 24/7 Emergency Response',
    'description' => '24/7 water damage restoration in Apopka, FL 32703 & 32712. Crew dispatched immediately. Call (407) 787-9139.',
    'eyebrow'     => 'WATER DAMAGE RESTORATION • APOPKA, FLORIDA',
    'h1'          => '24/7 Emergency Water Damage Restoration in Apopka, FL 32703',
    'intro'       => 'Water on your floors, dripping through a ceiling or soaking a closet wall needs action now, not tomorrow. Our water damage restoration Apopka FL crew is dispatched immediately, day or night, to extract standing water, find the source and dry your home to IICRC S500 standards. We handle burst pipes, AC overflows, slab leaks, storm water and sewage backups across 32703 and 32712. Call now and a technician is on the way.',
];

$TRUST = [
    'Open 24/7/365',
    'Crew Dispatched Immediately',
    'IICRC S500 Drying Methods',
    'Moisture Reports for Your Claim',
];

$WHO_H2 = 'Who do I call for water damage in Apopka at night?';
$WHO_PARAS = [
    'Call a 24/7 water damage line like (407) 787-9139. A crew is dispatched immediately to Apopka homes in 32703 and 32712 to stop the water, extract it and start drying the same night.',
    'Water damage does not wait for business hours, and in Central Florida the clock moves faster than most people expect. Warm air and year-round humidity mean wet drywall, carpet pad and baseboards can start growing mold within 24 to 48 hours. That is why every call to our line is treated as an emergency first, and a booking second. You speak to a person, describe what you see, and a crew with truck-mounted extraction, air movers and dehumidifiers heads your way.',
    'If you are looking at water right now, do three things while you wait: turn off the main water valve (usually where the line enters the house near the front hose bib or in the garage), switch off breakers for any room where water touches outlets or cords, and move rugs, electronics and paperwork to a dry spot. Then leave the rest to us.',
];

// 15 service cards. 'body' is the paragraph before its closing link
// sentence; 'sentence' is that closing sentence verbatim; 'links' are the
// 3-5 word spans inside it that carry the links (doc paths in parentheses
// are the only authority). Cards with two links map to two routes.
$SERVICES = [
    [
        'slug' => '/emergency-water-extraction',
        'nav'  => 'Emergency Water Extraction',
        'h3'   => 'Emergency Water Extraction',
        'full' => 'Emergency Water Extraction in Apopka',
        'body' => 'Standing water comes out first. Truck-mount and portable extraction units pull water from carpet, tile, LVP and concrete fast so the structure stops absorbing it.',
        'sentence' => 'Read more: Emergency Water Extraction in Apopka',
        'links' => [['anchor' => 'Emergency Water Extraction in Apopka', 'href' => '/emergency-water-extraction']],
    ],
    [
        'slug' => '/burst-pipe-water-damage',
        'nav'  => 'Burst Pipe Water Damage',
        'h3'   => 'Burst Pipe Water Damage',
        'full' => 'Burst Pipe Water Damage Cleanup in Apopka',
        'body' => 'A split supply line can release hundreds of gallons in an hour. We extract, open wet wall cavities where needed and dry framing before it warps.',
        'sentence' => 'Read more: Burst Pipe Water Damage Cleanup in Apopka',
        'links' => [['anchor' => 'Burst Pipe Water Damage', 'href' => '/burst-pipe-water-damage']],
    ],
    [
        'slug' => '/ac-leak-water-damage',
        'nav'  => 'AC Leak Water Damage',
        'h3'   => 'AC Leak and Air Handler Overflow',
        'full' => 'AC Leak Water Damage in Apopka',
        'body' => 'The number one water damage call in Florida homes. A clogged condensate line or rusted drain pan quietly soaks closets, hallways and ceilings under attic units.',
        'sentence' => 'Read more: AC Leak Water Damage in Apopka',
        'links' => [['anchor' => 'AC Leak Water Damage', 'href' => '/ac-leak-water-damage']],
    ],
    [
        'slug' => '/slab-leak-water-damage',
        'nav'  => 'Slab Leak Water Damage',
        'h3'   => 'Slab Leak Water Damage',
        'full' => 'Slab Leak Water Damage in Apopka',
        'body' => 'Most Apopka homes sit on a concrete slab with no basement, so a leaking pipe under the floor shows up as warm spots, damp carpet or lifting tile.',
        'sentence' => 'Read more: Slab Leak Water Damage in Apopka',
        'links' => [['anchor' => 'Slab Leak Water Damage', 'href' => '/slab-leak-water-damage']],
    ],
    [
        'slug' => '/water-heater-leak-cleanup',
        'nav'  => 'Water Heater Leak Cleanup',
        'h3'   => 'Water Heater Leaks',
        'full' => 'Water Heater Leak Cleanup in Apopka',
        'body' => 'Garage and closet tank failures flood laundry rooms and bedrooms fast.',
        'sentence' => 'Read more: Water Heater Leak Cleanup in Apopka',
        'links' => [['anchor' => 'Water Heater Leak Cleanup', 'href' => '/water-heater-leak-cleanup']],
    ],
    [
        'slug' => '/appliance-leak-water-damage',
        'nav'  => 'Appliance Leak Water Damage',
        'h3'   => 'Appliance and Toilet Overflows',
        'full' => 'Appliance Leak Water Damage in Apopka',
        'body' => 'Washers, dishwashers, refrigerator ice-maker lines and toilet supply lines.',
        'sentence' => 'Read more: Appliance Leak Water Damage in Apopka',
        'links' => [['anchor' => 'Appliance Leak Water Damage', 'href' => '/appliance-leak-water-damage']],
    ],
    [
        'slug' => '/ceiling-water-damage-repair',
        'nav'  => 'Ceiling Water Damage Repair',
        'h3'   => 'Ceiling Water Damage',
        'full' => 'Ceiling Water Damage Repair in Apopka',
        'body' => 'Sagging drywall, brown rings and dripping light fixtures.',
        'sentence' => 'Read more: Ceiling Water Damage Repair in Apopka',
        'links' => [['anchor' => 'Ceiling Water Damage Repair', 'href' => '/ceiling-water-damage-repair']],
    ],
    [
        'slug' => '/storm-roof-leak-water-damage',
        'nav'  => 'Storm and Roof Leak Water Damage',
        'h3'   => 'Storm and Roof Leak Water Damage',
        'full' => 'Storm and Roof Leak Water Damage in Apopka',
        'body' => 'Wind-driven rain, missing shingles and hurricane leaks.',
        'sentence' => 'Read more: Storm and Roof Leak Water Damage in Apopka',
        'links' => [['anchor' => 'Roof Leak Water Damage', 'href' => '/storm-roof-leak-water-damage']],
    ],
    [
        'slug' => '/flood-damage-cleanup',
        'nav'  => 'Flood Damage Cleanup',
        'h3'   => 'Flood Damage Cleanup',
        'full' => 'Flood Damage Cleanup in Apopka',
        'body' => 'Rising water from heavy rain, overflowing retention ponds and low lots.',
        'sentence' => 'Read more: Flood Damage Cleanup in Apopka',
        'links' => [['anchor' => 'Flood Damage Cleanup', 'href' => '/flood-damage-cleanup']],
    ],
    [
        'slug' => '/sewage-backup-cleanup',
        'nav'  => 'Sewage Backup Cleanup',
        'h3'   => 'Septic and Sewage Backup Cleanup',
        'full' => 'Septic and Sewage Backup Cleanup in Apopka',
        'body' => 'Black water from septic systems, cast-iron drains or city sewer lines.',
        'sentence' => 'Read more: Septic and Sewage Backup Cleanup in Apopka',
        'links' => [['anchor' => 'Sewage Backup Cleanup', 'href' => '/sewage-backup-cleanup']],
    ],
    [
        'slug' => '/mold-remediation',
        'nav'  => 'Mold Remediation',
        'h3'   => 'Mold Remediation and Mold Inspection',
        'full' => 'Mold Remediation in Apopka',
        'body' => 'When water sat too long, we contain, remove and dry.',
        'sentence' => 'Read more: Mold Remediation in Apopka and Mold Inspection in Apopka',
        'links' => [
            ['anchor' => 'Mold Remediation', 'href' => '/mold-remediation'],
            ['anchor' => 'Mold Inspection', 'href' => '/mold-inspection'],
        ],
        'also' => [['slug' => '/mold-inspection', 'nav' => 'Mold Inspection', 'full' => 'Mold Inspection in Apopka']],
    ],
    [
        'slug' => '/structural-drying',
        'nav'  => 'Structural Drying',
        'h3'   => 'Structural Drying and Wet Flooring',
        'full' => 'Structural Drying in Apopka',
        'body' => 'Daily moisture readings until walls, subfloors and slabs reach dry standard.',
        'sentence' => 'Read more: Structural Drying in Apopka and Flooded Carpet and Wet Floor Cleanup in Apopka',
        'links' => [
            ['anchor' => 'Structural Drying', 'href' => '/structural-drying'],
            ['anchor' => 'Wet Floor Cleanup', 'href' => '/wet-flooring-water-damage'],
        ],
        'also' => [['slug' => '/wet-flooring-water-damage', 'nav' => 'Wet Flooring Water Damage', 'full' => 'Flooded Carpet and Wet Floor Cleanup in Apopka']],
    ],
    [
        'slug' => '/mobile-home-water-damage',
        'nav'  => 'Mobile Home Water Damage',
        'h3'   => 'Mobile and Manufactured Home Water Damage',
        'full' => 'Mobile Home Water Damage in Apopka',
        'body' => 'Soft particleboard floors and belly-wrap leaks need a different approach than a block home.',
        'sentence' => 'Read more: Mobile Home Water Damage in Apopka',
        'links' => [['anchor' => 'Mobile Home Water Damage', 'href' => '/mobile-home-water-damage']],
    ],
    [
        'slug' => '/commercial-water-damage',
        'nav'  => 'Commercial Water Damage',
        'h3'   => 'Commercial Water Damage',
        'full' => 'Commercial Water Damage in Apopka',
        'body' => 'Offices, warehouses, churches, nurseries and greenhouses.',
        'sentence' => 'Read more: Commercial Water Damage in Apopka',
        'links' => [['anchor' => 'Commercial Water Damage', 'href' => '/commercial-water-damage']],
    ],
    [
        'slug' => '/leak-detection',
        'nav'  => 'Leak Detection',
        'h3'   => 'Leak Detection and Insurance Claim Help',
        'full' => 'Leak Detection in Apopka',
        'body' => 'Finding hidden leaks and documenting the loss for your adjuster.',
        'sentence' => 'Read more: Leak Detection in Apopka and Water Damage Insurance Claim Help in Apopka',
        'links' => [
            ['anchor' => 'Leak Detection', 'href' => '/leak-detection'],
            ['anchor' => 'Water Damage Insurance Claim Help', 'href' => '/water-damage-insurance-claim-help'],
        ],
        'also' => [['slug' => '/water-damage-insurance-claim-help', 'nav' => 'Water Damage Insurance Claim Help', 'full' => 'Water Damage Insurance Claim Help in Apopka']],
    ],
];

$SERVICES_H2    = 'What We Handle: Emergency Water Damage Apopka FL Homeowners Call Us For';
$SERVICES_INTRO = 'Every water loss has a different source, a different category of water and a different drying plan. These are the jobs Apopka homeowners call us for most, each with its own dedicated page so you can read exactly what happens for your situation.';

$WHY_H2    = 'Why Water Damage in Apopka Behaves Differently';
$WHY_INTRO = 'Apopka sits on the northwest edge of Orange County, between Lake Apopka and the Wekiva River basin. The ground is sandy, the water table is high in many neighborhoods, and the rock below is porous limestone. Add summer afternoon thunderstorms that drop an inch or more of rain in under an hour, and you get conditions where water arrives quickly and leaves slowly.';
$WHY_LEAD  = 'Here is what that means inside a typical Apopka home:';
$WHY_REASONS = [
    ['h3' => 'Concrete block on slab', 'text' => 'Most homes have no basement or crawl space. Water spreads across the slab and wicks up into drywall, baseboards and door casings instead of draining away. Drying a slab takes patience and the right dehumidification.'],
    ['h3' => 'Attic and closet air handlers', 'text' => 'Central AC runs most of the year. Condensate lines clog with algae, float switches fail and drain pans rust through, sending water into ceilings and hallway closets.'],
    ['h3' => 'Garage and interior water heaters', 'text' => 'Older tanks in garages and utility closets fail without warning, flooding laundry rooms and adjoining bedrooms.'],
    ['h3' => 'Older plumbing in established neighborhoods', 'text' => 'Homes built from the 1970s through the 1990s in areas like Errol Estate and around Park Avenue can still have aging supply lines and cast-iron drains that crack and back up.'],
    ['h3' => 'Septic systems in rural and north Apopka', 'text' => 'Many homes toward Zellwood, Plymouth and the Kelly Park area run on septic rather than city sewer, so heavy rain can push wastewater back into the house.'],
    ['h3' => 'Manufactured home communities', 'text' => 'Particleboard subfloors swell and lose strength quickly once wet, so a small leak becomes a soft floor within days.'],
    ['h3' => 'Newer construction with LVP flooring', 'text' => 'Luxury vinyl plank over a slab can trap water underneath where you cannot see it, which is why we use moisture meters and thermal imaging before calling any floor dry.'],
];

$PROCESS_H2    = 'Our Water Damage Restoration Process, Step by Step';
$PROCESS_INTRO = 'Every water damage job in Apopka follows the same disciplined process, adjusted to the category of water and the materials affected. You always know what is happening and why.';
$PROCESS_STEPS = [
    ['h3' => 'Step 1: Emergency Call and Immediate Dispatch',
     'text' => 'You call (407) 787-9139 and talk to a person. We ask where the water is coming from, whether it is clean or contaminated, and which rooms are affected. A crew is dispatched immediately with the equipment that fits your situation.'],
    ['h3' => 'Step 2: Stop the Source and Make It Safe',
     'text' => 'The crew confirms the water is shut off, checks for electrical hazards and identifies the water category. Clean water from a supply line is handled differently from sewage or flood water.'],
    ['h3' => 'Step 3: Inspection and Moisture Mapping',
     'text' => 'Using moisture meters and thermal imaging, technicians trace how far water has traveled behind walls, under flooring and into cabinets. Everything is photographed and logged.'],
    ['h3' => 'Step 4: Water Extraction',
     'text' => 'Truck-mounted and portable extractors remove standing water from carpet, tile, LVP, hardwood and concrete. The faster the bulk water comes out, the shorter and cheaper the drying phase.'],
    ['h3' => 'Step 5: Controlled Demolition Where Needed',
     'text' => 'Wet carpet pad, swollen baseboards and soaked drywall below the flood line are removed only when they cannot be dried in place. The goal is to save as much of your home as possible.'],
    ['h3' => 'Step 6: Structural Drying and Dehumidification',
     'text' => 'Air movers and commercial dehumidifiers are placed to create a drying system. Readings are taken every day until materials reach dry standard. In Apopka\'s humidity, this step is what separates a lasting repair from a mold problem a month later.'],
    ['h3' => 'Step 7: Cleaning, Sanitizing and Odor Control',
     'text' => 'Affected surfaces are cleaned and treated with antimicrobial products, which is essential for Category 2 and Category 3 water.'],
    ['h3' => 'Step 8: Repairs and Rebuild',
     'text' => 'Once everything is dry, drywall, baseboards, flooring and paint are put back so the room looks the way it did before the leak.'],
];

$CATEGORIES_H2    = 'Water Damage Categories: Clean, Gray and Black Water';
$CATEGORIES_INTRO = 'The IICRC S500 standard sorts water losses into three categories, and the category decides how your home is cleaned.';
$CATEGORIES_BULLETS = [
    'Category 1, clean water: Comes from a sanitary source such as a burst supply pipe, water heater or ice-maker line. Usually the fastest to dry if handled quickly.',
    'Category 2, gray water: Contains some contamination, such as washing machine discharge, dishwasher overflow or AC condensate that has sat in a pan. Needs cleaning and antimicrobial treatment.',
    'Category 3, black water: Sewage, septic backups and outdoor flood water. Porous materials it touches usually have to be removed, and the area must be sanitized before drying.',
];
$CATEGORIES_CLOSE = 'Clean water does not stay clean. After about 48 hours in a warm Apopka home, Category 1 water can degrade into Category 2 or 3, which is one more reason to call right away.';

$COST_H2    = 'How Much Does Water Damage Restoration Cost in Apopka?';
$COST_INTRO = 'There is no single price, because no two water losses are the same. As a general range, smaller residential jobs such as a single-room appliance leak often fall somewhere around $1,000 to $3,000, while multi-room losses, sewage backups and jobs that need flooring and drywall replacement commonly run from $3,000 to $10,000 or more. The main factors are:';
$COST_BULLETS = [
    'How many square feet are wet and how long the water sat.',
    'The category of water: clean, gray or black.',
    'The materials involved, such as carpet, LVP, hardwood, tile or drywall.',
    'Whether wall cavities, cabinets or the slab need to be opened.',
    'How many days of drying equipment are needed.',
];
$COST_CLOSE = 'You get a clear scope of work after inspection, before any major work begins, so there are no surprises.';

$INSURANCE_H2 = 'Does Homeowners Insurance Cover Water Damage in Apopka?';
$INSURANCE_PARAS = [
    'Most Florida homeowners policies cover sudden and accidental water damage, such as a pipe that bursts or a water heater that fails. Damage from long-term leaks, poor maintenance or rising flood water is usually excluded unless you carry separate flood coverage. Policies vary, so always check your own declarations page.',
    ['text' => 'What we do help with is the paperwork your adjuster asks for: moisture readings, photo documentation, drying logs and a detailed scope of work. Under current Florida rules, you as the homeowner file and manage your own claim, and good documentation makes that process smoother. Learn more on our Water Damage Insurance Claim Help in Apopka page.',
     'anchor' => 'Water Damage Insurance Claim Help', 'href' => '/water-damage-insurance-claim-help'],
];

$SIGNS_H2    = 'Signs You Have Hidden Water Damage';
$SIGNS_INTRO = 'Not every water problem announces itself with a puddle. Call for an inspection if you notice any of these:';
$SIGNS_BULLETS = [
    'A musty or earthy smell in a closet, bathroom or near the AC unit.',
    'Brown rings, bubbling paint or soft spots on ceilings.',
    'Baseboards that are swelling, separating or darker at the bottom.',
    'Flooring that feels soft, warm or spongy, or tile that sounds hollow.',
    'A water bill that jumped with no change in usage.',
    'Condensation or water in the AC drain pan or around the air handler.',
    'Warped door frames or doors that suddenly stick.',
];
$SIGNS_CLOSE = 'The earlier hidden water is found, the less needs to be torn out. Our leak detection and moisture mapping tools show what the naked eye cannot.';

$FIRST_HOUR_H2    = 'What to Do in the First Hour After Water Damage';
$FIRST_HOUR_INTRO = 'The choices you make before the crew arrives make a real difference to the final outcome.';
$FIRST_HOUR_BULLETS = [
    'Shut off the water at the main valve or the fixture supply.',
    'Turn off electricity to wet rooms at the breaker panel, and never stand in water near live outlets.',
    'Take photos and video of everything before moving anything, for your insurance claim.',
    'Lift furniture legs onto foil or wood blocks so stains do not transfer to wet carpet.',
    'Move rugs, electronics, books and paperwork to a dry area.',
    'Open interior doors to improve airflow, but keep windows closed if it is humid outside.',
    'Do not use a household vacuum on standing water, and stay away from any water that may be sewage.',
    'Call (407) 787-9139 so a crew is dispatched immediately.',
];

$SERVING_H2   = 'Serving All of Apopka, FL 32703 and 32712';
$SERVING_PARA = 'Our crews cover every part of Apopka, from downtown along Main Street and Park Avenue to the neighborhoods off Rock Springs Road, Kelly Park Road and Ocoee-Apopka Road. We reach homes near Wekiwa Springs State Park, Errol Estate, Zellwood and Plymouth, and we move quickly using US-441, SR-429 (the Wekiva Parkway) and SR-414. Whether your home is a 1970s block house near the Apopka Amphitheater, a newer build near the Northwest Recreation Complex, or a manufactured home on the north side of town, the response is the same: a crew dispatched immediately and drying started the same visit.';

$WHY_US_H2    = 'Why Apopka Homeowners Call Us for Emergency Water Damage';
$WHY_US_INTRO = 'When you are choosing a water damage company Apopka residents can rely on at 2 a.m., these are the things that matter:';
$WHY_US_BULLETS = [
    'A real person answers 24/7/365, including holidays and hurricane season.',
    'The crew is dispatched immediately, with extraction and drying equipment on the truck.',
    'Work follows IICRC S500 water damage and S520 mold standards.',
    'Daily moisture readings and photo documentation you can share with your insurer.',
    'A clear explanation of what needs to be removed and what can be saved.',
    'Experience with Florida-specific problems: AC overflows, slab leaks, septic backups and storm water.',
];

$FAQ_H2 = 'Frequently Asked Questions About Water Damage in Apopka';
$FAQS = [
    ['q' => 'How fast can a crew get to my home in Apopka?',
     'a' => 'A crew is dispatched immediately after your call. Arrival time depends on traffic and your exact location in 32703 or 32712, but the goal is always to start extraction the same visit.'],
    ['q' => 'How long does it take to dry a house after water damage in Apopka?',
     'a' => 'Most homes take three to five days of active drying. Slabs, hardwood floors and multi-room losses can take longer because of Central Florida humidity. Daily readings tell us exactly when materials are dry.'],
    ['q' => 'Can I stay in my home during water damage restoration?',
     'a' => 'In most clean-water jobs, yes. If sewage is involved, if a large part of the home is affected, or if someone in the household has breathing problems, it is safer to stay elsewhere until cleaning is finished.'],
    ['q' => 'Will mold grow after a leak?',
     'a' => 'It can begin within 24 to 48 hours in Apopka\'s warm, humid climate. Fast extraction and proper dehumidification are the best ways to prevent it. If mold has already started, our mold remediation team handles containment and removal.'],
    ['q' => 'Is water from my AC unit dangerous?',
     'a' => 'AC condensate is usually Category 2 water once it has sat in a pan or drain line, because algae and bacteria grow there. It should be extracted and the area treated with antimicrobial products.'],
    ['q' => 'My home is on septic. What should I do if it backs up?',
     'a' => 'Stop using all water in the house, keep children and pets away from the affected area, and call right away. Septic backups are Category 3 black water and need professional cleanup and sanitizing.'],
    ['q' => 'Do you work with insurance companies?',
     'a' => 'We provide the documentation adjusters ask for, including photos, moisture logs and a detailed scope. You file and manage your own claim, and we make sure you have the records to support it.'],
    ['q' => 'What water damage repair near me options are there at night or on weekends?',
     'a' => 'Our line is open 24/7, including weekends and holidays, and the same crew response applies at any hour.'],
];

$FINAL_CTA_H2 = 'Get 24/7 Emergency Water Damage Help in Apopka Now';
$FINAL_CTA_PARAS = [
    'Every hour water sits in your home, more drywall soaks it up, more flooring lifts and the risk of mold grows. Our water damage restoration Apopka FL crew is ready right now for flood cleanup, water removal service and full structural drying. Call (407) 787-9139 and a crew is dispatched immediately to your door.',
];

// Full tab content (tabs 02..25) — generated, see data/full_pages.php.
// The homepage arrays above are unchanged; inner pages now carry their OWN
// tab's full content verbatim instead of the old homepage summary.
require __DIR__ . '/full_pages.php';
