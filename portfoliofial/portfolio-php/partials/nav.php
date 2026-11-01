<nav><div class="wrap"><span class="d logo"><svg><use href="#clover"/></svg><?= e($p['name']) ?></span>
<div class="links">
<?php foreach ($site['nav'] as [$href, $label]): ?><a href="<?= e($href) ?>"><?= e($label) ?></a><?php endforeach; ?>
<div class="nso"><?= socials($site['socials'], '') ?></div>
<a class="cta" href="#kontak">Kontak</a></div></div></nav>
