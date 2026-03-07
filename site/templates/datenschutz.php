<?php snippet('header') ?>

<main class="page-shell">
  <div class="wrapper">
    <h1 class="page-title"><?= esc($page->title()) ?></h1>
    <div class="text-body">
      <?= $page->text()->kt() ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
