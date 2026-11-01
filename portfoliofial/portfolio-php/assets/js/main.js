/* Efek umum: reveal saat scroll, hitung angka, tilt kartu, teks mengetik */
(function () {
  var rm = window.matchMedia('(prefers-reduced-motion:reduce)').matches;

  // Hitung angka (statistik)
  function cnt(n) {
    var to = parseFloat(n.dataset.to), dec = +n.dataset.dec || 0, t0 = null;
    if (rm) { n.textContent = to.toFixed(dec); return; }
    function s(t) {
      if (!t0) t0 = t;
      var p = Math.min((t - t0) / 1200, 1);
      n.textContent = (to * (1 - Math.pow(1 - p, 3))).toFixed(dec);
      if (p < 1) requestAnimationFrame(s);
    }
    requestAnimationFrame(s);
  }

  // Reveal on scroll
  var els = document.querySelectorAll('.rv');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          e.target.querySelectorAll('.num').forEach(cnt);
          io.unobserve(e.target);
        }
      });
    }, { threshold: .15 });
    els.forEach(function (e, i) { e.style.transitionDelay = (i % 4) * .08 + 's'; io.observe(e); });
  } else {
    els.forEach(function (e) { e.classList.add('in'); e.querySelectorAll('.num').forEach(cnt); });
  }

  // Tilt 3D pada kartu (mouse)
  document.querySelectorAll('.tilt').forEach(function (el) {
    el.addEventListener('pointermove', function (e) {
      if (e.pointerType !== 'mouse' || rm) return;
      var r = el.getBoundingClientRect(),
          x = (e.clientX - r.left) / r.width - .5,
          y = (e.clientY - r.top) / r.height - .5;
      el.style.transform = 'perspective(700px) rotateX(' + (-y * 14) + 'deg) rotateY(' + (x * 14) + 'deg) translateZ(8px)';
    });
    el.addEventListener('pointerleave', function () { el.style.transform = ''; });
  });

  // Teks role mengetik (daftar role dari PHP lewat data-roles)
  var rl = document.getElementById('role');
  if (rl && !rm) {
    var roles = [];
    try { roles = JSON.parse(rl.dataset.roles || '[]'); } catch (x) {}
    if (roles.length) {
      var ri = 0, ci = 0, dl = false;
      (function tick() {
        var t = roles[ri], d = dl ? 35 : 80;
        ci += dl ? -1 : 1;
        rl.textContent = t.slice(0, ci);
        if (!dl && ci === t.length) { dl = true; d = 1500; }
        else if (dl && ci === 0) { dl = false; ri = (ri + 1) % roles.length; d = 300; }
        setTimeout(tick, d);
      })();
    }
  }
})();
