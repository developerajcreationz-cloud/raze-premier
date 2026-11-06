<?php
/**
 * Services, set out like a values section: the service cards start as one
 * stacked deck and fan out into an arc when the section comes into view.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_cards = raze_service_cards();
$raze_n     = count( $raze_cards );
?>
<section class="values" id="services" data-dark>
	<div class="values-inner">
			<div class="values-head wrap">
				<h2 class="h-lg" data-reveal>What we do</h2>
				<p class="lede" data-reveal style="--d:.1s">Six services that cover the whole path, from the first impression to the booked call. Take one, or let them work together.</p>
			</div>
			<div class="fan" data-fan style="--n:<?php echo (int) $raze_n; ?>">
				<?php foreach ( $raze_cards as $raze_i => $raze_card ) : ?>
					<?php $raze_o = $raze_i - ( $raze_n - 1 ) / 2; ?>
					<article class="vcard" tabindex="0" id="<?php echo esc_attr( sanitize_title( $raze_card['name'] ) ); ?>" style="--i:<?php echo (int) $raze_i; ?>;--o:<?php echo esc_attr( $raze_o ); ?>;--a:<?php echo esc_attr( abs( $raze_o ) ); ?>">
						<span class="vcard-ic"><?php echo raze_icon( $raze_card['icon'] ); // phpcs:ignore ?></span>
						<h3 class="vcard-title"><?php echo esc_html( $raze_card['name'] ); ?></h3>
						<p class="vcard-line"><?php echo esc_html( $raze_card['line'] ); ?></p>
						<p class="vcard-desc"><?php echo esc_html( $raze_card['desc'] ); ?></p>
						<ul class="vcard-tags">
							<?php foreach ( array_slice( $raze_card['tags'], 0, 3 ) as $raze_tag ) : ?>
								<li><?php echo esc_html( $raze_tag ); ?></li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
	</div>
</section>
