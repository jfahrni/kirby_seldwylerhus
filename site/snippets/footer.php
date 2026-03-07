<footer class="site-footer">
  <div class="wrapper inner">
    <div>
      <div class="footer-brand"><?= esc($site->title()) ?></div>
      <div class="footer-links">
        <?php if ($hausordnung = $site->find('hausordnung')): ?>
          <a href="<?= $hausordnung->url() ?>">Hausordnung</a>
        <?php endif ?>
      </div>
    </div>

    <div class="footer-legal">
      <?php if ($impressum = $site->find('impressum')): ?>
        <a href="<?= $impressum->url() ?>">Impressum</a>
      <?php endif ?>
      <?php if ($datenschutz = $site->find('datenschutz')): ?>
        <a href="<?= $datenschutz->url() ?>">Datenschutz</a>
      <?php endif ?>
      <?php if ($cookies = $site->find('cookie-einstellungen')): ?>
        <a href="<?= $cookies->url() ?>">Cookie-Einstellungen</a>
      <?php endif ?>
    </div>
  </div>
</footer>
</body>
</html>
