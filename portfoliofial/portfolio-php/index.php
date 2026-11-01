<?php
declare(strict_types=1);

require __DIR__ . '/includes/helpers.php';
$site = require __DIR__ . '/includes/data.php';
$p = $site['profile'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($p['name']) ?> – <?= e($p['title']) ?></title>
<meta name="description" content="<?= e($p['intro']) ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Space+Grotesk:wght@400;600&display=swap">
<link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/css/lanyard.css') ?>">
<script>document.documentElement.classList.add('js')</script>
</head>
<body>
<?php
include __DIR__ . '/partials/icons.php';
include __DIR__ . '/partials/nav.php';
include __DIR__ . '/partials/hero.php';
include __DIR__ . '/partials/marquee.php';
include __DIR__ . '/partials/about.php';
include __DIR__ . '/partials/jobs.php';
include __DIR__ . '/partials/skills.php';
include __DIR__ . '/partials/projects.php';
include __DIR__ . '/partials/contact.php';
include __DIR__ . '/partials/footer.php';
?>
<script src="<?= asset('assets/js/main.js') ?>"></script>
<script src="<?= asset('assets/js/lanyard.js') ?>"></script>
</body>
</html>
