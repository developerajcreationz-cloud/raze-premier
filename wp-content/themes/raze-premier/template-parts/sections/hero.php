<?php
/**
 * Hero: centred headline with a rotating platform mark inside the text, and the same marks floating behind it in three
 * depth layers.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_book     = raze_opt( 'booking_url' );
$raze_cta      = $raze_book ? $raze_book : '#contact';
$raze_surfaces = raze_hero_surfaces();
$raze_floaters = raze_hero_floaters();
$raze_first    = array_key_first( $raze_surfaces );
?>
<section class="hero" id="top">
	<div class="hero-bg" aria-hidden="true">
		<?php foreach ( $raze_floaters as $raze_layer => $raze_items ) : ?>
			<div class="hero-layer hero-layer-<?php echo esc_attr( $raze_layer ); ?>" data-layer="<?php echo esc_attr( $raze_layer ); ?>">
				<?php foreach ( $raze_items as $raze_i => $raze_f ) : ?>
					<span class="floater" style="--x:<?php echo (float) $raze_f['x']; ?>%;--y:<?php echo (float) $raze_f['y']; ?>%;--s:<?php echo (int) $raze_f['s']; ?>px;--i:<?php echo (int) $raze_i; ?>">
						<?php echo raze_mark( $raze_f['m'] ); // phpcs:ignore ?>
					</span>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="hero-inner">
		<p class="hero-badge" data-hero-in style="--d:0s">
			<span class="hero-badge-marks" aria-hidden="true">
				<?php foreach ( array( 'google', 'chatgpt', 'instagram' ) as $raze_m ) : ?>
					<span><?php echo raze_mark( $raze_m ); // phpcs:ignore ?></span>
				<?php endforeach; ?>
			</span>
			<?php echo esc_html( raze_opt( 'hero_kicker', 'Branding, websites, search and ads' ) ); ?>
		</p>

		<h1 class="hero-title">
			<span class="hero-line" data-hero-in style="--d:.08s">Be the brand people</span>
			<span class="hero-line" data-hero-in style="--d:.16s">find first on
				<span class="surface" data-surface>
					<span class="surface-chip">
						<?php foreach ( $raze_surfaces as $raze_slug => $raze_label ) : ?>
							<span class="surface-item<?php echo $raze_slug === $raze_first ? ' is-on' : ''; ?>" data-surface-item>
								<span class="surface-mark"><?php echo raze_mark( $raze_slug ); // phpcs:ignore ?></span>
								<span class="sr-only"><?php echo esc_html( $raze_label ); ?></span>
							</span>
						<?php endforeach; ?>
					</span>
				</span>
			</span>
		</h1>

		<p class="hero-sub" data-hero-in style="--d:.28s">Brand, website, SEO for Google and AI search, Meta and Google Ads, and the funnel that turns clicks into booked calls. One team, one set of numbers.</p>

		<div class="hero-actions" data-hero-in style="--d:.38s">
			<a class="btn btn-dark btn-lg" href="<?php echo esc_url( $raze_cta ); ?>" <?php echo $raze_book ? 'target="_blank" rel="noopener"' : ''; ?> data-magnetic>
				Book a call <span class="btn-ic"><?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></span>
			</a>
			<a class="btn btn-outline btn-lg" href="#work">See our work</a>
		</div>

		<ul class="hero-points" data-hero-in style="--d:.48s">
			<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?>Fixed quote before work starts</li>
			<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?>Accounts set up in your name</li>
			<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?>Monthly report in plain numbers</li>
		</ul>
	</div>
</section>
