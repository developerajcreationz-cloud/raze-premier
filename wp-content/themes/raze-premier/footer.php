<?php
/**
 * Site footer: link columns, contact details and socials, the legal row,
 * and the oversized wordmark on the purple glow.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_home  = is_front_page() ? '' : home_url( '/' );
$raze_email = raze_opt( 'email' );
$raze_phone = raze_opt( 'phone' );
$raze_socials = raze_socials();
?>
<footer class="site-footer">
	<div class="footer-glow" aria-hidden="true"></div>
	<div class="wrap footer-grid">
		<div class="footer-links">
			<ul>
				<li><a href="<?php echo esc_url( $raze_home . '#top' ); ?>">Home</a></li>
				<li><a href="<?php echo esc_url( $raze_home . '#services' ); ?>">Services</a></li>
				<li><a href="<?php echo esc_url( $raze_home . '#work' ); ?>">Our work</a></li>
				<li><a href="<?php echo esc_url( $raze_home . '#process' ); ?>">Process</a></li>
			</ul>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'depth' => 1 ) );
			} else {
				?>
				<ul>
					<li><a href="<?php echo esc_url( $raze_home . '#results' ); ?>">Results</a></li>
					<li><a href="<?php echo esc_url( $raze_home . '#reviews' ); ?>">Reviews</a></li>
					<li><a href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Contact</a></li>
				</ul>
			<?php } ?>
			<ul class="footer-services">
				<?php foreach ( raze_service_cards() as $raze_item ) : ?>
					<li><a href="<?php echo esc_url( $raze_home . '#' . sanitize_title( $raze_item['name'] ) ); ?>"><?php echo esc_html( $raze_item['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="footer-reach">
			<p class="footer-h">Get in touch</p>
			<?php if ( $raze_email ) : ?>
				<a class="footer-email" href="mailto:<?php echo esc_attr( antispambot( $raze_email ) ); ?>"><?php echo esc_html( antispambot( $raze_email ) ); ?></a>
			<?php endif; ?>
			<?php if ( $raze_phone ) : ?>
				<a href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^\d+]/', '', $raze_phone ) ); ?>"><?php echo esc_html( $raze_phone ); ?></a>
			<?php endif; ?>
			<?php if ( ! $raze_email && ! $raze_phone ) : ?>
				<a href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Send us a message</a>
			<?php endif; ?>
			<?php if ( $raze_socials ) : ?>
				<ul class="footer-social">
					<?php foreach ( $raze_socials as $raze_label => $raze_url ) : ?>
						<li><a href="<?php echo esc_url( $raze_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $raze_label ); ?> <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>

	<div class="wrap footer-base">
		<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Raze Premier</span>
		<?php if ( get_privacy_policy_url() ) : ?>
			<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy policy</a>
		<?php endif; ?>
		<a href="#top" data-to-top>Back to top <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>

	<div class="footer-word" aria-hidden="true" data-footword>
		<span class="fw-raze">raze</span>
		<span class="fw-tag">Be the brand they find first</span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
