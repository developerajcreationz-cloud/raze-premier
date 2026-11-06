<?php
/**
 * Statement between the hero and the services. The words light up one by
 * one as the visitor scrolls, and the dock finishes its climb to the top
 * while this is on screen.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="statement" id="intro" aria-label="What we do, in one line">
	<figure class="wrap">
		<blockquote class="statement-card" data-words data-zoom>
			<p><?php echo raze_highlight( raze_statement() ); // phpcs:ignore ?></p>
		</blockquote>
	</figure>
</section>
