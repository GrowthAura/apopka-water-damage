<?php
// Apopka Water Damage Restoration — footer + mobile call bar. Written
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
      <p class="footer-h"><?= esc($SITE['brand']) ?></p>
      <p>24/7 emergency water damage restoration in Apopka, FL 32703 and 32712. Crew dispatched immediately.</p>
      <p><a href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a><br>
      Apopka, FL 32703<br>
      <span class="footer-hours">Open 24 hours, 7 days a week</span></p>
      <a class="btn btn-ocean" href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a>
    </div>
    <div class="footer-col">
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
    <div class="footer-col">
      <p class="footer-h">Get Help Now</p>
      <p>Water on your floors, dripping through a ceiling or soaking a closet wall needs action now, not tomorrow.</p>
      <p><a href="<?= esc($SITE['phone_href']) ?>"><?= esc($SITE['phone']) ?></a><br>
      Apopka, FL 32703 and 32712<br>
      <span class="footer-hours">Open 24 hours, 7 days a week</span></p>
      <a class="btn btn-cream" href="<?= ($is_404 ?? false) ? '/#request-service' : '#request-service' ?>">Request Emergency Help</a>
    </div>
  </div>
  <div class="container footer-bottom">
    <span>&copy; 2026 <?= esc($SITE['brand']) ?> &middot; Apopka, FL 32703</span>
    <span>24/7 Emergency Service &middot; <?= esc($SITE['phone']) ?></span>
  </div>
</footer>
<a class="mobile-call-bar" href="<?= esc($SITE['phone_href']) ?>" aria-label="<?= esc($SITE['phone']) ?>">
  <span aria-hidden="true">&#9742;</span><span><?= esc($SITE['phone']) ?></span>
</a>
<div class="mobile-call-spacer" aria-hidden="true"></div>
<script src="/assets/js/main.js?v=2" defer></script>
</body>
</html>
