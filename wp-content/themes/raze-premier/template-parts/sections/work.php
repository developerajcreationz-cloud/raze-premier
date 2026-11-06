<?php
/**
 * Selected work on white: an oversized "Our work" title that fills in on
 * scroll, then each project as a card. The cards pin one after another and
 * stack, the earlier ones shrinking back as the next slides over them.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_work = raze_work();
$raze_n    = count( $raze_work );
?>
<section class="work" id="work">
	<div class="work-title" data-worktitle aria-hidden="true">
		<span class="wt-solid">Our</span> <span class="wt-outline" data-text="work">work</span>
	</div>
	<div class="wrap work-headrow">
		<h2 class="sr-only">Our work</h2>
		<p class="lede" data-reveal>Brand systems, product interfaces and the pieces that carry them into the world.</p>
		<p class="work-count mono" data-reveal style="--d:.1s"><?php echo esc_html( sprintf( '%02d projects', $raze_n ) ); ?></p>
	</div>

	<div class="wrap stack" data-stack>
		<?php foreach ( $raze_work as $raze_i => $raze_p ) : ?>
			<?php $raze_imgs = $raze_p['images']; ?>
			<article class="scard scard-<?php echo (int) $raze_i; ?>" data-scard style="--i:<?php echo (int) $raze_i; ?>">
				<div class="scard-inner">
					<figure class="scard-main" data-cursor="View">
						<img src="<?php echo esc_url( raze_asset( $raze_imgs[0]['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_imgs[0]['alt'] ); ?>" width="1600" height="1067" loading="lazy" decoding="async">
					</figure>

					<div class="scard-copy">
						<p class="scard-top mono"><span><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span><?php echo esc_html( $raze_p['kind'] ); ?></p>
						<h3 class="scard-client"><?php echo esc_html( $raze_p['client'] ); ?></h3>
						<p class="scard-summary"><?php echo esc_html( $raze_p['summary'] ); ?></p>
						<p class="scard-label">Delivered</p>
						<ul class="tags">
							<?php foreach ( $raze_p['delivered'] as $raze_d ) : ?>
								<li><?php echo esc_html( $raze_d ); ?></li>
							<?php endforeach; ?>
						</ul>
						<div class="scard-thumbs">
							<?php foreach ( array_slice( $raze_imgs, 1, 2 ) as $raze_img ) : ?>
								<figure><img src="<?php echo esc_url( raze_asset( $raze_img['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_img['alt'] ); ?>" width="1600" height="1067" loading="lazy" decoding="async"></figure>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
