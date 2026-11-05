<?php
/**
 * Big scrolling words band. Speed follows the scroll.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_words = raze_ticker_words();
?>
<section class="ticker" aria-hidden="true" data-ticker>
	<div class="ticker-track" data-ticker-track>
		<?php for ( $raze_pass = 0; $raze_pass < 3; $raze_pass++ ) : ?>
			<div class="ticker-row">
				<?php foreach ( $raze_words as $raze_k => $raze_w ) : ?>
					<span class="<?php echo 1 === $raze_k % 2 ? 'is-outline' : ''; ?>"><?php echo esc_html( $raze_w ); ?></span><i class="ticker-dot"></i>
				<?php endforeach; ?>
			</div>
		<?php endfor; ?>
	</div>
</section>
