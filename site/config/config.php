<?php

$excludeFromSitemap = ['impressum', 'datenschutz', 'cookie-einstellungen'];

return [
  'url' => "https://kirby.duckware.ch",
  'debug' => true,
  'panel' => [
    'install' => false
  ],
  'thumbs' => [
    'driver' => 'gd'
  ],
  'jobs' => [
    'queue' => false
  ],
  'routes' => [
    [
      'pattern' => 'sitemap.xml',
      'action'  => function () use ($excludeFromSitemap) {
        $pages = site()->index()->filter(function ($page) use ($excludeFromSitemap) {
          return !in_array($page->slug(), $excludeFromSitemap);
        });

        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($pages as $page) {
          $content .= "  <url>\n";
          $content .= '    <loc>' . esc($page->url()) . "</loc>\n";
          $content .= '    <lastmod>' . $page->modified('Y-m-d') . "</lastmod>\n";
          $content .= '    <changefreq>' . ($page->isHomePage() ? 'monthly' : 'yearly') . "</changefreq>\n";
          $content .= '    <priority>' . ($page->isHomePage() ? '1.0' : '0.7') . "</priority>\n";
          $content .= "  </url>\n";
        }
        $content .= '</urlset>';

        return new \Kirby\Http\Response($content, 'application/xml');
      }
    ]
  ]
];
