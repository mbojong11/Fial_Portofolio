<?php $delays = ['0.0s', '0.3s', '0.7s', '1.0s', '1.4s']; ?>
<section id="keahlian"><div class="wrap">
<div class="skhead rv"><div class="cw"><div class="cube">
<?php foreach ($site['cube'] as $i => $ic): ?><div class="f<?= $i + 1 ?>"><?= icon($ic, '') ?></div><?php endforeach; ?>
</div></div><div><h2 class="d">Skill <em>Saya</em></h2><p class="sub" style="margin:0">Teknologi dan kemampuan yang saya kuasai.</p></div></div>
<div class="skills">
<?php foreach ($site['skills'] as $group): ?>
<div class="sk rv"><h3 class="d"><?= e($group['title']) ?></h3><div class="tiles">
<?php foreach ($group['items'] as $i => [$ic, $label]): ?>
<div class="lg tilt" style="--d:<?= $delays[$i % count($delays)] ?>"><?= icon($ic, '') ?><span><?= e($label) ?></span></div>
<?php endforeach; ?>
</div></div>
<?php endforeach; ?>
</div></div></section>
