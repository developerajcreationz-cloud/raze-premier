<?php
/**
 * Lander process: four numbered steps joined by a line that fills in.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_p = $args['l']['process'];
?>
<section class="lsec" id="process">
	<div class="wrap lhead">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_p['title'] ); ?></h2>
	</div>
	<ol class="wrap lsteps" data-reveal>
		<?php foreach ( $raze_p['steps'] as $raze_i => $raze_s ) : ?>
			<li style="--i:<?php echo (int) $raze_i; ?>">
				<span class="lstep-n"><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span>
				<h3><?php echo esc_html( $raze_s[0] ); ?></h3>
				<p><?php echo esc_html( $raze_s[1] ); ?></p>
			</li>
		<?php endforeach; ?>
	</ol>
</section>
