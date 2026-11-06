<?php
/**
 * Contact form.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_status   = raze_enquiry_status();
$raze_email    = raze_opt( 'email' );
$raze_phone    = raze_opt( 'phone' );
$raze_whatsapp = raze_opt( 'whatsapp' );
$raze_book     = raze_opt( 'booking_url' );
?>
<section class="contact" id="contact" data-dark>
	<div class="wrap contact-grid">
		<div class="contact-copy">
			<h2 class="contact-title" data-reveal>Let&rsquo;s bring your <span class="grad-text">ideas</span> to life</h2>
			<p class="lede" data-reveal style="--d:.12s">Tell us what you sell and who buys it. We will look at your site, search presence and ads before the call, and come back with what we would do first. No obligation.</p>

			<ul class="contact-direct" data-reveal style="--d:.18s">
				<?php if ( $raze_book ) : ?>
					<li><a href="<?php echo esc_url( $raze_book ); ?>" target="_blank" rel="noopener">Pick a time on the calendar <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a></li>
				<?php endif; ?>
				<?php if ( $raze_email ) : ?>
					<li><a href="mailto:<?php echo esc_attr( antispambot( $raze_email ) ); ?>"><?php echo esc_html( antispambot( $raze_email ) ); ?></a></li>
				<?php endif; ?>
				<?php if ( $raze_whatsapp ) : ?>
					<li><a href="<?php echo esc_url( 'https://wa.me/' . $raze_whatsapp ); ?>" target="_blank" rel="noopener">WhatsApp us <?php echo raze_icon( 'arrow-ne' ); // phpcs:ignore ?></a></li>
				<?php endif; ?>
				<?php if ( $raze_phone ) : ?>
					<li><a href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^\d+]/', '', $raze_phone ) ); ?>"><?php echo esc_html( $raze_phone ); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>

		<form class="form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-form data-reveal style="--d:.1s">
				<?php if ( $raze_status ) : ?>
					<p class="form-status form-status-<?php echo esc_attr( $raze_status[0] ); ?>" role="status" tabindex="-1" data-status><?php echo esc_html( $raze_status[1] ); ?></p>
				<?php endif; ?>

				<input type="hidden" name="action" value="raze_contact">
				<input type="hidden" name="raze_t" value="<?php echo esc_attr( time() ); ?>">
				<input type="hidden" name="raze_src" value="" data-src>
				<?php wp_nonce_field( 'raze_contact', 'raze_nonce' ); ?>

				<div class="hp" aria-hidden="true">
					<label for="company_website">Leave this empty</label>
					<input type="text" id="company_website" name="company_website" tabindex="-1" autocomplete="off">
				</div>

				<div class="field-row">
					<div class="field">
						<label for="f-name">Your name</label>
						<input id="f-name" name="name" type="text" autocomplete="name" required>
					</div>
					<div class="field">
						<label for="f-email">Email</label>
						<input id="f-email" name="email" type="email" autocomplete="email" required>
					</div>
				</div>

				<div class="field">
					<label for="f-company">Company or website <span class="opt">optional</span></label>
					<input id="f-company" name="company" type="text" autocomplete="organization">
				</div>

				<fieldset class="field">
					<legend>What do you need help with?</legend>
					<div class="pick">
						<?php foreach ( raze_service_options() as $raze_i => $raze_choice ) : ?>
							<label class="pick-item">
								<input type="checkbox" name="services[]" value="<?php echo esc_attr( $raze_choice ); ?>">
								<span><?php echo esc_html( $raze_choice ); ?></span>
							</label>
						<?php endforeach; ?>
					</div>
				</fieldset>

				<div class="field">
					<label for="f-message">A few lines about the business and the goal</label>
					<textarea id="f-message" name="message" rows="4" required></textarea>
				</div>

				<button class="btn btn-light btn-lg btn-block" type="submit">Send enquiry <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></button>
				<p class="form-fine">We only use these details to reply to you.</p>
			</form>
	</div>
</section>
