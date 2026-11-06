<?php
/**
 * "Let AI assistants recommend your brand": a dark, starry band with the
 * assistants' marks wired to our mark.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_a = raze_agents();
?>
<section class="agents" id="ai" aria-labelledby="agents-title">
	<div class="agents-card" data-zoom>
		<div class="agents-stars" aria-hidden="true"></div>
		<div class="agents-stars agents-stars-2" aria-hidden="true"></div>
		<div class="agents-glow" aria-hidden="true"></div>

		<div class="agents-wire" aria-hidden="true" data-reveal>
			<span class="agents-marks">
				<?php foreach ( $raze_a['marks'] as $raze_i => $raze_m ) : ?>
					<span class="agents-mark agents-mark-<?php echo esc_attr( $raze_m ); ?>"><?php echo raze_mark( $raze_m, 'claude' !== $raze_m && 'chatgpt' !== $raze_m ); // phpcs:ignore ?></span>
				<?php endforeach; ?>
			</span>
			<span class="agents-line"><i></i></span>
			<span class="agents-us"><span>r</span></span>
		</div>

		<h2 class="agents-title" id="agents-title" data-reveal style="--d:.08s"><?php echo esc_html( $raze_a['title'] ); ?></h2>
		<p class="agents-body" data-reveal style="--d:.16s"><?php echo esc_html( $raze_a['body'] ); ?></p>
		<a class="btn btn-light agents-cta" href="#contact" data-reveal style="--d:.24s"><?php echo esc_html( $raze_a['cta'] ); ?></a>
	</div>
</section>
