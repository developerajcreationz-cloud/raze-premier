<?php
/**
 * Bridge to the other lander: how the two services work as one system,
 * with a link across. This is the only link that leaves the page.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_b  = $args['l']['bridge'];
$raze_to = raze_lander( $raze_b['to'] );
?>
<section class="lbridge" id="together" data-dark>
	<div class="wrap lhead lhead-dark">
		<p class="lbridge-kicker" data-reveal><?php echo esc_html( $args['l']['name'] . ' + ' . $raze_to['name'] ); ?></p>
		<h2 class="h-xl" data-reveal style="--d:.06s"><?php echo esc_html( $raze_b['title'] ); ?></h2>
		<p class="lede" data-reveal style="--d:.12s"><?php echo esc_html( $raze_b['sub'] ); ?></p>
	</div>

	<ol class="wrap lflow" data-flowline>
		<?php foreach ( $raze_b['flow'] as $raze_i => $raze_f ) : ?>
			<li style="--i:<?php echo (int) $raze_i; ?>"><span><?php echo (int) $raze_i + 1; ?></span><h3><?php echo esc_html( $raze_f[0] ); ?></h3><p><?php echo esc_html( $raze_f[1] ); ?></p></li>
		<?php endforeach; ?>
	</ol>

	<div class="wrap">
		<h3 class="lbridge-h" data-reveal>Why your business needs both</h3>
		<div class="lbridge-why">
			<?php foreach ( $raze_b['why'] as $raze_i => $raze_w ) : ?>
				<div data-reveal style="--d:<?php echo esc_attr( 0.06 * $raze_i ); ?>s"><h4><?php echo esc_html( $raze_w[0] ); ?></h4><p><?php echo esc_html( $raze_w[1] ); ?></p></div>
			<?php endforeach; ?>
		</div>
		<div class="lbridge-cta" data-reveal>
			<a class="btn btn-grad btn-lg" href="#contact">Get my free audit <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( raze_lander_url( $raze_b['to'] ) ); ?>"><?php echo esc_html( $raze_b['cta'] ); ?> <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a>
		</div>
	</div>
</section>
