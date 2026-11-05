<?php
/**
 * Hero: full-bleed photo in a rounded frame, centred heading and meeting CTA.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_book  = raze_opt( 'booking_url' );
$raze_cta   = $raze_book ? $raze_book : '#contact';
$raze_work  = raze_work();
$raze_first = $raze_work ? $raze_work[0] : null;
$raze_count = count( raze_service_cards() );
?>
<section class="hero" id="top">
	<div class="hero-frame" data-hero>
		<div class="hero-media" data-hero-media>
			<img src="<?php echo esc_url( raze_asset( 'img/hero.webp' ) ); ?>"
				srcset="<?php echo esc_url( raze_asset( 'img/hero-1200.webp' ) ); ?> 1200w, <?php echo esc_url( raze_asset( 'img/hero.webp' ) ); ?> 2400w"
				sizes="100vw" alt="" width="2400" height="1600" fetchpriority="high" decoding="async">
		</div>
		<div class="hero-shade" aria-hidden="true"></div>
		<div class="streaks" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i></div>

		<div class="hero-center">
			<p class="eyebrow" data-reveal><span class="dot" aria-hidden="true"></span><?php echo esc_html( raze_opt( 'hero_kicker', 'Branding, websites, search and ads' ) ); ?></p>
			<h1 class="hero-title" data-split>Be the business they find <em>first.</em></h1>
			<p class="hero-sub" data-reveal style="--d:.5s">Brand, website, SEO for Google and AI search, Meta and Google Ads, and the funnel that turns clicks into booked calls.</p>
			<div class="hero-actions" data-reveal style="--d:.62s">
				<a class="btn btn-lime btn-lg" href="<?php echo esc_url( $raze_cta ); ?>" <?php echo $raze_book ? 'target="_blank" rel="noopener"' : ''; ?> data-magnetic>
					Book a meeting <span class="btn-ic"><?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></span>
				</a>
				<a class="btn btn-glass btn-lg" href="#work">See our work</a>
			</div>
		</div>

		<?php if ( $raze_first ) : ?>
			<a class="hero-card" href="#work" data-reveal style="--d:.8s" data-float>
				<img src="<?php echo esc_url( raze_asset( $raze_first['images'][0]['src'] ) ); ?>" alt="" width="1600" height="1067" loading="eager" decoding="async">
				<span class="hero-card-body">
					<small class="mono">Recent work</small>
					<b><?php echo esc_html( $raze_first['client'] ); ?></b>
					<span><?php echo esc_html( $raze_first['kind'] ); ?></span>
				</span>
			</a>
		<?php endif; ?>

		<div class="hero-corner" data-reveal style="--d:.9s">
			<b><span data-count="<?php echo (int) $raze_count; ?>"><?php echo (int) $raze_count; ?></span> services</b>
			<span>one team, one set of numbers</span>
		</div>

		<a class="hero-scroll mono" href="#tools" aria-label="Scroll to content"><span></span>Scroll</a>
	</div>
</section>
