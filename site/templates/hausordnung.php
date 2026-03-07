<?php snippet('header') ?>

<main class="page-shell">
  <div class="wrapper">
    <h1 class="page-title"><?= esc($page->title()) ?></h1>
    <?php if ($page->subtitle()->isNotEmpty()): ?>
      <p class="page-lead"><?= $page->subtitle()->kt() ?></p>
    <?php endif ?>

    <div class="rules">
      <?php foreach ($page->rules()->toStructure() as $rule): ?>
        <section class="rule">
          <h3><?= esc($rule->title()) ?></h3>
          <div><p><?= $rule->text()->kt() ?></p></div>
        </section>
      <?php endforeach ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
