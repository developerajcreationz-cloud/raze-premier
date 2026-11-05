/**
 * Raze Premier front end. No dependencies.
 */
(function () {
	'use strict';

	window.razeReady = true;

	var doc = document.documentElement;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	function $(sel, ctx) { return (ctx || document).querySelector(sel); }
	function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

	function onVisible(el, cb, opts) {
		if (!('IntersectionObserver' in window)) { cb(el); return; }
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) { cb(e.target); io.unobserve(e.target); }
			});
		}, opts || { rootMargin: '0px 0px -12% 0px', threshold: 0.12 });
		io.observe(el);
	}

	/* Header ------------------------------------------------------------ */

	var header = $('[data-header]');
	var toggle = $('[data-nav-toggle]');
	var nav = $('[data-nav]');

	function setScrolled() {
		if (header) { header.classList.toggle('is-scrolled', window.scrollY > 24); }
	}
	setScrolled();
	window.addEventListener('scroll', setScrolled, { passive: true });

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

	// Highlight the nav link for the section in view.
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

	/* Reveal ------------------------------------------------------------ */

	$$('[data-reveal]').forEach(function (el) {
		onVisible(el, function (t) { t.classList.add('is-in'); });
	});

	/* Hero: rotating place --------------------------------------------- */

	var swap = $('[data-swap]');
	if (swap) {
		var words = $$('.swap-word', swap);
		var idx = 0;
		var padX = function () {
			var cs = getComputedStyle(swap);
			return parseFloat(cs.paddingLeft) + parseFloat(cs.paddingRight);
		};
		var fit = function () { swap.style.width = (words[idx].offsetWidth + padX()) + 'px'; };
		fit();
		if (document.fonts && document.fonts.ready) { document.fonts.ready.then(fit); }
		window.addEventListener('resize', fit);

		if (!reduce && words.length > 1) {
			setInterval(function () {
				if (document.hidden) { return; }
				var cur = words[idx];
				idx = (idx + 1) % words.length;
				var next = words[idx];
				cur.classList.remove('is-on');
				cur.classList.add('is-out');
				next.classList.remove('is-out');
				next.classList.add('is-on');
				fit();
				setTimeout(function () { cur.classList.remove('is-out'); }, 650);
			}, 2400);
		}
	}

	/* Count up ---------------------------------------------------------- */

	function countUp(el) {
		var end = parseInt(el.getAttribute('data-count'), 10) || 0;
		if (reduce) { el.textContent = end; return; }
		var start = null;
		var dur = 1400;
		function step(ts) {
			if (!start) { start = ts; }
			var p = Math.min((ts - start) / dur, 1);
			var eased = 1 - Math.pow(1 - p, 3);
			el.textContent = Math.round(end * eased);
			if (p < 1) { requestAnimationFrame(step); }
		}
		requestAnimationFrame(step);
	}

	var report = $('[data-report]');
	if (report) {
		onVisible(report, function (r) {
			setTimeout(function () {
				r.classList.add('is-live');
				$$('[data-count]', r).forEach(countUp);
			}, reduce ? 0 : 450);
		}, { threshold: 0.2 });
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
		function typeQuery() {
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
		}

		var streamEl = $('[data-stream]', demo);
		var streamHTML = streamEl ? streamEl.innerHTML : '';
		var streamTimer = null;
		function streamAnswer() {
			if (!streamEl || reduce) { return; }
			clearTimeout(streamTimer);
			var tmp = document.createElement('div');
			tmp.innerHTML = streamHTML;
			// Split into tokens, keeping <strong> runs whole.
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
		}

		function select(n, fromUser) {
			current = n;
			buttons.forEach(function (b, i) {
				var on = i === n;
				b.classList.toggle('is-on', on);
				b.setAttribute('aria-selected', on ? 'true' : 'false');
				b.tabIndex = on ? 0 : -1;
				var pane = document.getElementById(b.getAttribute('aria-controls'));
				if (pane) {
					pane.hidden = !on;
					pane.classList.toggle('is-on', on);
				}
				// restart the progress animation
				var bar = $('.mode-progress', b);
				if (bar) { bar.style.animation = 'none'; void bar.offsetWidth; bar.style.animation = ''; }
			});
			if (buttons[n].getAttribute('data-mode') === 'geo') { streamAnswer(); }
			schedule();
			if (fromUser) { buttons[n].focus(); }
		}

		function schedule() {
			clearTimeout(timer);
			if (reduce || !inView || hovering) { return; }
			timer = setTimeout(function () { select((current + 1) % buttons.length); }, DURATION);
		}

		buttons.forEach(function (b, i) {
			b.addEventListener('click', function () { select(i); });
			b.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowDown' || e.key === 'ArrowRight') { e.preventDefault(); select((i + 1) % buttons.length, true); }
				if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') { e.preventDefault(); select((i - 1 + buttons.length) % buttons.length, true); }
			});
		});
		buttons.forEach(function (b, i) { b.tabIndex = i === 0 ? 0 : -1; });

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
		var ticking = false;
		var update = function () {
			ticking = false;
			var r = steps.getBoundingClientRect();
			var vh = window.innerHeight;
			var p = (vh * 0.8 - r.top) / (r.height + vh * 0.3);
			p = Math.max(0, Math.min(1, p));
			fill.style.setProperty('--p', reduce ? 1 : p.toFixed(3));
		};
		window.addEventListener('scroll', function () {
			if (!ticking) { ticking = true; requestAnimationFrame(update); }
		}, { passive: true });
		window.addEventListener('resize', update);
		update();
	}

	/* Contact form ------------------------------------------------------ */

	// Remember where the visitor first came from, for the lead record.
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

	// Clicking a service arrow pre-ticks it in the form.
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
		if (window.history && history.replaceState) {
			history.replaceState(null, '', location.pathname + location.hash);
		}
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
			if (used > 0) {
				word.style.fontSize = (parseFloat(cs.fontSize) * (avail / used) * 0.995) + 'px';
			}
		};
		if (document.fonts && document.fonts.ready) { document.fonts.ready.then(fitWord); } else { fitWord(); }
		window.addEventListener('resize', fitWord);
	}

	/* Back to top ------------------------------------------------------- */

	$$('[data-to-top]').forEach(function (a) {
		a.addEventListener('click', function (e) {
			e.preventDefault();
			window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
		});
	});
})();
