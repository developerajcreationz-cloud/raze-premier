<?php
/**
 * Results: headline, a row of figures, a line that draws itself as the
 * visitor scrolls, and the three projects as gradient cards.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_work = raze_work();
?>
<section class="results" id="results" data-results>
	<svg class="results-curve" viewBox="0 0 1200 600" preserveAspectRatio="none" aria-hidden="true" data-curve>
		<defs>
			<linearGradient id="rcg" x1="0" y1="1" x2="1" y2="0">
				<stop offset="0" stop-color="#7b3ff2" stop-opacity="0"/>
				<stop offset=".5" stop-color="#7b3ff2"/>
				<stop offset="1" stop-color="#b48cff"/>
			</linearGradient>
		</defs>
		<path d="M0 590 C 420 585, 700 540, 880 380 S 1120 60, 1200 0" fill="none" stroke="url(#rcg)" stroke-width="2" pathLength="1"/>
	</svg>

	<div class="wrap results-head">
		<h2 class="h-xl" data-reveal>Visibility that <br><span class="fade-word">turns into revenue</span> <span class="results-emoji" aria-hidden="true"><?php echo raze_icon( 'chart' ); // phpcs:ignore ?></span></h2>
		<ul class="stats">
			<?php foreach ( raze_results_stats() as $raze_i => $raze_stat ) : ?>
				<li class="stat" data-reveal style="--d:<?php echo esc_attr( 0.1 * $raze_i ); ?>s">
					<b data-count="<?php echo esc_attr( $raze_stat['value'] ); ?>"><?php echo esc_html( $raze_stat['value'] ); ?></b>
					<span><?php echo esc_html( $raze_stat['label'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="wrap result-cards">
		<?php foreach ( $raze_work as $raze_i => $raze_p ) : ?>
			<a class="rcard rcard-<?php echo (int) $raze_i; ?>" href="#work" data-rise style="--i:<?php echo (int) $raze_i; ?>" data-tilt>
				<span class="rcard-kind"><?php echo esc_html( $raze_p['kind'] ); ?></span>
				<span class="rcard-big"><?php echo esc_html( count( $raze_p['delivered'] ) ); ?> <small>deliverables, one system</small></span>
				<span class="rcard-foot">
					<b><?php echo esc_html( $raze_p['client'] ); ?></b>
					<span>See the project <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></span>
				</span>
			</a>
		<?php endforeach; ?>
	</div>

</section>
