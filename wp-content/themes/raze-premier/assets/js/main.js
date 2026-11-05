/**
 * Raze Premier front end. No dependencies.
 */
(function () {
	'use strict';

	window.razeReady = true;

	var doc = document.documentElement;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

	function $(sel, ctx) { return (ctx || document).querySelector(sel); }
	function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }
	function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }

	function onVisible(el, cb, opts) {
		if (!('IntersectionObserver' in window)) { cb(el); return; }
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) { cb(e.target); io.unobserve(e.target); }
			});
		}, opts || { rootMargin: '0px 0px -10% 0px', threshold: 0.12 });
		io.observe(el);
	}

	// One scroll loop for everything that follows the scroll position.
	var scrollers = [];
	var ticking = false;
	function runScrollers() {
		ticking = false;
		var y = window.scrollY;
		scrollers.forEach(function (fn) { fn(y); });
	}
	function requestScroll() { if (!ticking) { ticking = true; requestAnimationFrame(runScrollers); } }
	window.addEventListener('scroll', requestScroll, { passive: true });
	window.addEventListener('resize', requestScroll);

	/* Split headings into words ---------------------------------------- */

	function splitWords(el) {
		var i = 0;
		function wrapText(text, parent) {
			text.split(/(\s+)/).forEach(function (part) {
				if (!part) { return; }
				if (/^\s+$/.test(part)) { parent.appendChild(document.createTextNode(' ')); return; }
				var w = document.createElement('span');
				w.className = 'w';
				var inner = document.createElement('span');
				inner.textContent = part;
				inner.style.setProperty('--i', i++);
				w.appendChild(inner);
				parent.appendChild(w);
			});
		}
		var nodes = Array.prototype.slice.call(el.childNodes);
		el.textContent = '';
		nodes.forEach(function (n) {
			if (n.nodeType === 3) { wrapText(n.textContent, el); }
			else if (n.nodeName === 'BR') { el.appendChild(n); }
			else {
				var clone = n.cloneNode(false);
				wrapText(n.textContent, clone);
				el.appendChild(clone);
			}
		});
		el.setAttribute('aria-label', el.textContent.replace(/\s+/g, ' ').trim());
	}

	$$('[data-split]').forEach(function (el) {
		if (!reduce) { splitWords(el); }
		if (el.closest('.hero')) {
			el.style.setProperty('--d0', '0.2s');
			requestAnimationFrame(function () { requestAnimationFrame(function () { el.classList.add('is-in'); }); });
		} else {
			onVisible(el, function (t) { t.classList.add('is-in'); });
		}
	});

	/* Reveal ------------------------------------------------------------ */

	$$('[data-reveal]').forEach(function (el) {
		if (el.closest('.hero')) {
			requestAnimationFrame(function () { el.classList.add('is-in'); });
			return;
		}
		onVisible(el, function (t) { t.classList.add('is-in'); });
	});

	/* Header ------------------------------------------------------------ */

	var header = $('[data-header]');
	var toggle = $('[data-nav-toggle]');
	var nav = $('[data-nav]');
	var lastY = window.scrollY;

	if (header) {
		scrollers.push(function (y) {
			header.classList.toggle('is-scrolled', y > 24);
			var goingDown = y > lastY + 4;
			var goingUp = y < lastY - 4;
			if (!doc.classList.contains('nav-open')) {
				if (goingDown && y > window.innerHeight * 0.9) { header.classList.add('is-hidden'); }
				if (goingUp || y < 200) { header.classList.remove('is-hidden'); }
			}
			lastY = y;
		});
	}

	function closeNav() {
		doc.classList.remove('nav-open');
		if (toggle) { toggle.setAttribute('aria-expanded', 'false'); }
	}
	if (toggle) {
		toggle.addEventListener('click', function () {
			var open = doc.classList.toggle('nav-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeNav(); } });
	}
	if (nav) {
		nav.addEventListener('click', function (e) { if (e.target.closest('a')) { closeNav(); } });
	}

	var navLinks = $$('.nav-list a[href*="#"]');
	if (navLinks.length && 'IntersectionObserver' in window) {
		var byId = {};
		navLinks.forEach(function (a) {
			var id = a.getAttribute('href').split('#')[1];
			if (id && document.getElementById(id)) { byId[id] = a; }
		});
		var spy = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				var link = byId[e.target.id];
				if (link && e.isIntersecting) {
					navLinks.forEach(function (l) { l.classList.remove('is-current'); });
					link.classList.add('is-current');
				}
			});
		}, { rootMargin: '-45% 0px -50% 0px' });
		Object.keys(byId).forEach(function (id) { spy.observe(document.getElementById(id)); });
	}

	/* Hero: zoom-in on load, parallax on scroll ------------------------- */

	var heroMedia = $('[data-hero-media]');
	var hero = $('[data-hero]');
	if (heroMedia && hero) {
		var start = function () {
			doc.classList.add('is-loaded');
			setTimeout(function () { doc.classList.add('is-settled'); }, 2300);
		};
		var img = $('img', heroMedia);
		if (img && !img.complete) { img.addEventListener('load', start); img.addEventListener('error', start); setTimeout(start, 1500); }
		else { requestAnimationFrame(start); }

		if (!reduce) {
			var floaters = $$('[data-float]', hero);
			scrollers.push(function (y) {
				var h = hero.offsetHeight;
				if (y > h) { return; }
				heroMedia.style.setProperty('--py', (y * 0.22).toFixed(1) + 'px');
				floaters.forEach(function (f) { f.style.transform = 'translateY(' + (-y * 0.12).toFixed(1) + 'px)'; });
			});
		}
	}

	/* Magnetic buttons -------------------------------------------------- */

	if (finePointer && !reduce) {
		$$('[data-magnetic]').forEach(function (btn) {
			btn.addEventListener('mousemove', function (e) {
				var r = btn.getBoundingClientRect();
				var x = (e.clientX - r.left - r.width / 2) * 0.22;
				var y = (e.clientY - r.top - r.height / 2) * 0.32;
				btn.style.transform = 'translate(' + x.toFixed(1) + 'px,' + y.toFixed(1) + 'px)';
			});
			btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
		});

		// Service cards lean slightly toward the pointer.
		$$('[data-tilt]').forEach(function (card) {
			card.addEventListener('mousemove', function (e) {
				var r = card.getBoundingClientRect();
				var px = (e.clientX - r.left) / r.width - 0.5;
				var py = (e.clientY - r.top) / r.height - 0.5;
				card.style.setProperty('--ry', (px * 4).toFixed(2) + 'deg');
				card.style.setProperty('--rx', (-py * 4).toFixed(2) + 'deg');
			});
			card.addEventListener('mouseleave', function () {
				card.style.setProperty('--ry', '0deg');
				card.style.setProperty('--rx', '0deg');
			});
		});
	}

	/* Showcase: image opens to full width while pinned ------------------ */

	var showcase = $('[data-showcase]');
	if (showcase && !reduce) {
		var frame = $('[data-showcase-frame]', showcase);
		scrollers.push(function () {
			var r = showcase.getBoundingClientRect();
			var total = showcase.offsetHeight - window.innerHeight;
			if (r.bottom < 0 || r.top > window.innerHeight) { return; }
			var p = clamp(-r.top / total, 0, 1);
			var open = clamp(p / 0.6, 0, 1);
			var eased = 1 - Math.pow(1 - open, 3);
			var small = window.innerWidth < 700;
			frame.style.setProperty('--ct', ((small ? 26 : 20) * (1 - eased)).toFixed(2) + '%');
			frame.style.setProperty('--cx', ((small ? 8 : 24) * (1 - eased)).toFixed(2) + '%');
			frame.style.setProperty('--cr', (28 * (1 - eased)).toFixed(1) + 'px');
			frame.style.setProperty('--is', (1.25 - 0.25 * eased).toFixed(3));
			frame.style.setProperty('--so', eased.toFixed(3));
			var t = clamp((p - 0.45) / 0.3, 0, 1);
			showcase.style.setProperty('--to', t.toFixed(3));
		});
	}

	/* Ticker: drifts on its own, speeds up with scroll ------------------ */

	var ticker = $('[data-ticker]');
	var track = $('[data-ticker-track]');
	if (ticker && track && !reduce) {
		var row = $('.ticker-row', track);
		var x = 0;
		var boost = 0;
		var visible = false;
		var prevY = window.scrollY;
		scrollers.push(function (y) {
			boost += (y - prevY) * 0.35;
			prevY = y;
		});
		if ('IntersectionObserver' in window) {
			new IntersectionObserver(function (es) { visible = es[0].isIntersecting; if (visible) { loop(); } }, { threshold: 0 }).observe(ticker);
		}
		var running = false;
		function loop() {
			if (running) { return; }
			running = true;
			(function frame() {
				if (!visible) { running = false; return; }
				var w = row.offsetWidth;
				x -= 0.8 + boost;
				boost *= 0.9;
				if (x <= -w) { x += w; }
				if (x > 0) { x -= w; }
				track.style.setProperty('--tx', x.toFixed(1) + 'px');
				requestAnimationFrame(frame);
			})();
		}
	}

	/* AI search modes --------------------------------------------------- */

	var modes = $('[data-modes]');
	var demo = $('[data-demo]');
	if (modes && demo) {
		var buttons = $$('[data-mode]', modes);
		var current = 0;
		var timer = null;
		var DURATION = 7000;
		var inView = false;
		var hovering = false;
		modes.style.setProperty('--mode-ms', DURATION + 'ms');

		var typeEl = $('[data-type]', demo);
		var typed = false;
		var typeQuery = function () {
			if (typed || !typeEl || reduce) { return; }
			typed = true;
			var full = typeEl.getAttribute('data-type');
			var i = 0;
			typeEl.textContent = '';
			typeEl.classList.add('is-typing');
			(function tick() {
				i++;
				typeEl.textContent = full.slice(0, i);
				if (i < full.length) { setTimeout(tick, 28 + Math.random() * 40); }
				else { setTimeout(function () { typeEl.classList.remove('is-typing'); }, 900); }
			})();
		};

		var streamEl = $('[data-stream]', demo);
		var streamHTML = streamEl ? streamEl.innerHTML : '';
		var streamTimer = null;
		var streamAnswer = function () {
			if (!streamEl || reduce) { return; }
			clearTimeout(streamTimer);
			var tmp = document.createElement('div');
			tmp.innerHTML = streamHTML;
			var tokens = [];
			Array.prototype.forEach.call(tmp.childNodes, function (n) {
				if (n.nodeType === 3) {
					n.textContent.split(/(\s+)/).forEach(function (t) { if (t) { tokens.push(t.replace(/&/g, '&amp;').replace(/</g, '&lt;')); } });
				} else {
					tokens.push(n.outerHTML);
				}
			});
			var i = 0;
			streamEl.innerHTML = '';
			(function tick() {
				i += 2;
				streamEl.innerHTML = tokens.slice(0, i).join('');
				if (i < tokens.length) { streamTimer = setTimeout(tick, 55); }
			})();
		};

		var schedule = function () {
			clearTimeout(timer);
			if (reduce || !inView || hovering) { return; }
			timer = setTimeout(function () { select((current + 1) % buttons.length); }, DURATION);
		};

		var select = function (n, fromUser) {
			current = n;
			buttons.forEach(function (b, i) {
				var on = i === n;
				b.classList.toggle('is-on', on);
				b.setAttribute('aria-selected', on ? 'true' : 'false');
				b.tabIndex = on ? 0 : -1;
				var pane = document.getElementById(b.getAttribute('aria-controls'));
				if (pane) { pane.hidden = !on; pane.classList.toggle('is-on', on); }
				var bar = $('.mode-progress', b);
				if (bar) { bar.style.animation = 'none'; void bar.offsetWidth; bar.style.animation = ''; }
			});
			if (buttons[n].getAttribute('data-mode') === 'geo') { streamAnswer(); }
			schedule();
			if (fromUser) { buttons[n].focus(); }
		};

		buttons.forEach(function (b, i) {
			b.tabIndex = i === 0 ? 0 : -1;
			b.addEventListener('click', function () { select(i); });
			b.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowDown' || e.key === 'ArrowRight') { e.preventDefault(); select((i + 1) % buttons.length, true); }
				if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') { e.preventDefault(); select((i - 1 + buttons.length) % buttons.length, true); }
			});
		});

		modes.addEventListener('mouseenter', function () { hovering = true; modes.classList.add('is-paused'); clearTimeout(timer); });
		modes.addEventListener('mouseleave', function () { hovering = false; modes.classList.remove('is-paused'); select(current); });

		if ('IntersectionObserver' in window) {
			new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					inView = e.isIntersecting;
					if (inView) { typeQuery(); select(current); } else { clearTimeout(timer); }
				});
			}, { threshold: 0.35 }).observe(demo);
		}
	}

	/* Work galleries ---------------------------------------------------- */

	$$('[data-case]').forEach(function (c) {
		var imgs = $$('.case-img', c);
		var thumbs = $$('[data-thumb]', c);
		function show(n) {
			imgs.forEach(function (im, i) { im.classList.toggle('is-on', i === n); });
			thumbs.forEach(function (t, i) {
				t.classList.toggle('is-on', i === n);
				t.setAttribute('aria-pressed', i === n ? 'true' : 'false');
			});
		}
		thumbs.forEach(function (t, i) {
			t.addEventListener('click', function () { show(i); });
			t.addEventListener('mouseenter', function () { show(i); });
		});
	});

	/* Process line ------------------------------------------------------ */

	var steps = $('[data-steps]');
	var fill = $('[data-steps-fill]');
	if (steps && fill) {
		scrollers.push(function () {
			var r = steps.getBoundingClientRect();
			var vh = window.innerHeight;
			var p = clamp((vh * 0.8 - r.top) / (r.height + vh * 0.3), 0, 1);
			fill.style.setProperty('--p', reduce ? 1 : p.toFixed(3));
		});
	}

	/* Footer wordmark: scale to fill the width ------------------------- */

	var word = $('.footer-word');
	if (word) {
		var fitWord = function () {
			word.style.fontSize = '';
			var cs = getComputedStyle(word);
			var avail = word.clientWidth - parseFloat(cs.paddingLeft) - parseFloat(cs.paddingRight);
			var spans = $$('span', word);
			var column = cs.flexDirection === 'column';
			var used = 0;
			spans.forEach(function (sp) {
				var w = sp.getBoundingClientRect().width;
				used = column ? Math.max(used, w) : used + w;
			});
			if (!column && spans.length > 1) { used += parseFloat(cs.columnGap || cs.gap) || 0; }
			if (used > 0) { word.style.fontSize = (parseFloat(cs.fontSize) * (avail / used) * 0.995) + 'px'; }
		};
		if (document.fonts && document.fonts.ready) { document.fonts.ready.then(fitWord); } else { fitWord(); }
		window.addEventListener('resize', fitWord);
	}

	/* Contact form ------------------------------------------------------ */

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

	$$('[data-service]').forEach(function (a) {
		a.addEventListener('click', function () {
			var name = a.getAttribute('data-service');
			$$('.pick-item input').forEach(function (input) {
				if (input.value === name) { input.checked = true; }
			});
		});
	});

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

	runScrollers();
})();
