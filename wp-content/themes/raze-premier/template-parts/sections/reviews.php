<?php
/**
 * Wall of love: two rows of review cards drifting in opposite directions.
 * Each card follows the layout of a review-site card: the platform's stars
 * and name, a headline, the review with highlighted phrases, the reviewer
 * and a verification note. Sample cards carry a visible "Sample" label.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

// Only real reviews are shown. Placeholders marked 'sample' stay in
// inc/content.php but never reach the page.
$raze_reviews = array_values(
	array_filter(
		raze_reviews(),
		function ( $r ) {
			return empty( $r['sample'] );
		}
	)
);
if ( ! $raze_reviews ) {
	return;
}
$raze_rows      = array( $raze_reviews, array_reverse( $raze_reviews ) );
$raze_platforms = array(
	'trustpilot' => 'Trustpilot',
	'google'     => 'Google',
	'g2'         => 'G2',
	'clutch'     => 'Clutch',
	'direct'     => '',
);
?>
<section class="reviews" id="reviews">
	<svg class="reviews-heart" viewBox="0 0 600 520" aria-hidden="true" focusable="false"><defs><radialGradient id="rvh" cx=".5" cy=".42" r=".6"><stop offset="0" stop-color="#ffffff"/><stop offset=".55" stop-color="#efe7ff"/><stop offset="1" stop-color="#d5c2ff"/></radialGradient></defs><path d="M300 500C120 380 20 270 20 160 20 80 85 20 165 20c58 0 105 30 135 75C330 50 377 20 435 20c80 0 145 60 145 140 0 110-100 220-280 340z" fill="url(#rvh)"/></svg>
	<div class="wrap reviews-head">
		<h2 class="h-xl" data-reveal>Wall of Love</h2>
		<p class="lede" data-reveal style="--d:.1s">Founders, marketers and teams who found out where they stood, then changed it.</p>
	</div>

	<?php if ( count( $raze_reviews ) < 3 ) : ?>
		<div class="wrap reviews-featured">
			<?php foreach ( $raze_reviews as $raze_rev ) : ?>
				<?php $raze_platform = isset( $raze_rev['platform'] ) ? $raze_rev['platform'] : 'direct'; ?>
				<figure class="review review-featured" data-reveal style="--d:.15s">
					<p class="review-top">
						<span class="stars stars-<?php echo esc_attr( $raze_platform ); ?>" role="img" aria-label="5 out of 5">
							<?php for ( $raze_s = 0; $raze_s < 5; $raze_s++ ) : ?>
								<i><?php echo raze_icon( 'star' ); // phpcs:ignore ?></i>
							<?php endfor; ?>
						</span>
						<?php if ( ! empty( $raze_platforms[ $raze_platform ] ) ) : ?>
							<span class="review-src"><?php echo esc_html( $raze_platforms[ $raze_platform ] ); ?></span>
						<?php endif; ?>
					</p>
					<blockquote class="review-quote"><?php echo raze_highlight( $raze_rev['body'] ); // phpcs:ignore ?></blockquote>
					<figcaption class="review-by">
						<span><?php echo esc_html( $raze_rev['name'] ); ?></span>
						<?php if ( ! empty( $raze_rev['verified'] ) ) : ?>
							<span class="review-ok"><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_rev['verified'] ); ?></span>
						<?php endif; ?>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
	<?php foreach ( $raze_rows as $raze_r => $raze_row ) : ?>
		<div class="marquee<?php echo $raze_r ? ' is-reverse' : ''; ?>" <?php echo $raze_r ? 'aria-hidden="true"' : ''; ?>>
			<div class="marquee-track">
				<?php for ( $raze_pass = 0; $raze_pass < 2; $raze_pass++ ) : ?>
					<ul class="marquee-row" <?php echo $raze_pass ? 'aria-hidden="true"' : ''; ?>>
						<?php foreach ( $raze_row as $raze_rev ) : ?>
							<?php
							$raze_sample   = ! empty( $raze_rev['sample'] );
							$raze_platform = $raze_sample ? 'direct' : ( isset( $raze_rev['platform'] ) ? $raze_rev['platform'] : 'direct' );
							?>
							<li class="review review-<?php echo esc_attr( $raze_platform ); ?>">
								<p class="review-top">
									<span class="stars stars-<?php echo esc_attr( $raze_platform ); ?>" role="img" aria-label="5 out of 5">
										<?php for ( $raze_s = 0; $raze_s < 5; $raze_s++ ) : ?>
											<i><?php echo raze_icon( 'star' ); // phpcs:ignore ?></i>
										<?php endfor; ?>
									</span>
									<?php if ( $raze_sample ) : ?>
										<span class="review-src is-sample">Sample</span>
									<?php elseif ( ! empty( $raze_platforms[ $raze_platform ] ) ) : ?>
										<span class="review-src"><?php echo esc_html( $raze_platforms[ $raze_platform ] ); ?></span>
									<?php endif; ?>
								</p>
								<p class="review-title"><?php echo esc_html( $raze_rev['title'] ); ?></p>
								<p class="review-body"><?php echo raze_highlight( $raze_rev['body'] ); // phpcs:ignore ?></p>
								<p class="review-by">
									<span><?php echo esc_html( $raze_rev['name'] ); ?></span>
									<?php if ( ! $raze_sample && ! empty( $raze_rev['verified'] ) ) : ?>
										<span class="review-ok"><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_rev['verified'] ); ?></span>
									<?php elseif ( $raze_sample ) : ?>
										<span class="review-ok is-sample">Replace with a real review</span>
									<?php endif; ?>
								</p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endfor; ?>
			</div>
		</div>
	<?php endforeach; ?>
	<?php endif; ?>

	<?php $raze_clients = raze_clients(); ?>
	<?php if ( $raze_clients ) : ?>
		<div class="wrap clients">
			<p class="clients-h" data-reveal>Who we’ve worked with <span>Names kept private to protect our clients’ privacy.</span></p>
			<ul class="clients-list">
				<?php foreach ( $raze_clients as $raze_i => $raze_c ) : ?>
					<li data-reveal style="--d:<?php echo esc_attr( 0.06 * $raze_i ); ?>s">
						<span class="clients-ic"><?php echo raze_icon( $raze_c['icon'] ); // phpcs:ignore ?></span>
						<b><?php echo esc_html( $raze_c['industry'] ); ?></b>
						<span class="clients-place"><?php echo esc_html( $raze_c['place'] ); ?></span>
						<small><?php echo esc_html( $raze_c['note'] ); ?></small>
						<?php if ( ! empty( $raze_c['work'] ) ) : ?>
							<ul class="clients-work">
								<?php foreach ( (array) $raze_c['work'] as $raze_w ) : ?>
									<li><?php echo esc_html( $raze_w ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</section>
