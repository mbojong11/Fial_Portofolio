<section id="kontak"><div class="wrap"><div class="contact rv">
<div><h2 class="d" style="font-size:44px">Ayo <em>Kolaborasi</em></h2>
<p style="color:var(--muted)">Siap berkontribusi dalam tim IT. Hubungi saya untuk peluang kerja atau proyek.</p>
<p style="color:var(--muted);font-size:14px"><?= e($p['address']) ?></p>
<a class="btn" href="mailto:<?= e($p['email']) ?>">Kirim email →</a></div>
<div>
<a class="l" href="tel:<?= e($p['phone']) ?>"><?= icon('i-tel') ?><span><b>Telepon</b> <small><?= e($p['phone']) ?></small></span></a>
<a class="l" href="mailto:<?= e($p['email']) ?>"><?= icon('i-mail') ?><span><b>Email</b> <small><?= e($p['email']) ?></small></span></a>
<?php foreach ($site['socials'] as $s): ?>
<a class="l" href="<?= e($s['url']) ?>" rel="noopener"><?= icon($s['icon']) ?><span><b><?= e($s['label']) ?></b> <small><?= e($s['handle']) ?></small></span></a>
<?php endforeach; ?>
</div>
</div></div></section>
