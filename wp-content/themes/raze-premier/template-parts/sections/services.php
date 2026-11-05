<?php
/**
 * Services grouped by outcome.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="services" id="services">
	<div class="wrap section-head">
		<p class="kicker" data-reveal>What we do</p>
		<h2 class="h-xl" data-reveal style="--d:.06s">Seven services, <em>one set of numbers.</em></h2>
		<p class="lede" data-reveal style="--d:.12s">You can hire us for one of these. They work better together, because the site is built for the searches the ads target, and the funnel reports which of them paid off.</p>
	</div>

	<?php foreach ( raze_service_groups() as $raze_group ) : ?>
		<div class="band band-<?php echo esc_attr( $raze_group['tone'] ); ?>" id="<?php echo esc_attr( $raze_group['id'] ); ?>">
			<div class="band-inner">
				<div class="band-side">
					<div class="band-sticky">
						<span class="band-index mono"><?php echo esc_html( $raze_group['index'] ); ?> / 03</span>
						<h3 class="band-title" data-reveal><?php echo esc_html( $raze_group['title'] ); ?></h3>
						<p class="band-intro" data-reveal style="--d:.08s"><?php echo esc_html( $raze_group['intro'] ); ?></p>
					</div>
				</div>
				<ol class="svc-list">
					<?php foreach ( $raze_group['items'] as $raze_item ) : ?>
						<li class="svc" data-reveal>
							<div class="svc-top">
								<h4 class="svc-name"><?php echo esc_html( $raze_item['name'] ); ?></h4>
								<a class="svc-link" href="#contact" data-service="<?php echo esc_attr( $raze_item['name'] ); ?>" aria-label="<?php echo esc_attr( 'Ask about ' . $raze_item['name'] ); ?>"><?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a>
							</div>
							<p class="svc-desc"><?php echo esc_html( $raze_item['desc'] ); ?></p>
							<ul class="tags">
								<?php foreach ( $raze_item['tags'] as $raze_tag ) : ?>
									<li><?php echo esc_html( $raze_tag ); ?></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
					<?php if ( 'convert' === $raze_group['id'] ) : ?>
						<li class="svc svc-flow" data-reveal aria-label="How a lead moves through the funnel">
							<ol class="flow">
								<li><span class="mono">01</span>Ad or search result</li>
								<li><span class="mono">02</span>Landing page</li>
								<li><span class="mono">03</span>Form or booking</li>
								<li><span class="mono">04</span>Instant follow-up</li>
								<li><span class="mono">05</span>Call booked</li>
							</ol>
						</li>
					<?php endif; ?>
				</ol>
			</div>
		</div>
	<?php endforeach; ?>
</section>
