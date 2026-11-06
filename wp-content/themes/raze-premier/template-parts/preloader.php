<?php
/**
 * Preloader: a heads-up display that boots the brand, then a purple panel
 * wipes up to reveal the page. Shown once per visit, skipped for people who
 * prefer reduced motion, and never shown without JavaScript.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_checks = array( 'Brand', 'Website', 'Search', 'Ads', 'Video', 'Funnel' );
?>
<script>try{if(sessionStorage.getItem('raze_pl')||window.matchMedia('(prefers-reduced-motion: reduce)').matches){document.documentElement.classList.add('pl-skip');}}catch(e){}</script>
<div class="preloader" data-preloader aria-hidden="true">
	<div class="pl-grid"></div>
	<div class="pl-glow"></div>
	<div class="pl-scan"></div>

	<div class="pl-hud">
		<svg class="pl-rings" viewBox="0 0 400 400" fill="none">
			<defs>
				<linearGradient id="plg" x1="0" y1="0" x2="1" y2="1">
					<stop offset="0" stop-color="#c9b6ff"/>
					<stop offset="1" stop-color="#7b3ff2"/>
				</linearGradient>
			</defs>
			<g class="pl-r pl-r1"><circle cx="200" cy="200" r="190" stroke="url(#plg)" stroke-width="1" stroke-dasharray="2 6" opacity=".55"/></g>
			<g class="pl-r pl-r2"><circle cx="200" cy="200" r="168" stroke="url(#plg)" stroke-width="3" stroke-dasharray="180 60 40 60 300 80" stroke-linecap="round"/></g>
			<g class="pl-r pl-r3"><circle cx="200" cy="200" r="146" stroke="#fff" stroke-opacity=".25" stroke-width="1"/><circle cx="200" cy="200" r="146" stroke="url(#plg)" stroke-width="8" stroke-dasharray="12 18" opacity=".5"/></g>
			<g class="pl-r pl-r4"><circle cx="200" cy="200" r="124" stroke="url(#plg)" stroke-width="1.5" stroke-dasharray="520 260" stroke-linecap="round"/></g>
			<circle class="pl-progress" cx="200" cy="200" r="104" stroke="url(#plg)" stroke-width="2" pathLength="100" stroke-dasharray="100" stroke-dashoffset="100" transform="rotate(-90 200 200)"/>
			<g class="pl-ticks" stroke="#fff" stroke-opacity=".5">
				<path d="M200 2v14M200 384v14M2 200h14M384 200h14"/>
			</g>
		</svg>
		<div class="pl-core">
			<?php echo raze_wordmark( 'wordmark-pl' ); // phpcs:ignore ?>
		</div>
	</div>

	<div class="pl-data pl-data-l mono">
		<p class="pl-title">R.A.Z.E // Boot sequence</p>
		<ul>
			<?php foreach ( $raze_checks as $raze_i => $raze_check ) : ?>
				<li style="--i:<?php echo (int) $raze_i; ?>"><span><?php echo esc_html( $raze_check ); ?></span><i></i><b>Online</b></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="pl-data pl-data-r mono">
		<p class="pl-title">Signal</p>
		<p class="pl-wave"><?php for ( $raze_i = 0; $raze_i < 24; $raze_i++ ) : ?><i style="--i:<?php echo (int) $raze_i; ?>"></i><?php endfor; ?></p>
		<p>Search · AI answers · Feeds</p>
	</div>

	<div class="pl-foot mono">
		<span class="pl-count"><span data-pl-count>000</span>%</span>
		<span class="pl-bar"><i data-pl-bar></i></span>
		<span class="pl-status" data-pl-status>Initialising</span>
	</div>

	<p class="pl-tag">Be the brand they find first</p>
	<div class="pl-wipe"></div>
</div>
