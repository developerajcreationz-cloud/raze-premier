<?php
/**
 * Pinned image that opens from a small frame to full width on scroll.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="showcase" data-showcase aria-label="Featured work">
	<div class="showcase-sticky">
		<div class="showcase-frame" data-showcase-frame>
			<img src="<?php echo esc_url( raze_asset( 'img/work/call-time-03-poster-series.webp' ) ); ?>" alt="Call Time Studio poster series, one of our brand identity projects." width="1600" height="1067" loading="lazy" decoding="async">
			<div class="showcase-shade" aria-hidden="true"></div>
		</div>
		<div class="showcase-copy">
			<p class="mono showcase-tag">Call Time Studio, brand identity</p>
			<h2 class="showcase-title" data-showcase-title>Made to be<br>remembered.</h2>
		</div>
	</div>
</section>
