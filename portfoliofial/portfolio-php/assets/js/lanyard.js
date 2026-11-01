/* Kartu ID bergantung pada tali — fisika verlet, tanpa library.
   Tarik kartunya, lepas, dan ia akan mengayun. Klik (tanpa geser) untuk membalik. */
(function () {
  var stage = document.getElementById('lanyard');
  if (!stage) return;
  var canvas = stage.querySelector('canvas'),
      ctx = canvas.getContext('2d'),
      card = document.getElementById('lcard'),
      inner = card.querySelector('.lc-in'),
      rm = window.matchMedia('(prefers-reduced-motion:reduce)').matches;

  var ROPE = 6, GRAV = 0.55, DAMP = 0.993, MASS_CARD = 6, ITER = 18;
  var W = 0, H = 0, dpr = 1, cw = 0, ch = 0, segLen = 0, half = 0, maxReach = 0;
  var pts = [], drag = null, flipped = false, running = false, visible = true, last = 0, acc = 0;

  function mk(x, y, m) { return { x: x, y: y, px: x, py: y, im: m === 0 ? 0 : 1 / m }; }
  function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }

  function build() {
    var r = stage.getBoundingClientRect();
    W = r.width; H = r.height;
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width = Math.round(W * dpr); canvas.height = Math.round(H * dpr);
    cw = card.offsetWidth; ch = card.offsetHeight;

    var ropeLen = clamp(H - ch - 80, 110, 250);
    segLen = ropeLen / ROPE; half = ch / 2;
    maxReach = (ROPE * segLen + half) * 0.995;

    var ax = W / 2, ay = -24;
    pts = [mk(ax, ay, 0)];
    for (var i = 1; i <= ROPE; i++) pts.push(mk(ax, ay + i * segLen, 1));
    var cy = ay + ROPE * segLen + half;
    var t = mk(ax + (rm ? 0 : 120), cy - (rm ? 0 : 40), MASS_CARD);   // dorong sedikit agar mengayun saat dibuka
    pts.push(t);
    if (rm) { for (var k = 0; k < 240; k++) step(); }
    draw();
  }

  function step() {
    var n = pts.length, T = pts[n - 1], i, p;
    for (i = 1; i < n; i++) {
      p = pts[i];
      if (drag && i === n - 1) continue;
      var vx = (p.x - p.px) * DAMP, vy = (p.y - p.py) * DAMP;
      p.px = p.x; p.py = p.y; p.x += vx; p.y += vy + GRAV;
    }
    if (drag) {
      T.px = T.x; T.py = T.y;
      T.x += (drag.x - T.x) * 0.5; T.y += (drag.y - T.y) * 0.5;
    }
    var saved = T.im; if (drag) T.im = 0;
    for (var k = 0; k < ITER; k++) {
      for (i = 0; i < n - 1; i++) {
        var a = pts[i], b = pts[i + 1], L = (i === n - 2) ? half : segLen;
        var dx = b.x - a.x, dy = b.y - a.y, d = Math.sqrt(dx * dx + dy * dy) || 0.0001;
        var w = a.im + b.im; if (w === 0) continue;
        var f = (d - L) / d / w;
        a.x += dx * f * a.im; a.y += dy * f * a.im;
        b.x -= dx * f * b.im; b.y -= dy * f * b.im;
      }
    }
    T.im = saved;
    for (i = 1; i < n; i++) {
      pts[i].x = i === n - 1 ? clamp(pts[i].x, cw * 0.75, W - cw * 0.75) : clamp(pts[i].x, 10, W - 10);
      if (i === n - 1) pts[i].y = clamp(pts[i].y, 0, H - ch * 0.5 - 6);
    }
  }

  function drawStrap() {
    var i, n = ROPE;
    ctx.lineJoin = 'round'; ctx.lineCap = 'butt';
    ctx.beginPath(); ctx.moveTo(pts[0].x, pts[0].y);
    for (i = 1; i < n; i++) ctx.quadraticCurveTo(pts[i].x, pts[i].y, (pts[i].x + pts[i + 1].x) / 2, (pts[i].y + pts[i + 1].y) / 2);
    ctx.lineTo(pts[n].x, pts[n].y);
    ctx.strokeStyle = '#e11d2e'; ctx.lineWidth = 30; ctx.stroke();
    ctx.strokeStyle = '#0b0b0d'; ctx.lineWidth = 26; ctx.stroke();

    // tulisan di sepanjang tali
    var cum = [0];
    for (i = 1; i <= n; i++) cum[i] = cum[i - 1] + Math.hypot(pts[i].x - pts[i - 1].x, pts[i].y - pts[i - 1].y);
    var d = 46, k = 0, j;
    ctx.textAlign = 'center'; ctx.textBaseline = 'middle';
    ctx.font = '700 11px "Space Grotesk",system-ui,sans-serif';
    try { ctx.letterSpacing = '2px'; } catch (e) {}
    while (d < cum[n] - 26) {
      for (j = 0; j < n - 1 && cum[j + 1] < d; j++);
      var t = (d - cum[j]) / ((cum[j + 1] - cum[j]) || 1);
      var x = pts[j].x + (pts[j + 1].x - pts[j].x) * t, y = pts[j].y + (pts[j + 1].y - pts[j].y) * t;
      var ang = Math.atan2(pts[j + 1].y - pts[j].y, pts[j + 1].x - pts[j].x);
      ctx.save(); ctx.translate(x, y); ctx.rotate(ang);
      ctx.fillStyle = k % 2 ? '#e11d2e' : '#f4f4f5';
      ctx.fillText(k % 2 ? '✦' : 'FILLIAL', 0, 0);
      ctx.restore();
      d += k % 2 ? 40 : 64; k++;
    }
    try { ctx.letterSpacing = '0px'; } catch (e) {}
  }

  function draw() {
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    ctx.clearRect(0, 0, W, H);
    drawStrap();
    var C = pts[ROPE], T = pts[ROPE + 1];
    var a = Math.atan2(-(T.x - C.x), T.y - C.y);
    card.style.transform = 'translate(' + (C.x - cw / 2).toFixed(2) + 'px,' + C.y.toFixed(2) + 'px) rotate(' + a.toFixed(4) + 'rad)';
  }

  function loop(t) {
    if (!visible || rm) { running = false; return; }
    var dt = Math.min((t - last) / 1000, 0.05); last = t; acc += dt;
    var c = 0;
    while (acc >= 1 / 60 && c < 4) { step(); acc -= 1 / 60; c++; }
    draw();
    requestAnimationFrame(loop);
  }
  function start() {
    if (running || rm) return;
    running = true; last = performance.now(); acc = 0;
    requestAnimationFrame(loop);
  }

  // ----- interaksi -----
  function local(e) { var r = stage.getBoundingClientRect(); return { x: e.clientX - r.left, y: e.clientY - r.top }; }
  function target(e) {
    var p = local(e), ax = pts[0].x, ay = pts[0].y;
    var x = p.x + drag.ox, y = p.y + drag.oy, dx = x - ax, dy = y - ay, d = Math.hypot(dx, dy);
    if (d > maxReach) { x = ax + dx / d * maxReach; y = ay + dy / d * maxReach; }
    drag.x = x; drag.y = y;
  }
  function flip() {
    flipped = !flipped;
    inner.style.transform = 'perspective(900px) rotateY(' + (flipped ? 180 : 0) + 'deg)';
  }

  card.addEventListener('pointerdown', function (e) {
    if (rm) return;
    var T = pts[pts.length - 1], p = local(e);
    drag = { x: T.x, y: T.y, ox: T.x - p.x, oy: T.y - p.y, sx: e.clientX, sy: e.clientY, moved: false };
    card.classList.add('grab');
    try { card.setPointerCapture(e.pointerId); } catch (x) {}
    start();
  });
  card.addEventListener('pointermove', function (e) {
    if (!drag) return;
    if (Math.hypot(e.clientX - drag.sx, e.clientY - drag.sy) > 6) drag.moved = true;
    target(e);
  });
  function release() {
    if (!drag) return;
    var wasClick = !drag.moved;
    drag = null; card.classList.remove('grab');
    if (wasClick) flip();
  }
  card.addEventListener('pointerup', release);
  card.addEventListener('pointercancel', function () { if (drag) { drag.moved = true; } release(); });
  card.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); flip(); }
  });

  // ----- lifecycle -----
  build();
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (es) {
      visible = es[0].isIntersecting;
      if (visible) start();
    }, { threshold: 0.05 }).observe(stage);
  }
  start();

  var lastW = stage.clientWidth, rt;
  window.addEventListener('resize', function () {
    clearTimeout(rt);
    rt = setTimeout(function () {
      if (Math.abs(stage.clientWidth - lastW) > 4) { lastW = stage.clientWidth; build(); }
    }, 150);
  });
})();
