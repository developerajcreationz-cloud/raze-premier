<?php
/**
 * Lander results, in the homepage's results style: headline, figures with
 * growing bars, a line that draws with the scroll, and one gradient card per
 * project. Each card opens that project's Search Console screenshots.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_r = $args['l']['results'];
?>
<section class="results lresults" id="results">
	<svg class="results-curve" viewBox="0 0 1200 600" preserveAspectRatio="none" aria-hidden="true" data-curve>
		<defs>
			<linearGradient id="lrcg" x1="0" y1="1" x2="1" y2="0">
				<stop offset="0" stop-color="#7b3ff2" stop-opacity="0"/>
				<stop offset=".5" stop-color="#7b3ff2"/>
				<stop offset="1" stop-color="#b48cff"/>
			</linearGradient>
		</defs>
		<path d="M0 590 C 420 585, 700 540, 880 380 S 1120 60, 1200 0" fill="none" stroke="url(#lrcg)" stroke-width="2" pathLength="1"/>
	</svg>

	<div class="wrap results-head">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_r['title'][0] ); ?> <br><span class="fade-word"><?php echo esc_html( $raze_r['title'][1] ); ?></span> <span class="results-emoji" aria-hidden="true"><?php echo raze_icon( 'chart' ); // phpcs:ignore ?></span></h2>
		<p class="lede lresults-sub" data-reveal style="--d:.08s"><?php echo esc_html( $raze_r['sub'] ); ?></p>
		<ul class="stats">
			<?php foreach ( $raze_r['summary'] as $raze_i => $raze_s ) : ?>
				<li class="stat" data-reveal style="--d:<?php echo esc_attr( 0.1 * $raze_i ); ?>s">
					<b><?php echo esc_html( $raze_s['value'] ); ?></b>
					<span><?php echo esc_html( $raze_s['label'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="wrap result-cards">
		<?php foreach ( $raze_r['projects'] as $raze_i => $raze_p ) : ?>
			<?php
			$raze_gallery = array_map(
				function ( $shot ) {
					return array( 'src' => raze_asset( $shot['src'] ), 'alt' => $shot['alt'], 'label' => $shot['label'] );
				},
				$raze_p['shots']
			);
			?>
			<button type="button" class="rcard rcard-<?php echo (int) $raze_i; ?>" data-rise style="--i:<?php echo (int) $raze_i; ?>" data-tilt data-gallery="<?php echo esc_attr( wp_json_encode( $raze_gallery ) ); ?>">
				<span class="rcard-kind"><?php echo esc_html( $raze_p['title'] ); ?></span>
				<span class="rcard-big"><?php echo esc_html( $raze_p['big'] ); ?> <small><?php echo esc_html( $raze_p['small'] ); ?></small></span>
				<span class="rcard-foot">
					<b><?php echo esc_html( $raze_p['name'] ); ?></b>
					<span>See the screenshots <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></span>
				</span>
			</button>
		<?php endforeach; ?>
	</div>
	<p class="wrap lnote"><?php echo esc_html( $raze_r['note'] ); ?></p>

	<dialog class="lightbox" data-gallery-dialog aria-label="Search Console screenshots">
		<p class="lightbox-label" data-gallery-label></p>
		<button type="button" class="lightbox-x" data-gallery-close aria-label="Close"><?php echo raze_icon( 'close' ); // phpcs:ignore ?></button>
		<img src="" alt="" data-gallery-img>
		<div class="lightbox-nav">
			<button type="button" data-gallery-prev aria-label="Previous screenshot"><?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></button>
			<span data-gallery-count></span>
			<button type="button" data-gallery-next aria-label="Next screenshot"><?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></button>
		</div>
	</dialog>
</section>
