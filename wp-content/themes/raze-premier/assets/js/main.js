/* Raze Premier: interactions. No dependencies. */
/* global IntersectionObserver */

(function () {
	'use strict';

	window.razeReady = true;

	var doc = document.documentElement;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

	function $(sel, ctx) { return (ctx || document).querySelector(sel); }
	function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }
	function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }
	function vh() { return window.innerHeight || doc.clientHeight; }

	function onVisible(el, cb, opts) {
		if (!('IntersectionObserver' in window)) { cb(el); return; }
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) { cb(e.target); io.unobserve(e.target); }
			});
		}, opts || { rootMargin: '0px 0px -12% 0px', threshold: 0.05 });
		io.observe(el);
	}

	/* Scroll loop: every scroll effect registers a function here. ----- */

	var scrollers = [];
	var ticking = false;
	function runScrollers() {
		ticking = false;
		var y = window.pageYOffset;
		scrollers.forEach(function (fn) { fn(y); });
	}
	function requestScroll() { if (!ticking) { ticking = true; requestAnimationFrame(runScrollers); } }
	window.addEventListener('scroll', requestScroll, { passive: true });
	window.addEventListener('resize', requestScroll);

	/* Progress of an element through the viewport, 0 when its top meets
	   the bottom of the screen, 1 when its bottom meets the top. */
	function progressOf(el) {
		var r = el.getBoundingClientRect();
		var h = vh();
		return clamp((h - r.top) / (h + r.height), 0, 1);
	}

	/* Page ready: fires once the preloader has gone, or straight away. -- */

	var readyCallbacks = [];
	function whenReady(fn) { if (doc.classList.contains('is-ready')) { fn(); } else { readyCallbacks.push(fn); } }
	function setReady() {
		if (doc.classList.contains('is-ready')) { return; }
		doc.classList.add('is-ready');
		readyCallbacks.forEach(function (fn) { fn(); });
		readyCallbacks = [];
		requestScroll();
	}

	/* Preloader -------------------------------------------------------- */

	var pre = $('[data-preloader]');
	if (pre && !doc.classList.contains('pl-skip')) {
		var loaded = document.readyState === 'complete';
		window.addEventListener('load', function () { loaded = true; });
		var start = performance.now();
		var minTime = 2400;
		var maxTime = 5000;
		var shown = 0;
		var lit = false;

		var finish = function () {
			pre.classList.add('is-flare');
			setTimeout(function () { pre.classList.add('is-open'); setReady(); }, 320);
			setTimeout(function () { if (pre.parentNode) { pre.parentNode.removeChild(pre); } }, 1600);
		};

		var tick = function (now) {
			var t = now - start;
			var target = loaded || t > maxTime ? 100 : 90;
			var goal = Math.min(target, clamp(t / minTime, 0, 1) * 100);
			shown = Math.min(goal, shown + (goal - shown) * 0.1 + 0.2);
			// Power runs from the core up the lines first, then the eyes light.
			pre.style.setProperty('--c', clamp(shown / 30, 0, 1).toFixed(3));
			pre.style.setProperty('--g', clamp((shown - 30) / 70, 0, 1).toFixed(3));
			if (!lit && shown >= 31) { lit = true; pre.classList.add('is-lit'); }
			if (shown >= 99.5) { setTimeout(finish, 280); return; }
			requestAnimationFrame(tick);
		};

		requestAnimationFrame(tick);
	} else {
		if (pre && pre.parentNode) { pre.parentNode.removeChild(pre); }
		requestAnimationFrame(setReady);
	}

	/* Reveal on scroll ------------------------------------------------- */

	$$('[data-reveal]').forEach(function (el) {
		onVisible(el, function (t) { t.classList.add('is-in'); });
	});

	/* Dock: starts at the bottom, moves to the top on scroll ----------- */

	var dock = $('[data-dock]');
	if (dock) {
		// On the homepage the dock starts at the bottom of the screen and
		// follows the scroll up, reaching the top just before the services.
		var scrubEl = dock.hasAttribute('data-scrub') ? document.getElementById('services') : null;
		var placeDock = function (y) {
			if (!scrubEl) { dock.style.setProperty('--dy', '0px'); return; }
			var travel = vh() - dock.offsetHeight - 16 - 32;
			var end = Math.max(200, scrubEl.offsetTop - vh() * 0.25);
			var p = reduce ? (y > 40 ? 1 : 0) : clamp(y / end, 0, 1);
			var eased = p * p * (3 - 2 * p);
			dock.style.setProperty('--dy', ((1 - eased) * travel).toFixed(1) + 'px');
			dock.classList.toggle('is-down', eased < 0.5);
		};
		scrollers.push(placeDock);
		placeDock(window.pageYOffset);
		var toggle = $('[data-dock-toggle]', dock);
		var closeDock = function () { dock.classList.remove('is-open'); toggle.setAttribute('aria-expanded', 'false'); };
		toggle.addEventListener('click', function () {
			var open = !dock.classList.contains('is-open');
			dock.classList.toggle('is-open', open);
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeDock(); } });
		document.addEventListener('click', function (e) {
			if (!dock.contains(e.target) || e.target.closest('.dock-sheet a')) { closeDock(); }
		});

		var links = $$('.dock-list a');
		var byId = {};
		links.forEach(function (a) {
			var id = (a.getAttribute('href') || '').split('#')[1];
			if (id && document.getElementById(id)) { (byId[id] = byId[id] || []).push(a); }
		});
		if ('IntersectionObserver' in window) {
			var spy = new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					if (e.isIntersecting && byId[e.target.id]) {
						links.forEach(function (l) { l.classList.remove('is-current'); });
						byId[e.target.id].forEach(function (l) { l.classList.add('is-current'); });
					}
				});
			}, { rootMargin: '-45% 0px -50% 0px' });
			Object.keys(byId).forEach(function (id) { spy.observe(document.getElementById(id)); });
		}
	}

	/* Hero: rotating surface inside the headline ---------------------- */

	var surface = $('[data-surface]');
	if (surface) {
		var items = $$('[data-surface-item]', surface);
		var current = 0;
		if (!reduce && items.length > 1) {
			whenReady(function () {
				setInterval(function () {
					var prev = items[current];
					current = (current + 1) % items.length;
					prev.classList.remove('is-on');
					prev.classList.add('is-out');
					setTimeout(function () { prev.classList.remove('is-out'); }, 700);
					items[current].classList.add('is-on');
				}, 2300);
			});
		}
	}

	/* Hero: layered marks follow the pointer and the scroll ----------- */

	var hero = $('.hero');
	if (hero && !reduce) {
		if (finePointer) {
			hero.addEventListener('mousemove', function (e) {
				var r = hero.getBoundingClientRect();
				hero.style.setProperty('--mx', (((e.clientX - r.left) / r.width) * 2 - 1).toFixed(3));
				hero.style.setProperty('--my', (((e.clientY - r.top) / r.height) * 2 - 1).toFixed(3));
			});
			hero.addEventListener('mouseleave', function () {
				hero.style.setProperty('--mx', 0);
				hero.style.setProperty('--my', 0);
			});
		}
		scrollers.push(function (y) {
			if (y < vh() * 1.2) { hero.style.setProperty('--sy', y.toFixed(0)); }
		});
	}

	/* Services: the deck fans out while the stage is pinned ----------- */

	var fan = $('[data-fan]');
	if (fan && !reduce) {
		var wide = window.matchMedia('(min-width: 761px)');
		scrollers.push(function () {
			if (!wide.matches) { fan.style.setProperty('--p', 1); return; }
			var r = fan.getBoundingClientRect();
			var travel = r.height - vh();
			var p = clamp((-r.top + vh() * 0.15) / (travel * 0.7), 0, 1);
			var eased = 1 - Math.pow(1 - p, 3);
			fan.style.setProperty('--p', eased.toFixed(4));
		});
	}

	/* Work: big title slides and fills in ----------------------------- */

	var wt = $('[data-worktitle]');
	if (wt && !reduce) {
		var outline = $('.wt-outline', wt);
		scrollers.push(function () {
			var p = progressOf(wt);
			wt.style.setProperty('--tx', ((0.5 - p) * 18).toFixed(2) + 'vw');
			outline.style.setProperty('--fill', clamp((p - 0.25) / 0.4 * 100, 0, 100).toFixed(1) + '%');
		});
	}

	/* Work: cards pin and stack, earlier ones shrink back ------------- */

	var cards = $$('[data-scard]');
	if (cards.length && !reduce) {
		scrollers.push(function () {
			cards.forEach(function (card, i) {
				var next = cards[i + 1];
				if (!next) { card.style.setProperty('--s', 1); card.style.setProperty('--dim', 0); return; }
				var r = card.getBoundingClientRect();
				var n = next.getBoundingClientRect();
				// 0 while the next card is a screen away, 1 once it covers this one.
				var p = clamp(1 - (n.top - r.top) / (vh() * 0.9), 0, 1);
				card.style.setProperty('--s', (1 - p * 0.06).toFixed(4));
				card.style.setProperty('--dim', p.toFixed(3));
			});
		});
	}

	/* Big cards grow into place as they arrive ------------------------ */

	if (!reduce) {
		$$('[data-zoom]').forEach(function (el) {
			scrollers.push(function () {
				var r = el.getBoundingClientRect();
				var p = clamp((vh() - r.top) / (vh() * 0.7), 0, 1);
				el.style.setProperty('--z', (0.92 + p * 0.08).toFixed(4));
			});
		});
	}

	/* Process: run the workflow once it is on screen ------------------ */

	var flow = $('[data-flow]');
	if (flow) {
		var nodes = $$('[data-node]', flow);
		var flowLinks = $$('.flow-link', flow);
		var split = $('.flow-split', flow);
		var maxStep = 0;
		nodes.forEach(function (n) { maxStep = Math.max(maxStep, parseInt(n.style.getPropertyValue('--step'), 10) || 0); });

		var runStep = function (s) {
			nodes.forEach(function (n) {
				var ns = parseInt(n.style.getPropertyValue('--step'), 10) || 0;
				if (ns === s) { n.classList.add('is-active'); }
			});
			setTimeout(function () {
				nodes.forEach(function (n) {
					var ns = parseInt(n.style.getPropertyValue('--step'), 10) || 0;
					if (ns === s) { n.classList.remove('is-active'); n.classList.add('is-done'); }
				});
				flowLinks.forEach(function (l) {
					if ((parseInt(l.style.getPropertyValue('--step'), 10) || 0) === s) { l.classList.add('is-on'); }
				});
				if (split && s === maxStep - 1) { split.classList.add('is-on'); }
				if (s < maxStep) { setTimeout(function () { runStep(s + 1); }, 260); }
			}, reduce ? 0 : 820);
		};
		onVisible(flow, function () { runStep(0); }, { rootMargin: '0px 0px -25% 0px', threshold: 0.2 });
	}

	/* Results: curve, counters and the quote that lights up ----------- */

	var curve = $('[data-curve]');
	if (curve) { onVisible(curve, function (c) { c.classList.add('is-in'); }, { threshold: 0 }); }

	$$('[data-count]').forEach(function (el) {
		var end = parseFloat(el.getAttribute('data-count'));
		if (isNaN(end) || reduce) { return; }
		el.textContent = '0';
		onVisible(el, function () {
			var t0 = performance.now();
			var dur = 1200;
			var step = function (now) {
				var p = clamp((now - t0) / dur, 0, 1);
				el.textContent = String(Math.round(end * (1 - Math.pow(1 - p, 3))));
				if (p < 1) { requestAnimationFrame(step); }
			};
			requestAnimationFrame(step);
		});
	});

	$$('[data-words]').forEach(function (block) {
		var p = $('p', block) || block;
		var words = p.textContent.trim().split(/\s+/);
		var accent = /^(find|you,|followed)/i;
		p.innerHTML = '';
		words.forEach(function (w, i) {
			var span = document.createElement('span');
			span.className = 'w' + (accent.test(w) ? ' is-accent' : '');
			span.textContent = w;
			p.appendChild(span);
			if (i < words.length - 1) { p.appendChild(document.createTextNode(' ')); }
		});
		var spans = $$('.w', p);
		if (reduce) { spans.forEach(function (s) { s.classList.add('is-lit'); }); return; }
		scrollers.push(function () {
			var r = block.getBoundingClientRect();
			var h = vh();
			var prog = clamp((h * 0.85 - r.top) / (r.height + h * 0.35), 0, 1);
			var lit = Math.round(prog * spans.length);
			spans.forEach(function (s, i) { s.classList.toggle('is-lit', i < lit); });
		});
	});

	/* Footer word rises into place ----------------------------------- */

	var fw = $('[data-footword] .fw-raze');
	if (fw && !reduce) {
		scrollers.push(function () {
			var p = progressOf(fw.parentNode);
			var q = clamp((p - 0.05) * 2.2, 0, 1);
			fw.style.setProperty('--fy', ((1 - q) * 35).toFixed(1) + '%');
			fw.style.setProperty('--fo', (0.2 + q * 0.8).toFixed(3));
		});
	}

	/* Pointer niceties ----------------------------------------------- */

	if (finePointer && !reduce) {
		$$('[data-magnetic]').forEach(function (btn) {
			btn.addEventListener('mousemove', function (e) {
				var r = btn.getBoundingClientRect();
				var x = (e.clientX - r.left - r.width / 2) * 0.18;
				var y = (e.clientY - r.top - r.height / 2) * 0.28;
				btn.style.transform = 'translate(' + x.toFixed(1) + 'px,' + y.toFixed(1) + 'px)';
			});
			btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
		});

		$$('[data-tilt]').forEach(function (card) {
			card.addEventListener('mousemove', function (e) {
				var r = card.getBoundingClientRect();
				var x = (e.clientX - r.left) / r.width - 0.5;
				var y = (e.clientY - r.top) / r.height - 0.5;
				card.style.transform = 'perspective(900px) rotateX(' + (-y * 6).toFixed(2) + 'deg) rotateY(' + (x * 8).toFixed(2) + 'deg) translateY(-4px)';
			});
			card.addEventListener('mouseleave', function () { card.style.transform = ''; });
		});
	}

	/* Contact form: keep the traffic source with the enquiry ---------- */

	try {
		var key = 'raze_src';
		if (!sessionStorage.getItem(key)) {
			var params = new URLSearchParams(location.search);
			var parts = [];
			['utm_source', 'utm_medium', 'utm_campaign', 'gclid', 'fbclid'].forEach(function (k) {
				if (params.get(k)) { parts.push(k + '=' + params.get(k)); }
			});
			if (document.referrer && document.referrer.indexOf(location.host) === -1) { parts.push('ref=' + document.referrer); }
			sessionStorage.setItem(key, parts.join('&') || 'direct');
		}
		var srcField = $('[data-src]');
		if (srcField) { srcField.value = sessionStorage.getItem(key).slice(0, 250); }
	} catch (err) { /* storage unavailable */ }

	var status = $('[data-status]');
	if (status) {
		setTimeout(function () { status.focus({ preventScroll: true }); }, 300);
		if (window.history && history.replaceState) { history.replaceState(null, '', location.pathname + location.hash); }
	}

	$$('[data-to-top]').forEach(function (a) {
		a.addEventListener('click', function (e) {
			e.preventDefault();
			window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
		});
	});

	requestScroll();
})();
