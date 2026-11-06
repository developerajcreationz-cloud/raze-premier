<?php
/**
 * Why us, in the homepage's "What we do" style: dark section, cards that
 * fan out as the visitor scrolls. The SEO lander adds a comparison table.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_w = $args['l']['why'];
$raze_n = count( $raze_w['items'] );
?>
<section class="values lwhy-dark">
	<div class="values-inner">
		<div class="values-head wrap">
			<h2 class="h-lg" data-reveal><?php echo esc_html( $raze_w['title'] ); ?></h2>
		</div>
		<div class="fan" data-fan style="--n:<?php echo (int) $raze_n; ?>">
			<?php foreach ( $raze_w['items'] as $raze_i => $raze_x ) : ?>
				<?php $raze_o = $raze_i - ( $raze_n - 1 ) / 2; ?>
				<article class="vcard lvcard" tabindex="0" style="--i:<?php echo (int) $raze_i; ?>;--o:<?php echo esc_attr( $raze_o ); ?>;--a:<?php echo esc_attr( abs( $raze_o ) ); ?>">
					<span class="vcard-ic"><?php echo raze_icon( $raze_x[0] ); // phpcs:ignore ?></span>
					<h3 class="vcard-title"><?php echo esc_html( $raze_x[1] ); ?></h3>
					<p class="vcard-line"><?php echo esc_html( $raze_x[2] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php if ( ! empty( $raze_w['compare'] ) ) : ?>
	<section class="lsec lcompare-sec">
		<div class="wrap lhead">
			<h2 class="h-lg" data-reveal>What changes when we add AEO and GEO</h2>
		</div>
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
	</section>
<?php endif; ?>
