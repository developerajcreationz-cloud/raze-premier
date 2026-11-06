<?php
/**
 * Lander audit form. Posts to the same handler as the homepage form, so the
 * enquiry is saved under wp-admin > Leads with the page it came from, and the
 * visitor comes back to this page.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_id     = $args['id'];
$raze_form   = $args['l']['form'];
$raze_status = raze_enquiry_status();
?>
<section class="contact" id="contact" data-dark>
	<div class="wrap contact-grid">
		<div class="contact-copy">
			<h2 class="contact-title lcontact-title" data-reveal><?php echo esc_html( $raze_form['title'] ); ?></h2>
			<p class="lede" data-reveal style="--d:.12s"><?php echo esc_html( $raze_form['sub'] ); ?></p>
			<ul class="lticks lticks-dark" data-reveal style="--d:.18s">
				<?php foreach ( $raze_form['ticks'] as $raze_t ) : ?>
					<li><?php echo raze_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $raze_t ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<form class="form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-form data-reveal style="--d:.1s">
			<?php if ( $raze_status ) : ?>
				<p class="form-status form-status-<?php echo esc_attr( $raze_status[0] ); ?>" role="status" tabindex="-1" data-status><?php echo esc_html( 'invalid' === ( isset( $_GET['enquiry'] ) ? sanitize_key( $_GET['enquiry'] ) : '' ) ? 'Please add your name and a valid email.' : $raze_status[1] ); // phpcs:ignore WordPress.Security.NonceVerification ?></p>
			<?php endif; ?>
			<input type="hidden" name="action" value="raze_contact">
			<input type="hidden" name="raze_lander" value="<?php echo esc_attr( $raze_id ); ?>">
			<input type="hidden" name="raze_t" value="<?php echo esc_attr( time() ); ?>">
			<input type="hidden" name="raze_src" value="" data-src>
			<?php wp_nonce_field( 'raze_contact', 'raze_nonce' ); ?>
			<div class="hp" aria-hidden="true">
				<label for="company_website">Leave this empty</label>
				<input type="text" id="company_website" name="company_website" tabindex="-1" autocomplete="off">
			</div>

			<div class="field-row">
				<div class="field">
					<label for="f-name">Name</label>
					<input id="f-name" name="name" type="text" autocomplete="name" required>
				</div>
				<div class="field">
					<label for="f-email">Work email</label>
					<input id="f-email" name="email" type="email" autocomplete="email" required>
				</div>
			</div>
			<div class="field">
				<label for="f-company">Website <span class="opt">optional</span></label>
				<input id="f-company" name="company" type="text" inputmode="url" placeholder="yourcompany.com">
			</div>
			<div class="field">
				<label for="f-need"><?php echo esc_html( $raze_form['label'] ); ?></label>
				<select id="f-need" name="services[]">
					<?php foreach ( $raze_form['options'] as $raze_o ) : ?>
						<option value="<?php echo esc_attr( $raze_o ); ?>"><?php echo esc_html( $raze_o ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="field">
				<label for="f-message">Anything we should know? <span class="opt">optional</span></label>
				<textarea id="f-message" name="message" rows="3"></textarea>
			</div>
			<button class="btn btn-grad btn-lg btn-block" type="submit"><?php echo esc_html( $raze_form['button'] ); ?> <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></button>
			<ul class="form-assure">
				<?php foreach ( $raze_form['fine'] as $raze_x ) : ?>
					<li><?php echo esc_html( $raze_x ); ?></li>
				<?php endforeach; ?>
			</ul>
		</form>
	</div>
</section>
