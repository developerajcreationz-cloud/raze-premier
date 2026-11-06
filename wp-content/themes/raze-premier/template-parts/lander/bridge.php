<?php
/**
 * Bridge to the other lander, in the homepage's starry AI band style: the
 * platforms wired to our logo, the five steps from search to booked, and
 * the link across. This is the only link that leaves the page.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_b  = $args['l']['bridge'];
$raze_to = raze_lander( $raze_b['to'] );
?>
<section class="agents lbridge2" id="together">
	<div class="agents-card" data-zoom>
		<div class="agents-stars" aria-hidden="true"></div>
		<div class="agents-stars agents-stars-2" aria-hidden="true"></div>
		<div class="agents-glow" aria-hidden="true"></div>

		<div class="agents-wire" aria-hidden="true" data-reveal>
			<span class="agents-marks">
				<?php foreach ( $raze_b['marks'] as $raze_m ) : ?>
					<span class="agents-mark agents-mark-<?php echo esc_attr( $raze_m ); ?>"><?php echo raze_mark( $raze_m, 'chatgpt' !== $raze_m ); // phpcs:ignore ?></span>
				<?php endforeach; ?>
			</span>
			<span class="agents-line"><i></i></span>
			<span class="agents-us"><?php echo raze_wordmark(); // phpcs:ignore ?></span>
		</div>

		<p class="lbridge-kicker" data-reveal><?php echo esc_html( $args['l']['name'] . ' + ' . $raze_to['name'] ); ?></p>
		<h2 class="agents-title lbridge-title" data-reveal style="--d:.06s"><?php echo esc_html( $raze_b['title'] ); ?></h2>
		<p class="agents-body" data-reveal style="--d:.12s"><?php echo esc_html( $raze_b['sub'] ); ?></p>

		<ol class="lflow2" data-flowline>
			<?php foreach ( $raze_b['flow'] as $raze_i => $raze_f ) : ?>
				<li style="--i:<?php echo (int) $raze_i; ?>"><span><?php echo (int) $raze_i + 1; ?></span><b><?php echo esc_html( $raze_f[0] ); ?></b><small><?php echo esc_html( $raze_f[1] ); ?></small></li>
			<?php endforeach; ?>
		</ol>

		<div class="lbridge-why2">
			<?php foreach ( $raze_b['why'] as $raze_i => $raze_w ) : ?>
				<div data-reveal style="--d:<?php echo esc_attr( 0.06 * $raze_i ); ?>s"><h3><?php echo esc_html( $raze_w[0] ); ?></h3><p><?php echo esc_html( $raze_w[1] ); ?></p></div>
			<?php endforeach; ?>
		</div>

		<div class="lbridge-cta" data-reveal>
			<a class="btn btn-light" href="#contact">Get my free audit <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn-ghost" href="<?php echo esc_url( raze_lander_url( $raze_b['to'] ) ); ?>"><?php echo esc_html( $raze_b['cta'] ); ?> <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a>
		</div>
	</div>
</section>
