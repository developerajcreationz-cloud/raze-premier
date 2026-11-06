<?php
/**
 * Why us: six short reasons, and for the SEO lander a comparison table.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_w = $args['l']['why'];
?>
<section class="lsec">
	<div class="wrap lhead">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_w['title'] ); ?></h2>
	</div>
	<div class="wrap lwhy">
		<?php foreach ( $raze_w['items'] as $raze_i => $raze_x ) : ?>
			<div class="lwhy-item" data-reveal style="--d:<?php echo esc_attr( 0.06 * ( $raze_i % 3 ) ); ?>s">
				<span class="lwhy-ic"><?php echo raze_icon( $raze_x[0] ); // phpcs:ignore ?></span>
				<h3><?php echo esc_html( $raze_x[1] ); ?></h3>
				<p><?php echo esc_html( $raze_x[2] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if ( ! empty( $raze_w['compare'] ) ) : ?>
		<div class="wrap">
			<table class="lcompare" data-reveal>
				<thead>
					<tr><th scope="col"><span class="sr-only">Area</span></th><th scope="col"><?php echo esc_html( $raze_w['compare']['head'][0] ); ?></th><th scope="col" class="is-us"><?php echo esc_html( $raze_w['compare']['head'][1] ); ?></th></tr>
				</thead>
				<tbody>
					<?php foreach ( $raze_w['compare']['rows'] as $raze_row ) : ?>
						<tr><th scope="row"><?php echo esc_html( $raze_row[0] ); ?></th><td><?php echo esc_html( $raze_row[1] ); ?></td><td class="is-us"><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_row[2] ); ?></td></tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif; ?>
</section>
