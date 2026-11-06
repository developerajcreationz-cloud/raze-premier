<?php
/**
 * Wall of love: two rows of review cards drifting in opposite directions.
 * Cards marked as samples carry a visible "Sample" label.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_reviews = raze_reviews();
if ( ! $raze_reviews ) {
	return;
}
$raze_rows = array( $raze_reviews, array_reverse( $raze_reviews ) );
?>
<section class="reviews" id="reviews">
	<svg class="reviews-heart" viewBox="0 0 600 520" aria-hidden="true" focusable="false"><defs><radialGradient id="rvh" cx=".5" cy=".42" r=".6"><stop offset="0" stop-color="#ffffff"/><stop offset=".55" stop-color="#efe7ff"/><stop offset="1" stop-color="#d5c2ff"/></radialGradient></defs><path d="M300 500C120 380 20 270 20 160 20 80 85 20 165 20c58 0 105 30 135 75C330 50 377 20 435 20c80 0 145 60 145 140 0 110-100 220-280 340z" fill="url(#rvh)"/></svg>
	<div class="wrap reviews-head">
		<h2 class="h-xl" data-reveal>Wall of Love</h2>
		<p class="lede" data-reveal style="--d:.1s">Founders, marketers and teams who found out where they stood, then changed it.</p>
	</div>

	<?php foreach ( $raze_rows as $raze_r => $raze_row ) : ?>
		<div class="marquee<?php echo $raze_r ? ' is-reverse' : ''; ?>" <?php echo $raze_r ? 'aria-hidden="true"' : ''; ?>>
			<div class="marquee-track">
				<?php for ( $raze_pass = 0; $raze_pass < 2; $raze_pass++ ) : ?>
					<ul class="marquee-row" <?php echo $raze_pass ? 'aria-hidden="true"' : ''; ?>>
						<?php foreach ( $raze_row as $raze_rev ) : ?>
							<li class="review">
								<p class="review-top">
									<span class="stars" aria-label="5 out of 5"><?php echo str_repeat( raze_icon( 'star' ), 5 ); // phpcs:ignore ?></span>
									<?php if ( ! empty( $raze_rev['sample'] ) ) : ?>
										<span class="review-src is-sample">Sample</span>
									<?php elseif ( ! empty( $raze_rev['source'] ) ) : ?>
										<span class="review-src"><?php echo esc_html( $raze_rev['source'] ); ?></span>
									<?php endif; ?>
								</p>
								<p class="review-title"><?php echo esc_html( $raze_rev['title'] ); ?></p>
								<p class="review-body"><?php echo raze_highlight( $raze_rev['body'] ); // phpcs:ignore ?></p>
								<p class="review-by"><b><?php echo esc_html( $raze_rev['name'] ); ?></b> <span><?php echo esc_html( $raze_rev['role'] ); ?></span></p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endfor; ?>
			</div>
		</div>
	<?php endforeach; ?>
</section>
