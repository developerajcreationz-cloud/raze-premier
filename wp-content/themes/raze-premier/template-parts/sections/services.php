<?php
/**
 * Services, set out like a values section: a statement that builds word by
 * word, a motto, then the service cards stacked in a deck that fans out as
 * the visitor scrolls.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_state = raze_values_statement();
$raze_cards = raze_service_cards();
$raze_n     = count( $raze_cards );
?>
<section class="values" id="services">
	<div class="values-statement wrap">
		<p class="values-lead" data-reveal><?php echo esc_html( $raze_state['lead'] ); ?>:</p>
		<p class="values-words">
			<?php foreach ( $raze_state['words'] as $raze_i => $raze_word ) : ?>
				<span class="values-word values-word-<?php echo (int) $raze_i; ?>" data-reveal style="--d:<?php echo esc_attr( 0.12 * $raze_i ); ?>s"><?php echo esc_html( $raze_word ); ?></span>
			<?php endforeach; ?>
		</p>
	</div>

	<div class="values-motto wrap">
		<p class="h-xl" data-reveal><span class="grad-text"><?php echo esc_html( $raze_state['motto'][0] ); ?></span> <?php echo esc_html( $raze_state['motto'][1] ); ?></p>
	</div>

	<div class="values-stage" data-fan style="--n:<?php echo (int) $raze_n; ?>">
		<div class="values-sticky">
			<div class="values-head wrap">
				<h2 class="h-lg" data-reveal>What we do</h2>
				<p class="lede" data-reveal style="--d:.1s">Six services that cover the whole path, from the first impression to the booked call. Take one, or let them work together.</p>
			</div>
			<div class="fan">
				<?php foreach ( $raze_cards as $raze_i => $raze_card ) : ?>
					<?php $raze_o = $raze_i - ( $raze_n - 1 ) / 2; ?>
					<article class="vcard" id="<?php echo esc_attr( sanitize_title( $raze_card['name'] ) ); ?>" style="--i:<?php echo (int) $raze_i; ?>;--o:<?php echo esc_attr( $raze_o ); ?>;--a:<?php echo esc_attr( abs( $raze_o ) ); ?>">
						<span class="vcard-ic"><?php echo raze_icon( $raze_card['icon'] ); // phpcs:ignore ?></span>
						<h3 class="vcard-title"><?php echo esc_html( $raze_card['name'] ); ?></h3>
						<p class="vcard-line"><?php echo esc_html( $raze_card['line'] ); ?></p>
						<p class="vcard-desc"><?php echo esc_html( $raze_card['desc'] ); ?></p>
						<ul class="vcard-tags">
							<?php foreach ( array_slice( $raze_card['tags'], 0, 3 ) as $raze_tag ) : ?>
								<li><?php echo esc_html( $raze_tag ); ?></li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
