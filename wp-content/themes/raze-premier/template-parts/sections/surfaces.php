<?php
/**
 * Scrolling strip of the places customers search.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_surfaces = raze_search_surfaces();
?>
<section class="surfaces" aria-label="Where we get you found">
	<p class="surfaces-label">Where your next customer is looking</p>
	<div class="marquee" data-marquee>
		<?php for ( $raze_pass = 0; $raze_pass < 2; $raze_pass++ ) : ?>
			<ul class="marquee-row" <?php echo $raze_pass ? 'aria-hidden="true"' : ''; ?>>
				<?php foreach ( $raze_surfaces as $raze_s ) : ?>
					<li><?php echo esc_html( $raze_s ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endfor; ?>
	</div>
</section>
