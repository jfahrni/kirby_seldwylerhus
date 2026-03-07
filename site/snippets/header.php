<?php
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */
$reservationPage = $site->find('home');
$reservationUrl = $reservationPage?->reservationUrl()->or('https://pfadiheime.ch/en/cottages/110-pfadiheim-seldwylerhus-bulach');

$isHome     = $page->isHomePage();
$noindex    = in_array($page->slug(), ['impressum', 'datenschutz', 'cookie-einstellungen']);
$seoTitle   = $isHome
                ? esc($page->title())
                : esc($page->title()) . ' | ' . esc($site->title());
$seoDesc    = $page->description()->isNotEmpty() ? esc($page->description()) : '';
$canonical  = esc($page->url());

$ogImage = '';
if ($isHome && $page->heroImage()->isNotEmpty()) {
  $hero = $page->heroImage()->toFile();
  if ($hero) { $ogImage = esc($hero->resize(1200, 630)->url()); }
}
?>
<!doctype html>
<html lang="de-CH">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $seoTitle ?></title>

  <?php if ($seoDesc): ?>
  <meta name="description" content="<?= $seoDesc ?>">
  <?php endif ?>

  <?php if ($noindex): ?>
  <meta name="robots" content="noindex, follow">
  <?php else: ?>
  <meta name="robots" content="index, follow">
  <?php endif ?>

  <link rel="canonical" href="<?= $canonical ?>">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= $seoTitle ?>">
  <meta property="og:url"         content="<?= $canonical ?>">
  <meta property="og:locale"      content="de_CH">
  <meta property="og:site_name"   content="<?= esc($site->title()) ?>">
  <?php if ($seoDesc): ?>
  <meta property="og:description" content="<?= $seoDesc ?>">
  <?php endif ?>
  <?php if ($ogImage): ?>
  <meta property="og:image"       content="<?= $ogImage ?>">
  <meta property="og:image:width"  content="1200">
  <meta property="og:image:height" content="630">
  <?php endif ?>

  <link rel="stylesheet" href="<?= url('assets/css/site.css') ?>?v=20260307r7">
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
