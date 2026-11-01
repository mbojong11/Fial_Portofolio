<?php /* Kartu ID bergantung pada tali. Fisika & render ada di assets/js/lanyard.js */ ?>
<div class="lanyard" id="lanyard">
  <canvas aria-hidden="true"></canvas>
  <div class="lcard" id="lcard" tabindex="0" role="button" aria-label="Kartu ID <?= e($p['name']) ?>. Tarik untuk mengayun, tekan Enter untuk membalik.">
    <span class="clasp" aria-hidden="true"></span>
    <div class="lc-in">
      <div class="lc-f lc-front">
        <img src="<?= asset($p['photo']) ?>" alt="Foto <?= e($p['name']) ?>" draggable="false">
        <div class="lc-meta">
          <b class="d"><?= e($p['name']) ?></b>
          <small><?= e($p['title']) ?></small>
        </div>
      </div>
      <div class="lc-f lc-back">
        <div><svg><use href="#clover"/></svg><b class="d"><?= e($p['name']) ?></b>
        <small>PHP · Laravel · MySQL</small><small>S1 Informatika · <?= (int) $p['year'] ?></small></div>
      </div>
    </div>
  </div>
</div>
