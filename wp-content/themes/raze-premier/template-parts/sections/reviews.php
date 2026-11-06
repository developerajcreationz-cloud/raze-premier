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
	<div class="reviews-heart" aria-hidden="true"></div>
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
