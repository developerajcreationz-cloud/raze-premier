<?php
/**
 * Questions people ask before they get in touch.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="faq" id="faq">
	<div class="wrap faq-grid">
		<div class="section-head">
			<p class="kicker" data-reveal>Questions</p>
			<h2 class="h-xl" data-split>Before you ask.</h2>
			<p class="lede" data-reveal style="--d:.12s">Something else on your mind? <a href="#contact">Send it with the form</a> and we will answer it on the call.</p>
		</div>
		<div class="faq-list">
			<?php foreach ( raze_faqs() as $raze_i => $raze_f ) : ?>
				<details class="qa" data-reveal <?php echo 0 === $raze_i ? 'open' : ''; ?>>
					<summary><span><?php echo esc_html( $raze_f['q'] ); ?></span><?php echo raze_icon( 'plus' ); // phpcs:ignore ?></summary>
					<div class="qa-a"><p><?php echo esc_html( $raze_f['a'] ); ?></p></div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
