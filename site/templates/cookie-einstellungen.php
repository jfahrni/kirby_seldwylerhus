<?php snippet('header') ?>

<main class="page-shell">
  <div class="wrapper">
    <h1 class="page-title"><?= esc($page->title()) ?></h1>
    <div class="text-body">
      <?= $page->text()->kt() ?>

      <h2>Google Maps Einwilligung zurücksetzen</h2>
      <p>Mit dem folgenden Button kannst du deine Einwilligung zum Laden von Google Maps widerrufen. Beim nächsten Besuch der Startseite erscheint wieder die Bestätigungsabfrage.</p>
      <button class="cta cta--outline" onclick="localStorage.removeItem('pfadiheim_map_consent'); this.textContent = '✓ Einwilligung zurückgesetzt';">Einwilligung zurücksetzen</button>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
