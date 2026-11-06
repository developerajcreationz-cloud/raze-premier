<?php
/**
 * Site footer: brand line and call to action, link columns, contact, the
 * oversized wordmark on the purple glow, and the legal row.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_home    = is_front_page() ? '' : home_url( '/' );
$raze_email   = raze_opt( 'email' );
$raze_phone   = raze_opt( 'phone' );
$raze_book    = raze_opt( 'booking_url' );
$raze_cta     = $raze_book ? $raze_book : $raze_home . '#contact';
$raze_socials = raze_socials();
?>
<footer class="site-footer" data-dark>
	<div class="footer-glow" aria-hidden="true"></div>

	<div class="wrap footer-top">
		<div class="footer-brand" data-reveal>
			<?php echo raze_wordmark( 'wordmark-ft' ); // phpcs:ignore ?>
			<p>Brand, website, search, ads and the follow-up. One team, one set of numbers.</p>
			<a class="btn btn-grad" href="<?php echo esc_url( $raze_cta ); ?>" <?php echo $raze_book ? 'target="_blank" rel="noopener"' : ''; ?>>Start a project <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>

		<div class="footer-cols">
			<div class="footer-col" data-reveal style="--d:.06s">
				<p class="footer-h">Studio</p>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'depth' => 1 ) );
				} else {
					?>
					<ul>
						<li><a href="<?php echo esc_url( $raze_home . '#services' ); ?>">Services</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#work' ); ?>">Our work</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#process' ); ?>">Process</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#results' ); ?>">Results</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#reviews' ); ?>">Reviews</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#faq' ); ?>">FAQ</a></li>
						<li><a href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Contact</a></li>
					</ul>
				<?php } ?>
			</div>

			<div class="footer-col" data-reveal style="--d:.12s">
				<p class="footer-h">Services</p>
				<ul>
					<?php foreach ( raze_service_cards() as $raze_item ) : ?>
						<li><a href="<?php echo esc_url( $raze_home . '#services' ); ?>"><?php echo esc_html( $raze_item['name'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col" data-reveal style="--d:.18s">
				<p class="footer-h">Get in touch</p>
				<ul>
					<?php if ( $raze_email ) : ?>
						<li><a href="mailto:<?php echo esc_attr( antispambot( $raze_email ) ); ?>"><?php echo esc_html( antispambot( $raze_email ) ); ?></a></li>
					<?php endif; ?>
					<?php if ( $raze_phone ) : ?>
						<li><a href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^\d+]/', '', $raze_phone ) ); ?>"><?php echo esc_html( $raze_phone ); ?></a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Send us a message</a></li>
					<?php foreach ( $raze_socials as $raze_label => $raze_url ) : ?>
						<li><a href="<?php echo esc_url( $raze_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $raze_label ); ?> <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="footer-word" aria-hidden="true" data-footword>
		<span class="fw-raze" data-text="raze">raze</span>
	</div>

	<div class="wrap footer-base">
		<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Raze Premier. All rights reserved.</span>
		<span class="footer-base-links">
			<?php if ( get_privacy_policy_url() ) : ?>
				<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy policy</a>
			<?php endif; ?>
			<a href="#top" data-to-top>Back to top <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
		</span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
