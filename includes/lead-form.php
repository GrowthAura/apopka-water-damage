<?php
// Apopka Water Damage Restoration — lead form. No mail is sent: no
// destination address has been given yet, and none is invented here.
// Submitting the form shows an honest notice and points to the phone line.
global $SITE, $SERVICES;
$form = $form ?? [];
$errors = $form['errors'] ?? [];
$values = $form['values'] ?? [];
$notice = $form['notice'] ?? false;
?>
<div class="form-card" id="request-service">
  <p class="form-title">Request Emergency Help</p>
  <p>Fill this in and we will call you back. For immediate help, call <?= phone_link() ?>.</p>
  <?php if ($notice): ?>
  <div class="form-note" role="status">
    <p><strong>Thank you. This form does not send email yet.</strong> No email address has been set up for requests, so your message was not sent anywhere. For immediate help, call <?= phone_link() ?>. A crew is dispatched immediately.</p>
  </div>
  <?php else: ?>
  <?php if ($errors): ?>
  <div class="form-note" role="alert">
    <p><strong>Please fix the following:</strong> <?= esc(implode(' ', $errors)) ?></p>
  </div>
  <?php endif; ?>
  <form method="post" action="" novalidate>
    <label for="f-name">Your name</label>
    <input id="f-name" name="name" type="text" autocomplete="name" required maxlength="120" value="<?= esc($values['name'] ?? '') ?>">
    <label for="f-phone">Phone number</label>
    <input id="f-phone" name="phone" type="tel" autocomplete="tel" required maxlength="40" value="<?= esc($values['phone'] ?? '') ?>">
    <label for="f-service">What is happening?</label>
    <select id="f-service" name="service">
      <option value="">Select a service</option>
      <?php foreach ($SERVICES as $s): ?>
      <option value="<?= esc($s['nav']) ?>"<?= (($values['service'] ?? '') === $s['nav']) ? ' selected' : '' ?>><?= esc($s['nav']) ?></option>
      <?php foreach ($s['also'] ?? [] as $x): ?>
      <option value="<?= esc($x['nav']) ?>"<?= (($values['service'] ?? '') === $x['nav']) ? ' selected' : '' ?>><?= esc($x['nav']) ?></option>
      <?php endforeach; ?>
      <?php endforeach; ?>
      <option value="Other"<?= (($values['service'] ?? '') === 'Other') ? ' selected' : '' ?>>Other</option>
    </select>
    <label for="f-message">Tell us what happened</label>
    <textarea id="f-message" name="message" required maxlength="2000"><?= esc($values['message'] ?? '') ?></textarea>
    <p class="hp-field" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off" value=""></label></p>
    <button class="btn btn-navy" type="submit">Request Emergency Help</button>
  </form>
  <?php endif; ?>
</div>
