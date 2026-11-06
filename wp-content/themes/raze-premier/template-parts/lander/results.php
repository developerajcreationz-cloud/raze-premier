<?php
/**
 * Search Console results: summary figures, then one panel per project with
 * before and after bars and the real screenshots. Tabs switch projects; the
 * view buttons switch screenshots; a screenshot opens full size.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_r = $args['l']['results'];
?>
<section class="lsec lsoft" id="results">
	<div class="wrap lhead">
		<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_r['title'] ); ?></h2>
		<p class="lede" data-reveal style="--d:.1s"><?php echo esc_html( $raze_r['sub'] ); ?></p>
	</div>

	<div class="wrap">
		<ul class="lsummary" data-reveal>
			<?php foreach ( $raze_r['summary'] as $raze_s ) : ?>
				<li><b><?php echo esc_html( $raze_s['value'] ); ?></b><span><?php echo esc_html( $raze_s['label'] ); ?></span></li>
			<?php endforeach; ?>
		</ul>

		<div class="ltabs" data-tabs data-reveal>
			<div class="ltabs-list" role="tablist" aria-label="Choose a project">
				<?php foreach ( $raze_r['projects'] as $raze_i => $raze_p ) : ?>
					<button type="button" role="tab" id="rt-<?php echo (int) $raze_i; ?>" aria-controls="rp-<?php echo (int) $raze_i; ?>" aria-selected="<?php echo 0 === $raze_i ? 'true' : 'false'; ?>" tabindex="<?php echo 0 === $raze_i ? '0' : '-1'; ?>">
						<b><?php echo esc_html( $raze_p['name'] ); ?></b><span><?php echo esc_html( $raze_p['tab'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $raze_r['projects'] as $raze_i => $raze_p ) : ?>
				<div class="ltabs-panel lproject" role="tabpanel" id="rp-<?php echo (int) $raze_i; ?>" aria-labelledby="rt-<?php echo (int) $raze_i; ?>" <?php echo $raze_i ? 'hidden' : ''; ?>>
					<div class="lproject-copy">
						<h3><?php echo esc_html( $raze_p['title'] ); ?></h3>
						<div class="kpis">
							<?php foreach ( $raze_p['kpis'] as $raze_k ) : ?>
								<div class="kpi">
									<p class="kpi-top"><span><?php echo esc_html( $raze_k['label'] ); ?></span><i><?php echo esc_html( $raze_k['change'] ); ?></i></p>
									<b><?php echo esc_html( $raze_k['now'] ); ?></b>
									<p class="kpi-row"><em>Before</em><span class="kpi-bar"><s style="--w:<?php echo (int) $raze_k['w']; ?>%"></s></span><u><?php echo esc_html( $raze_k['before'] ); ?></u></p>
									<p class="kpi-row is-now"><em>Now</em><span class="kpi-bar"><s style="--w:<?php echo isset( $raze_k['wnow'] ) ? (int) $raze_k['wnow'] : 100; ?>%"></s></span><u><?php echo esc_html( $raze_k['now'] ); ?></u></p>
								</div>
							<?php endforeach; ?>
						</div>
						<?php if ( ! empty( $raze_p['note'] ) ) : ?>
							<p class="lproject-note"><?php echo esc_html( $raze_p['note'] ); ?></p>
						<?php endif; ?>
					</div>

					<div class="lproject-shot" data-views>
						<?php if ( count( $raze_p['shots'] ) > 1 ) : ?>
							<div class="lviews">
								<?php foreach ( $raze_p['shots'] as $raze_k => $raze_s ) : ?>
									<button type="button" data-view="<?php echo (int) $raze_k; ?>" aria-pressed="<?php echo 0 === $raze_k ? 'true' : 'false'; ?>"><?php echo esc_html( $raze_s['label'] ); ?></button>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="lframe">
							<p class="lframe-bar"><i></i><i></i><i></i><span>Google Search Console</span></p>
							<?php foreach ( $raze_p['shots'] as $raze_k => $raze_s ) : ?>
								<a class="lframe-img<?php echo 0 === $raze_k ? ' is-on' : ''; ?>" href="<?php echo esc_url( raze_asset( $raze_s['src'] ) ); ?>" data-lightbox>
									<img src="<?php echo esc_url( raze_asset( $raze_s['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_s['alt'] ); ?>" width="1912" height="784" loading="lazy" decoding="async">
									<span class="lframe-zoom">Open full size</span>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="lnote"><?php echo esc_html( $raze_r['note'] ); ?></p>
	</div>

	<dialog class="lightbox" data-lightbox-dialog aria-label="Screenshot">
		<button type="button" class="lightbox-x" data-lightbox-close aria-label="Close"><?php echo raze_icon( 'close' ); // phpcs:ignore ?></button>
		<img src="" alt="">
	</dialog>
</section>
