<?php
/**
 * Site footer.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_home  = is_front_page() ? '' : home_url( '/' );
$raze_email = raze_opt( 'email' );
?>
<footer class="site-footer">
	<div class="wrap footer-grid">
		<div class="footer-about">
			<p class="footer-lead">Brand, website, search, ads and the follow-up. One team, one set of numbers.</p>
			<?php if ( $raze_email ) : ?>
				<a class="footer-email" href="mailto:<?php echo esc_attr( antispambot( $raze_email ) ); ?>"><?php echo esc_html( antispambot( $raze_email ) ); ?></a>
			<?php endif; ?>
		</div>

		<div class="footer-col">
			<h2 class="footer-h">Services</h2>
			<ul>
				<?php foreach ( raze_service_groups() as $raze_group ) : ?>
					<?php foreach ( $raze_group['items'] as $raze_item ) : ?>
						<li><a href="<?php echo esc_url( $raze_home . '#' . $raze_group['id'] ); ?>"><?php echo esc_html( $raze_item['name'] ); ?></a></li>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="footer-col">
			<h2 class="footer-h">Studio</h2>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'depth' => 1 ) );
			} else {
				?>
				<ul>
					<li><a href="<?php echo esc_url( $raze_home . '#work' ); ?>">Work</a></li>
					<li><a href="<?php echo esc_url( $raze_home . '#process' ); ?>">Process</a></li>
					<li><a href="<?php echo esc_url( $raze_home . '#faq' ); ?>">FAQ</a></li>
					<li><a href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Contact</a></li>
					<?php if ( get_privacy_policy_url() ) : ?>
						<li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy</a></li>
					<?php endif; ?>
				</ul>
			<?php } ?>
		</div>

		<?php $raze_socials = raze_socials(); ?>
		<?php if ( $raze_socials ) : ?>
			<div class="footer-col">
				<h2 class="footer-h">Follow</h2>
				<ul>
					<?php foreach ( $raze_socials as $raze_label => $raze_url ) : ?>
						<li><a href="<?php echo esc_url( $raze_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $raze_label ); ?> <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>

	<div class="footer-word" aria-hidden="true" data-reveal>
		<span>Raze</span><span>Premier</span>
	</div>

	<div class="wrap footer-base">
		<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Raze Premier</span>
		<a href="#top" data-to-top>Back to top <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
