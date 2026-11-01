<?php
declare(strict_types=1);

/** Escape teks untuk HTML. */
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Ikon SVG dari sprite (partials/icons.php). */
function icon(string $id, string $class = 'ic'): string
{
    return '<svg class="' . e($class) . '"><use href="#' . e($id) . '"/></svg>';
}

/** URL aset + versi (otomatis refresh cache saat file berubah). */
function asset(string $path): string
{
    $file = __DIR__ . '/../' . $path;
    $v = is_file($file) ? (string) filemtime($file) : '1';
    return e($path) . '?v=' . $v;
}

/** Baris tombol sosial (dipakai di hero, tentang, dan footer). */
function socials(array $list, string $class = 'so'): string
{
    $out = '';
    foreach ($list as $s) {
        $out .= '<a class="' . e($class) . '" href="' . e($s['url']) . '" rel="noopener" aria-label="'
            . e($s['label']) . '">' . icon($s['icon']) . '</a>';
    }
    return $out;
}
