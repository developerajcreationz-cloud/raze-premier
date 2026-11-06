<?php
/**
 * Use cases in the homepage's "How a project runs" style: a lavender card
 * with the industry tabs on the left and that industry's workflow on the
 * right. The workflow runs step by step and replays when the tab changes.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_c     = $args['l']['cases'];
$raze_icons = array( 'bell', 'search', 'doc', 'check' );
?>
<section class="process lcases" id="use-cases">
	<div class="process-card" data-zoom>
		<div class="process-copy" data-tabs>
			<p class="kicker" data-reveal>Built for your business</p>
			<h2 class="h-xl process-title" data-reveal><?php echo esc_html( $raze_c['title'] ); ?></h2>
			<p class="lede" data-reveal style="--d:.1s"><?php echo esc_html( $raze_c['sub'] ); ?></p>
			<div class="lpills" role="tablist" aria-label="Choose an industry" data-reveal style="--d:.16s">
				<?php foreach ( $raze_c['items'] as $raze_i => $raze_x ) : ?>
					<button type="button" role="tab" id="ct-<?php echo (int) $raze_i; ?>" aria-controls="cp-<?php echo (int) $raze_i; ?>" aria-selected="<?php echo 0 === $raze_i ? 'true' : 'false'; ?>" tabindex="<?php echo 0 === $raze_i ? '0' : '-1'; ?>"><?php echo esc_html( $raze_x['name'] ); ?></button>
				<?php endforeach; ?>
			</div>
			<?php foreach ( $raze_c['items'] as $raze_i => $raze_x ) : ?>
				<div class="lcase-copy" data-for="cp-<?php echo (int) $raze_i; ?>" <?php echo $raze_i ? 'hidden' : ''; ?>>
					<h3><?php echo esc_html( $raze_x['title'] ); ?></h3>
					<ul class="lticks">
						<?php foreach ( $raze_x['ticks'] as $raze_t ) : ?>
							<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_t ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
			<a class="btn btn-white" href="#contact" data-reveal style="--d:.2s">Get my free audit</a>
		</div>

		<div class="lcase-flows">
			<?php foreach ( $raze_c['items'] as $raze_i => $raze_x ) : ?>
				<div class="ltabs-panel lcase-flow" role="tabpanel" id="cp-<?php echo (int) $raze_i; ?>" aria-labelledby="ct-<?php echo (int) $raze_i; ?>" <?php echo $raze_i ? 'hidden' : ''; ?>>
					<?php
					$raze_nodes = array();
					foreach ( $raze_x['steps'] as $raze_k => $raze_s ) {
						$raze_nodes[] = array(
							'icon'  => $raze_icons[ $raze_k % count( $raze_icons ) ],
							'tag'   => $raze_s[0],
							'title' => $raze_s[1],
							'body'  => ucfirst( $raze_s[2] ) . '.',
						);
					}
					raze_flow_line( $raze_nodes );
					?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<p class="wrap lnote"><?php echo esc_html( $raze_c['note'] ); ?></p>
</section>
