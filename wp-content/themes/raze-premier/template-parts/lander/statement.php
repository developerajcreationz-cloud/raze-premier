<?php
/**
 * Lander statement: the same word-by-word card as the homepage, with the
 * lander's own line.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $args['l']['statement'] ) ) {
	return;
}
?>
<section class="statement" aria-label="<?php echo esc_attr( $args['l']['name'] . ' in one line' ); ?>">
	<figure class="wrap">
		<blockquote class="statement-card" data-words data-zoom>
			<p><?php echo raze_highlight( $args['l']['statement'] ); // phpcs:ignore ?></p>
		</blockquote>
	</figure>
</section>
