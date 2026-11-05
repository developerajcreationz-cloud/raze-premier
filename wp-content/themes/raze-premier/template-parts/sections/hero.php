<?php
/**
 * Hero with rotating search surface and a sample lead report.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_places = raze_hero_places();
$raze_book   = raze_opt( 'booking_url' );
$raze_cta    = $raze_book ? $raze_book : '#contact';

$raze_sources = array(
	array( 'Google Ads', 38 ),
	array( 'Organic search', 27 ),
	array( 'Meta Ads', 21 ),
	array( 'Google Maps', 14 ),
	array( 'AI assistants', 9 ),
);
$raze_max = 38;

$raze_feed = array(
	array( 'Kitchen refit quote', 'Google Ads', '2m' ),
	array( 'Consultation booked', 'ChatGPT referral', '14m' ),
	array( 'Bridal package enquiry', 'Instagram ad', '41m' ),
	array( 'Clinic appointment', 'Google Maps', '1h' ),
);
?>
<section class="hero" id="top">
	<div class="hero-bg" aria-hidden="true"></div>
	<div class="wrap hero-inner">
		<p class="kicker hero-kicker" data-reveal><span class="dot" aria-hidden="true"></span><?php echo esc_html( raze_opt( 'hero_kicker', 'Branding, websites, search and ads' ) ); ?></p>

		<h1 class="hero-title" data-reveal style="--d:.08s">
			Be the business they find
			<span class="swap" data-swap aria-live="off">
				<span class="swap-track">
					<?php foreach ( $raze_places as $raze_i => $raze_place ) : ?>
						<span class="swap-word<?php echo 0 === $raze_i ? ' is-on' : ''; ?>"><?php echo esc_html( $raze_place ); ?></span>
					<?php endforeach; ?>
				</span>
			</span>
			<span class="hero-title-2">and the one they call.</span>
		</h1>

		<p class="hero-lede" data-reveal style="--d:.16s">
			Raze Premier builds your brand and website, gets you found in Google and AI search, runs your Meta and Google Ads, and sets up the funnel that turns clicks into booked calls.
		</p>

		<div class="hero-actions" data-reveal style="--d:.24s">
			<a class="btn btn-signal btn-lg" href="<?php echo esc_url( $raze_cta ); ?>" <?php echo $raze_book ? 'target="_blank" rel="noopener"' : ''; ?>>Book a free audit call <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn-ghost btn-lg" href="#work">See recent work</a>
		</div>
	</div>

	<div class="wrap">
		<figure class="report" data-reveal data-report style="--d:.32s">
			<div class="report-bar">
				<span class="report-dots" aria-hidden="true"><i></i><i></i><i></i></span>
				<span class="report-url">Monthly lead report</span>
				<span class="report-flag">Sample data</span>
			</div>
			<div class="report-body">
				<div class="report-panel report-sources">
					<div class="report-h">
						<span>Enquiries by source</span>
						<span class="mono"><span data-count="109">0</span> this month</span>
					</div>
					<ul class="bars">
						<?php foreach ( $raze_sources as $raze_s ) : ?>
							<li>
								<span class="bar-label"><?php echo esc_html( $raze_s[0] ); ?></span>
								<span class="bar-track"><span class="bar-fill" style="--w:<?php echo esc_attr( round( $raze_s[1] / $raze_max * 100 ) ); ?>%"></span></span>
								<span class="bar-num mono" data-count="<?php echo esc_attr( $raze_s[1] ); ?>">0</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="report-panel report-feed">
					<div class="report-h"><span>Latest enquiries</span><span class="live"><i aria-hidden="true"></i>Live</span></div>
					<ul class="feed">
						<?php foreach ( $raze_feed as $raze_k => $raze_f ) : ?>
							<li style="--i:<?php echo (int) $raze_k; ?>">
								<span class="feed-name"><?php echo esc_html( $raze_f[0] ); ?></span>
								<span class="feed-src"><?php echo esc_html( $raze_f[1] ); ?></span>
								<span class="feed-time mono"><?php echo esc_html( $raze_f[2] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="report-panel report-cpl">
					<div class="report-h"><span>Cost per lead</span><span class="mono down">&minus;<span data-count="31">0</span>%</span></div>
					<svg class="spark" viewBox="0 0 300 80" preserveAspectRatio="none" aria-hidden="true">
						<path class="spark-area" d="M0 18 L40 22 L80 20 L120 34 L160 38 L200 50 L240 52 L300 60 L300 80 L0 80 Z" />
						<path class="spark-line" d="M0 18 L40 22 L80 20 L120 34 L160 38 L200 50 L240 52 L300 60" pathLength="1" />
					</svg>
					<p class="report-note">Every enquiry tagged with the campaign that produced it.</p>
				</div>
			</div>
			<figcaption class="sr-only">An example of the monthly lead report clients receive. The numbers are illustrative.</figcaption>
		</figure>
	</div>
</section>
