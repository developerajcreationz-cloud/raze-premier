<?php
/**
 * Preloader, no text. A small power core lights up, energy runs up two thin
 * lines, two angled eye slits stutter on, and their glow builds with the
 * page load. At full power they flare and the screen opens like eyelids to
 * reveal the site. Runs on every load of the homepage, skipped for people
 * who prefer reduced motion, never shown without JavaScript.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_eyes = '<polygon points="22,34 170,60 160,94 38,74"/><polygon points="378,34 230,60 240,94 362,74"/>';
?>
<script>try{if(window.matchMedia('(prefers-reduced-motion: reduce)').matches){document.documentElement.classList.add('pl-skip');}}catch(e){}</script>
<div class="preloader" data-preloader aria-hidden="true">
	<div class="pl-lid pl-lid-top"></div>
	<div class="pl-lid pl-lid-bottom"></div>
	<div class="pl-stage">
		<div class="pl-halo"></div>
		<svg class="pl-eyes" viewBox="0 0 400 270">
			<defs>
				<linearGradient id="pl-eye" x1="0" y1="0" x2="0" y2="1">
					<stop offset="0" stop-color="#ffffff"/>
					<stop offset=".6" stop-color="#ece4ff"/>
					<stop offset="1" stop-color="#b48cff"/>
				</linearGradient>
				<filter id="pl-blur-lg" x="-50%" y="-200%" width="200%" height="500%"><feGaussianBlur stdDeviation="16"/></filter>
				<filter id="pl-blur-sm" x="-50%" y="-200%" width="200%" height="500%"><feGaussianBlur stdDeviation="5"/></filter>
			</defs>

			<g class="pl-traces" fill="none" stroke-linecap="round" stroke-linejoin="round">
				<path class="pl-trace-bg" d="M200 206V150L132 104M200 150L268 104" stroke="#2a1c4d" stroke-width="2"/>
				<path class="pl-trace" d="M200 206V150L132 104" stroke="#b48cff" stroke-width="2" pathLength="1"/>
				<path class="pl-trace" d="M200 206V150L268 104" stroke="#b48cff" stroke-width="2" pathLength="1"/>
			</g>

			<g class="pl-core-wrap">
				<circle class="pl-core-glow" cx="200" cy="226" r="26" fill="#7b3ff2" filter="url(#pl-blur-lg)"/>
				<circle cx="200" cy="226" r="20" fill="none" stroke="#3a2670" stroke-width="2"/>
				<circle class="pl-core-ring" cx="200" cy="226" r="20" fill="none" stroke="#c9b0ff" stroke-width="2.5" pathLength="1" transform="rotate(-90 200 226)"/>
				<circle class="pl-core-dot" cx="200" cy="226" r="8" fill="#fff"/>
			</g>

			<g class="pl-eye-set">
				<g class="pl-eye-off" fill="#1b1430"><?php echo $raze_eyes; // phpcs:ignore ?></g>
				<g class="pl-glow-lg" fill="#7b3ff2" filter="url(#pl-blur-lg)"><?php echo $raze_eyes; // phpcs:ignore ?></g>
				<g class="pl-glow-sm" fill="#c9b0ff" filter="url(#pl-blur-sm)"><?php echo $raze_eyes; // phpcs:ignore ?></g>
				<g class="pl-eye-core" fill="url(#pl-eye)"><?php echo $raze_eyes; // phpcs:ignore ?></g>
			</g>
		</svg>
	</div>
	<div class="pl-flash"></div>
</div>
