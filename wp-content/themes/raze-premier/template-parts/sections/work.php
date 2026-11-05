<?php
/**
 * Selected work.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="work" id="work">
	<div class="wrap section-head section-head-row">
		<div>
			<p class="kicker" data-reveal>Selected work</p>
			<h2 class="h-xl" data-split>Recent projects.</h2>
		</div>
		<p class="lede" data-reveal style="--d:.12s">Brand systems, product interfaces and the pieces that carry them into the world.</p>
	</div>

	<div class="wrap work-list">
		<?php foreach ( raze_work() as $raze_n => $raze_p ) : ?>
			<article class="case" data-reveal data-case>
				<div class="case-media">
					<?php foreach ( $raze_p['images'] as $raze_k => $raze_img ) : ?>
						<img class="case-img<?php echo 0 === $raze_k ? ' is-on' : ''; ?>" src="<?php echo esc_url( raze_asset( $raze_img['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_img['alt'] ); ?>" width="1600" height="1067" loading="lazy" decoding="async">
					<?php endforeach; ?>
					<div class="case-thumbs" role="group" aria-label="<?php echo esc_attr( $raze_p['client'] . ' images' ); ?>">
						<?php foreach ( $raze_p['images'] as $raze_k => $raze_img ) : ?>
							<button type="button" class="case-thumb<?php echo 0 === $raze_k ? ' is-on' : ''; ?>" data-thumb="<?php echo (int) $raze_k; ?>" aria-label="<?php echo esc_attr( sprintf( 'Show image %d', $raze_k + 1 ) ); ?>" aria-pressed="<?php echo 0 === $raze_k ? 'true' : 'false'; ?>">
								<img src="<?php echo esc_url( raze_asset( $raze_img['src'] ) ); ?>" alt="" width="160" height="107" loading="lazy" decoding="async">
							</button>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="case-copy">
					<span class="case-n mono"><?php echo esc_html( sprintf( '%02d', $raze_n + 1 ) ); ?></span>
					<p class="case-kind"><?php echo esc_html( $raze_p['kind'] ); ?></p>
					<h3 class="case-client"><?php echo esc_html( $raze_p['client'] ); ?></h3>
					<p class="case-summary"><?php echo esc_html( $raze_p['summary'] ); ?></p>
					<ul class="tags">
						<?php foreach ( $raze_p['delivered'] as $raze_d ) : ?>
							<li><?php echo esc_html( $raze_d ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
