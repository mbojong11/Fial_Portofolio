<?php $a = $site['about']; ?>
<section id="tentang"><div class="wrap">
<h2 class="d rv">Tentang <em>Saya</em></h2><p class="sub rv">Kenali saya lebih dekat.</p>
<div class="about">
<div class="rv"><p class="q"><?= e($a['quote']) ?></p>
<p style="color:var(--muted)"><?= e($a['text']) ?></p>
<div class="stats"><?php foreach ($a['stats'] as $st): ?><div><b class="num" data-to="<?= e($st['to']) ?>"<?= $st['dec'] ? ' data-dec="' . (int) $st['dec'] . '"' : '' ?>>0</b><small><?= e($st['label']) ?></small></div><?php endforeach; ?></div>
<div class="sorow"><?= socials($site['socials']) ?></div></div>
<div class="tl rv">
<?php foreach ($a['education'] as [$when, $school, $note]): ?>
<div class="it"><small><?= e($when) ?></small><h3><?= e($school) ?></h3><p><?= e($note) ?></p></div>
<?php endforeach; ?>
</div></div></div></section>
