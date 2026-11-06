<?php
/**
 * Use cases by industry: tabs, each with what gets built and a timeline of
 * what happens to a lead.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_c = $args['l']['cases'];
?>
<section class="lsec lsoft" id="use-cases">
	<div class="wrap lhead">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_c['title'] ); ?></h2>
		<p class="lede" data-reveal style="--d:.1s"><?php echo esc_html( $raze_c['sub'] ); ?></p>
	</div>
	<div class="wrap">
		<div class="ltabs" data-tabs data-reveal>
			<div class="ltabs-list" role="tablist" aria-label="Choose an industry">
				<?php foreach ( $raze_c['items'] as $raze_i => $raze_x ) : ?>
					<button type="button" role="tab" id="ct-<?php echo (int) $raze_i; ?>" aria-controls="cp-<?php echo (int) $raze_i; ?>" aria-selected="<?php echo 0 === $raze_i ? 'true' : 'false'; ?>" tabindex="<?php echo 0 === $raze_i ? '0' : '-1'; ?>">
						<b><?php echo esc_html( $raze_x['name'] ); ?></b><span><?php echo esc_html( $raze_x['tab'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
			<?php foreach ( $raze_c['items'] as $raze_i => $raze_x ) : ?>
				<div class="ltabs-panel lcase" role="tabpanel" id="cp-<?php echo (int) $raze_i; ?>" aria-labelledby="ct-<?php echo (int) $raze_i; ?>" <?php echo $raze_i ? 'hidden' : ''; ?>>
					<div>
						<h3><?php echo esc_html( $raze_x['title'] ); ?></h3>
						<ul class="lticks">
							<?php foreach ( $raze_x['ticks'] as $raze_t ) : ?>
								<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_t ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<ol class="ltimeline">
						<?php foreach ( $raze_x['steps'] as $raze_s ) : ?>
							<li><time><?php echo esc_html( $raze_s[0] ); ?></time><p><b><?php echo esc_html( $raze_s[1] ); ?></b> <?php echo esc_html( $raze_s[2] ); ?></p></li>
						<?php endforeach; ?>
					</ol>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="lnote"><?php echo esc_html( $raze_c['note'] ); ?></p>
	</div>
</section>
