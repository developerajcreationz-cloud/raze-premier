<?php
/**
 * Lander services: one card per layer. The cards pin and stack as the
 * visitor scrolls, the same way the projects do on the homepage.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_x = $args['l']['layers'];
?>
<section class="lsec" id="services">
	<div class="wrap lhead">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_x['title'] ); ?></h2>
		<p class="lede" data-reveal style="--d:.1s"><?php echo esc_html( $raze_x['sub'] ); ?></p>
	</div>
	<div class="wrap stack lstack" data-stack>
		<?php foreach ( $raze_x['items'] as $raze_i => $raze_c ) : ?>
			<article class="scard lcard scard-<?php echo (int) $raze_i; ?>" data-scard style="--i:<?php echo (int) $raze_i; ?>">
				<div class="scard-inner">
					<div class="lcard-copy">
						<p class="scard-top mono"><span><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span><?php echo esc_html( $raze_c['full'] ); ?></p>
						<h3 class="lcard-name"><?php echo esc_html( $raze_c['name'] ); ?></h3>
						<p class="lcard-body"><?php echo esc_html( $raze_c['body'] ); ?></p>
						<p class="scard-label">Shows up in</p>
						<ul class="tags">
							<?php foreach ( $raze_c['where'] as $raze_w ) : ?>
								<li><?php echo esc_html( $raze_w ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="lcard-list">
						<p class="scard-label">What we do</p>
						<ul>
							<?php foreach ( $raze_c['ticks'] as $raze_t ) : ?>
								<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_t ); ?></li>
							<?php endforeach; ?>
						</ul>
						<a class="btn btn-dark" href="#contact">Get my free audit <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
