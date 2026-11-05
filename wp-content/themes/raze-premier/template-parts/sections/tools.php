<?php
/**
 * Tools we work in.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_tools = raze_tools();
?>
<section class="tools" id="tools" aria-label="Tools we work in">
	<p class="tools-label mono" data-reveal>Tools we work in every day</p>
	<div class="tools-track" data-reveal style="--d:.1s">
		<?php for ( $raze_pass = 0; $raze_pass < 2; $raze_pass++ ) : ?>
			<ul class="tools-row" <?php echo $raze_pass ? 'aria-hidden="true"' : ''; ?>>
				<?php foreach ( $raze_tools as $raze_tool ) : ?>
					<li><?php echo raze_tool_svg( $raze_tool ); // phpcs:ignore ?><span><?php echo esc_html( $raze_tool['name'] ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		<?php endfor; ?>
	</div>
</section>
