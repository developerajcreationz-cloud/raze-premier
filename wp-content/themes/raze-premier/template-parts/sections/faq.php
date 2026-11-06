<?php
/**
 * FAQ: centred heading, an email line, then the questions in two columns.
 * Each question opens in place (details and summary, no script needed).
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_faqs  = raze_faqs();
$raze_email = raze_opt( 'email' );
$raze_cols  = array_chunk( $raze_faqs, (int) ceil( count( $raze_faqs ) / 2 ) );
?>
<section class="faq" id="faq">
	<div class="wrap faq-head">
		<h2 class="h-xl faq-title" data-reveal>Everything you’re wondering</h2>
		<p class="faq-sub" data-reveal style="--d:.1s">
			<?php if ( $raze_email ) : ?>
				Or ask us anything at <a href="mailto:<?php echo esc_attr( antispambot( $raze_email ) ); ?>"><?php echo esc_html( antispambot( $raze_email ) ); ?></a>
			<?php else : ?>
				Or ask us anything <a href="#contact">through the form below</a>
			<?php endif; ?>
		</p>
	</div>

	<div class="wrap faq-grid">
		<?php foreach ( $raze_cols as $raze_c => $raze_col ) : ?>
			<div class="faq-col">
				<?php foreach ( $raze_col as $raze_i => $raze_f ) : ?>
					<details class="faq-item" data-reveal style="--d:<?php echo esc_attr( 0.05 * $raze_i + 0.05 * $raze_c ); ?>s">
						<summary><span><?php echo esc_html( $raze_f['q'] ); ?></span><i aria-hidden="true"></i></summary>
						<div class="faq-a"><p><?php echo esc_html( $raze_f['a'] ); ?></p></div>
					</details>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>
