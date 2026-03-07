<?php snippet('header') ?>

<main class="page-shell">
  <div class="wrapper">
    <h1 class="page-title"><?= esc($page->title()) ?></h1>

    <div class="impressum-body">
      <h2 class="impressum-section-title">Betreiber</h2>
      <table class="impressum-table">
        <?php if ($page->organisation()->isNotEmpty()): ?>
        <tr><th>Organisation</th><td><?= esc($page->organisation()) ?></td></tr>
        <?php endif ?>
        <?php if ($page->rechtsform()->isNotEmpty()): ?>
        <tr><th>Rechtsform</th><td><?= esc($page->rechtsform()) ?></td></tr>
        <?php endif ?>
        <?php if ($page->che()->isNotEmpty()): ?>
        <tr><th>UID</th><td><?= esc($page->che()) ?></td></tr>
        <?php endif ?>
        <?php if ($page->adresse()->isNotEmpty()): ?>
        <tr><th>Adresse</th><td><?= $page->adresse()->kt() ?></td></tr>
        <?php endif ?>
        <?php if ($page->kontakt()->isNotEmpty()): ?>
        <tr><th>Kontakt</th><td><?= $page->kontakt()->kt() ?></td></tr>
        <?php endif ?>
        <?php if ($page->aufsicht()->isNotEmpty()): ?>
        <tr><th>Aufsichtsbehörde</th><td><?= esc($page->aufsicht()) ?></td></tr>
        <?php endif ?>
        <?php if ($page->revision()->isNotEmpty()): ?>
        <tr><th>Revisionsstelle</th><td><?= esc($page->revision()) ?></td></tr>
        <?php endif ?>
      </table>

      <?php if ($page->haftung()->isNotEmpty()): ?>
      <h2 class="impressum-section-title">Haftungsausschluss</h2>
      <div><?= $page->haftung()->kt() ?></div>
      <?php endif ?>

      <?php if ($page->urheberrecht()->isNotEmpty()): ?>
      <h2 class="impressum-section-title">Urheberrecht</h2>
      <div><?= $page->urheberrecht()->kt() ?></div>
      <?php endif ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
