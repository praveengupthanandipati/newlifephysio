<?php
/**
 * XML sitemap for search engines, built from the menu in data.php.
 * Only pages that exist on disk are listed, so new pages appear
 * automatically once created; noindex pages (seo.php) are left out.
 * Submit https://<your-domain>/sitemap.php in Google Search Console.
 */
$page = 'home';
require __DIR__ . '/components/init.php';

/** @var array $nav  from data.php */

// Base URL: $site['url'] when set, otherwise the address this was requested on
$base = absolute_url();
if ($base === null) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
    $base = $scheme . '://' . $host . $dir . '/';
}
$base = rtrim($base, '/') . '/';

// Collect page ids: top-level menu items and child pages (those with an id)
$ids = [];
foreach ($nav as $item) {
    $ids[] = $item['id'];
    foreach ($item['children'] ?? [] as $child) {
        if (isset($child['id'])) {
            $ids[] = $child['id'];
        }
    }
}

$urls = [];
foreach (array_unique($ids) as $id) {
    $file = $id === 'home' ? 'index.php' : $id . '.php';
    if (!is_file(__DIR__ . '/' . $file)) {
        continue; // planned page not built yet
    }
    if (strpos(page_seo($id)['robots'], 'noindex') !== false) {
        continue;
    }
    $urls[] = [
        'loc'      => $base . ($id === 'home' ? '' : $file),
        'lastmod'  => date('Y-m-d', filemtime(__DIR__ . '/' . $file)),
        'priority' => $id === 'home' ? '1.0' : ($id === 'treatments' ? '0.9' : '0.7'),
    ];
}

header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url): ?>
    <url>
        <loc><?= e($url['loc']) ?></loc>
        <lastmod><?= e($url['lastmod']) ?></lastmod>
        <priority><?= e($url['priority']) ?></priority>
    </url>
<?php endforeach; ?>
</urlset>
