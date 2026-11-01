<section id="proyek" style="background:#0d0d10"><div class="wrap">
<h2 class="d rv">My <em>Projects</em></h2><p class="sub rv">Project berbasis studi kasus nyata selama kuliah.</p>
<div class="grid">
<?php foreach ($site['projects'] as $n => $pr): ?>
<div class="card tilt rv"><span class="no d"><?= sprintf('%02d', $n + 1) ?></span><h3 class="d"><?= e($pr['title']) ?></h3><p><?= e($pr['desc']) ?></p>
<div class="chips"><?php foreach ($pr['chips'] as $c): ?><span><?= e($c) ?></span><?php endforeach; ?></div></div>
<?php endforeach; ?>
</div></div></section>
