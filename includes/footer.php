<?php
// Apopka Water Damage Restoration - footer + mobile call bar. Written
// fresh for this site. $show_map (bool) is set by the page renderer before
// include.
global $SITE, $SERVICES;
$show_map = $show_map ?? true;
$map_src = 'https://www.google.com/maps?q=' . rawurlencode($SITE['map_query']) . '&output=embed';
?>
</main>
<?php if ($show_map): ?>
<div class="footer-map-wrap" aria-label="Map of Apopka, Florida">
  <iframe class="footer-map" title="Map: Apopka, FL 32703" src="<?= esc($map_src) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php endif; ?>
<footer class="site-footer">
  <div class="container footer-cols">
    <div class="footer-col">
      <span class="brand-mark footer-mark" aria-hidden="true"><svg viewBox="0 0 24 24" width="24" height="24"><circle cx="12" cy="12" r="10.6" fill="none" stroke="#B98A1F" stroke-width="1.5"/><path d="M7.2 17.5 L12 6.5 L16.8 17.5 M9.3 13.2 H14.7" fill="none" stroke="#FBF8F2" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
      <p class="footer-h"><?= esc($SITE['brand']) ?></p>
      <p>24/7 emergency water damage restoration in Apopka, FL 32703 and 32712. Crew dispatched immediately.</p>
      <p><a href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a><br>
      Apopka, FL 32703 and 32712<br>
      <span class="footer-hours">Open 24 hours, 7 days a week</span></p>
      <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
    </div>
    <div class="footer-col footer-col-services">
      <p class="footer-h">Services</p>
      <ul>
        <?php foreach ($SERVICES as $s): ?>
        <li><a href="<?= esc($s['slug']) ?>"><?= esc($s['nav']) ?></a></li>
        <?php foreach ($s['also'] ?? [] as $x): ?>
        <li><a href="<?= esc($x['slug']) ?>"><?= esc($x['nav']) ?></a></li>
        <?php endforeach; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="footer-col">
      <p class="footer-h">Guides &amp; Company</p>
      <ul>
        <li><a href="/about">About Us</a></li>
        <li><a href="/contact">Contact Us</a></li>
        <li><a href="/resources/apopka-ac-drain-line-tips">AC Drain Line Tips</a></li>
        <li><a href="/resources/who-pays-for-water-damage-florida">Who Pays for Water Damage?</a></li>
        <li><a href="/resources/apopka-hurricane-water-damage-checklist">Hurricane Checklist</a></li>
        <li><a href="/resources/how-fast-mold-grows-florida">How Fast Mold Grows</a></li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <span>&copy; 2026 <?= esc($SITE['brand']) ?> &middot; Apopka, FL 32703</span>
    <span>24/7 Emergency Service &middot; <span class="nowrap"><?= esc($SITE['phone']) ?></span></span>
  </div>
</footer>
<a class="mobile-call-bar" href="<?= esc($SITE['phone_href']) ?>" aria-label="<?= esc($SITE['phone']) ?>">
  <span aria-hidden="true">&#9742;</span><span><?= esc($SITE['phone']) ?></span>
</a>
<!-- LUXURY 2026-11-23 (P3-4): back-to-top, icon-only, appears after 2 viewports. No visible words. -->
<a class="to-top" href="#top" aria-label="Back to top"><svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M12 5l7 7-1.4 1.4L13 8.8V19h-2V8.8l-4.6 4.6L5 12l7-7z" fill="currentColor"/></svg></a>
<script>(function(){var b=document.querySelector('.to-top');if(!b)return;function t(){b.classList.toggle('show',window.scrollY>2*window.innerHeight)}window.addEventListener('scroll',t,{passive:true});t();})();</script>
<div class="mobile-call-spacer" aria-hidden="true"></div>
<script src="/assets/js/main.js?v=4" defer></script>
<?php /* STAGE 3 (2026-11-17, mobile SI): JSON-LD lives here (end of body)
     instead of <head> - same bytes, same schema, but the ~11.7KB block no
     longer delays parsing of the body markup. JSON-LD in <body> is valid. */ ?>
<?= $HEAD['ld'] ?? '' ?>
</body>
</html>
