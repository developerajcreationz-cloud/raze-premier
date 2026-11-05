<?php
/**
 * Service cards, three per row. The last card (lead funnels) spans the row.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_cards = raze_service_cards();
$raze_total = count( $raze_cards );
?>
<section class="services" id="services">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<p class="eyebrow eyebrow-dark" data-reveal><span class="dot" aria-hidden="true"></span>What we do</p>
				<h2 class="h-xl" data-split>Six services. One team.</h2>
			</div>
			<p class="lede" data-reveal style="--d:.15s">Hire us for one, or let them work together: the site is built for the searches the ads target, and the funnel shows which of them paid off.</p>
		</div>

		<div class="cards">
			<?php foreach ( $raze_cards as $raze_i => $raze_card ) : ?>
				<?php $raze_wide = ( $raze_i === $raze_total - 1 && 1 === $raze_total % 3 ); ?>
				<article class="card<?php echo $raze_wide ? ' card-wide' : ''; ?>" id="<?php echo esc_attr( sanitize_title( $raze_card['name'] ) ); ?>" data-reveal data-tilt style="--d:<?php echo esc_attr( ( $raze_i % 3 ) * 0.08 ); ?>s">
					<div class="card-top">
						<span class="card-n mono"><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span>
						<a class="card-arrow" href="#contact" data-service="<?php echo esc_attr( $raze_card['name'] ); ?>" aria-label="<?php echo esc_attr( 'Ask about ' . $raze_card['name'] ); ?>"><?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a>
					</div>
					<div class="card-body">
						<h3 class="card-title"><?php echo esc_html( $raze_card['name'] ); ?></h3>
						<p class="card-desc"><?php echo esc_html( $raze_card['desc'] ); ?></p>
						<ul class="card-tags">
							<?php foreach ( $raze_card['tags'] as $raze_tag ) : ?>
								<li><?php echo esc_html( $raze_tag ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
