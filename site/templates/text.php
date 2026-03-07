<?php snippet('header') ?>

<main class="text-page">
  <div class="wrapper">
    <div class="content">
      <h1><?= esc($page->title()) ?></h1>
      <?= $page->text()->kirbytext() ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
