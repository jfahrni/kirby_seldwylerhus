<?php
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */
$reservationPage = $site->find('home');
$reservationUrl = $reservationPage?->reservationUrl()->or('https://pfadiheime.ch/en/cottages/110-pfadiheim-seldwylerhus-bulach');
?>
<!doctype html>
<html lang="de-CH">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($page->title()) ?> | <?= esc($site->title()) ?></title>
  <?php if ($page->description()->isNotEmpty()): ?>
  <meta name="description" content="<?= esc($page->description()) ?>">
  <?php endif ?>
  <link rel="stylesheet" href="<?= url('assets/css/site.css') ?>?v=20260307r6">
</head>
<body>
<header class="site-header">
  <div class="wrapper bar">
    <div class="brand">
      <a href="<?= $site->url() ?>"><?= esc($site->title()) ?></a>
    </div>

    <nav class="nav" aria-label="Hauptnavigation" id="main-nav">
      <div class="nav-links">
        <?php foreach ($site->children()->listed()->filterBy('slug', '!=', 'impressum')->filterBy('slug', '!=', 'datenschutz')->filterBy('slug', '!=', 'cookie-einstellungen') as $item): ?>
          <a href="<?= $item->url() ?>" <?= $item->isOpen() ? 'aria-current="page"' : '' ?>>
            <?= esc($item->title()) ?>
          </a>
        <?php endforeach ?>
      </div>

      <a class="reserve-btn" href="<?= esc($reservationUrl) ?>" target="_blank" rel="noopener">
        Reservation
      </a>

      <button
        class="menu-toggle"
        type="button"
        aria-label="Menü öffnen"
        aria-expanded="false"
        onclick="document.getElementById('main-nav').classList.toggle('is-open'); this.setAttribute('aria-expanded', document.getElementById('main-nav').classList.contains('is-open') ? 'true' : 'false');">
        ☰
      </button>
    </nav>
  </div>
</header>
