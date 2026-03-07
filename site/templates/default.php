<?php snippet('header') ?>

<?php
$hero = $page->heroImage()->toFile();
$topGallery = $page->galleryTop()->toFiles();
$bottomGallery = $page->galleryBottom()->toFiles();
?>

<?php if ($hero): ?>
<section class="hero-image">
  <img src="<?= $hero->resize(1800)->url() ?>" alt="<?= esc($hero->alt()->or($hero->filename())) ?>">
</section>
<?php endif ?>

<main>
  <section class="content-block">
    <div class="wrapper narrow">
      <h1><?= esc($page->headline()->or($page->title())) ?></h1>

      <?php if ($page->lead()->isNotEmpty()): ?>
        <div class="lead"><?= $page->lead()->kirbytext() ?></div>
      <?php endif ?>

      <?php if ($page->reservationUrl()->isNotEmpty()): ?>
        <p class="intro-cta">
          <a class="cta" href="<?= esc($page->reservationUrl()) ?>" target="_blank" rel="noopener">
            <?= esc($page->reservationLabel()->or('Belegungsplan und Reservation')) ?>
          </a>
        </p>
      <?php endif ?>
    </div>
  </section>

  <?php if ($topGallery->count()): ?>
  <section class="gallery-band">
    <div class="wrapper">
      <div class="gallery-top">
        <?php foreach ($topGallery as $img): ?>
          <figure class="figure">
            <img src="<?= $img->resize(900)->url() ?>" alt="<?= esc($img->alt()->or($img->filename())) ?>">
            <?php if ($img->caption()->isNotEmpty()): ?>
              <figcaption><?= esc($img->caption()) ?></figcaption>
            <?php endif ?>
          </figure>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <?php endif ?>

  <section class="content-block">
    <div class="wrapper info-grid">
      <div>
        <h2>Das Heim</h2>
        <?= $page->heimText()->kirbytext() ?>
      </div>
      <div>
        <h2>Lage und Umgebung</h2>
        <?= $page->lageText()->kirbytext() ?>
      </div>
      <div>
        <h2>Unsere Geschichte</h2>
        <?= $page->geschichteText()->kirbytext() ?>
      </div>
    </div>
  </section>

  <?php if ($bottomGallery->count()): ?>
  <section class="gallery-band">
    <div class="wrapper">
      <div class="gallery-grid">
        <?php foreach ($bottomGallery as $img): ?>
          <figure class="figure">
            <img src="<?= $img->resize(1200)->url() ?>" alt="<?= esc($img->alt()->or($img->filename())) ?>">
          </figure>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <?php endif ?>

  <section class="ct-section">
    <div class="wrapper">
      <h2 class="ct-title">Lageplan und Kontakt</h2>

      <?php
      $mapUrl = $page->mapEmbedUrl()->isNotEmpty()
        ? esc($page->mapEmbedUrl())
        : 'https://maps.google.com/maps?q=Pfadiheim+Seldwylerhus+B%C3%BClach&t=m&z=16&output=embed&hl=de';
      ?>
      <div class="ct-map" id="ct-map-wrap">
        <div class="ct-map-overlay" id="ct-map-overlay">
          <p>Für die Kartenanzeige wird Google Maps geladen.<br>Dabei werden Daten an Google übertragen.</p>
          <button class="cta" id="ct-map-btn">Karte anzeigen</button>
        </div>
        <iframe id="ct-map-iframe"
          data-src="<?= $mapUrl ?>"
          width="100%" height="400"
          style="border:0; display:none; width:100%;"
          allowfullscreen loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Pfadiheim Seldwylerhus – Karte"></iframe>
      </div>
      <script>
      (function(){
        var KEY = 'pfadiheim_map_consent';
        var overlay = document.getElementById('ct-map-overlay');
        var iframe  = document.getElementById('ct-map-iframe');
        function showMap() {
          iframe.setAttribute('src', iframe.getAttribute('data-src'));
          iframe.style.display = 'block';
          overlay.style.display = 'none';
        }
        if (localStorage.getItem(KEY) === '1') { showMap(); }
        document.getElementById('ct-map-btn').addEventListener('click', function() {
          localStorage.setItem(KEY, '1');
          showMap();
        });
      })();
      </script>

      <div class="ct-grid" style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px;">
        <div class="ct-card">
          <h3 class="ct-card-title">Kontakt</h3>
          <div class="ct-card-body"><?= $page->kontakt()->kirbytext() ?></div>
        </div>
        <div class="ct-card">
          <h3 class="ct-card-title">Adresse des Heims</h3>
          <div class="ct-card-body">
            <?= $page->adresse()->kirbytext() ?>
            <?php if ($page->reservationUrl()->isNotEmpty()): ?>
              <p class="ct-reservation"><a href="<?= esc($page->reservationUrl()) ?>" target="_blank" rel="noopener">&#8594; <?= esc($page->reservationLabel()->or('Belegungsplan und Reservation')) ?></a></p>
            <?php endif ?>
          </div>
        </div>
        <div class="ct-card">
          <h3 class="ct-card-title">Anreise</h3>
          <div class="ct-card-body"><?= $page->anreiseText()->kirbytext() ?></div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php snippet('footer') ?>
