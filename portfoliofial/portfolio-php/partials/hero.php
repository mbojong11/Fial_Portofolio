<header class="hero" id="home">
<div class="fl" style="left:4%;top:55%;width:60px"><svg><use href="#clover"/></svg></div>
<div class="fl" style="left:46%;top:12%;width:38px;animation-delay:1s"><svg><use href="#clover"/></svg></div>
<div class="fl" style="right:6%;bottom:8%;width:80px;animation-delay:2s"><svg><use href="#clover"/></svg></div>
<div class="wrap">
<div><div class="hi">// Halo, saya</div>
<h1 class="d"><?php foreach (explode(' ', $p['name'], 3) as $word): ?><span class="ln"><?= e($word) ?></span><?php endforeach; ?></h1>
<p class="role" id="role" data-roles="<?= e(json_encode($p['roles'], JSON_UNESCAPED_UNICODE)) ?>"><?= e($p['title']) ?></p>
<p class="about-s"><?= e($p['intro']) ?></p>
<div class="sorow"><?= socials($site['socials']) ?></div>
<a class="btn" href="#tentang">Tentang saya →</a><a class="btn o" href="#proyek">Lihat proyek</a></div>
<div>
<?php include __DIR__ . '/lanyard.php'; ?>
<p class="hint">Tarik &amp; ayun kartunya · klik untuk membalik</p>
</div>
</div>
</header>
