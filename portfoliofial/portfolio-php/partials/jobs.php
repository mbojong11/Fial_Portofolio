<section id="kerja" style="background:#0d0d10"><div class="wrap">
<h2 class="d rv">Daftar <em>Kerja</em></h2><p class="sub rv">Pengalaman kerja dan kegiatan.</p>
<div class="grid">
<?php foreach ($site['jobs'] as $j): ?>
<div class="card tilt rv"><small class="yr"><?= e($j['year']) ?></small><h3 class="d"><?= e($j['title']) ?></h3><p class="org"><?= e($j['org']) ?></p><p><?= e($j['desc']) ?></p></div>
<?php endforeach; ?>
</div></div></section>
