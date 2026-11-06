<?php
/**
 * Selected work: an oversized "Our work" title that fills in on scroll,
 * then each project as a main image, the story, and a tall side image.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="work" id="work">
	<div class="work-title" data-worktitle aria-hidden="true">
		<span class="wt-solid">Our</span> <span class="wt-outline" data-text="work">work</span>
	</div>
	<div class="wrap">
		<h2 class="sr-only">Our work</h2>
		<p class="work-intro lede" data-reveal>Brand systems, product interfaces and the pieces that carry them into the world.</p>
	</div>

	<div class="wrap work-list">
		<?php foreach ( raze_work() as $raze_n => $raze_p ) : ?>
			<?php $raze_imgs = $raze_p['images']; ?>
			<article class="project<?php echo $raze_n % 2 ? ' is-flip' : ''; ?>" data-reveal>
				<figure class="project-main" data-cursor="View">
					<img src="<?php echo esc_url( raze_asset( $raze_imgs[0]['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_imgs[0]['alt'] ); ?>" width="1600" height="1067" loading="lazy" decoding="async">
					<figcaption class="project-badge mono"><?php echo esc_html( sprintf( '%02d', $raze_n + 1 ) ); ?> / <?php echo esc_html( $raze_p['kind'] ); ?></figcaption>
				</figure>

				<div class="project-copy">
					<h3 class="project-client"><?php echo esc_html( $raze_p['client'] ); ?></h3>
					<p class="project-summary"><?php echo esc_html( $raze_p['summary'] ); ?></p>
					<p class="project-label">Delivered:</p>
					<ul class="tags">
						<?php foreach ( $raze_p['delivered'] as $raze_d ) : ?>
							<li><?php echo esc_html( $raze_d ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="project-side">
					<?php foreach ( array_slice( $raze_imgs, 1, 2 ) as $raze_img ) : ?>
						<figure data-parallax="<?php echo $raze_n % 2 ? '-0.06' : '0.06'; ?>">
							<img src="<?php echo esc_url( raze_asset( $raze_img['src'] ) ); ?>" alt="<?php echo esc_attr( $raze_img['alt'] ); ?>" width="1600" height="1067" loading="lazy" decoding="async">
						</figure>
					<?php endforeach; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
