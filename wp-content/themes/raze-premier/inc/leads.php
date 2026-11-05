<?php
/**
 * Contact form: validation, storage and notification.
 *
 * Every enquiry is saved as a private "Lead" post (wp-admin > Leads) and
 * emailed, so nothing is lost if mail delivery fails.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * Private post type for enquiries.
 */
function raze_register_leads() {
	register_post_type(
		'raze_lead',
		array(
			'labels'          => array(
				'name'          => __( 'Leads', 'raze' ),
				'singular_name' => __( 'Lead', 'raze' ),
				'edit_item'     => __( 'View lead', 'raze' ),
			),
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => false,
			'menu_icon'       => 'dashicons-email-alt',
			'menu_position'   => 25,
			'supports'        => array( 'title', 'editor', 'custom-fields' ),
			'capability_type' => 'post',
			'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'    => true,
		)
	);
}
add_action( 'init', 'raze_register_leads' );

/**
 * Handle a form post.
 */
function raze_handle_contact() {
	$back = home_url( '/' );

	if ( ! isset( $_POST['raze_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['raze_nonce'] ) ), 'raze_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'expired', $back ) . '#contact' );
		exit;
	}

	// Honeypot: real people never fill this field.
	if ( ! empty( $_POST['company_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'sent', $back ) . '#contact' );
		exit;
	}

	// Very fast submissions are almost always bots.
	$started = isset( $_POST['raze_t'] ) ? absint( $_POST['raze_t'] ) : 0;
	if ( $started && ( time() - $started ) < 3 ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'sent', $back ) . '#contact' );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$posted  = isset( $_POST['services'] ) ? (array) wp_unslash( $_POST['services'] ) : array();
	$allowed = raze_service_options();
	$services = array_values( array_intersect( array_map( 'sanitize_text_field', $posted ), $allowed ) );

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'invalid', $back ) . '#contact' );
		exit;
	}

	$body  = "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= $company ? "Company or website: {$company}\n" : '';
	$body .= $services ? 'Interested in: ' . implode( ', ', $services ) . "\n" : '';
	$body .= "\n{$message}\n";

	$lead_id = wp_insert_post(
		array(
			'post_type'    => 'raze_lead',
			'post_status'  => 'private',
			'post_title'   => sprintf( '%s (%s)', $name, $company ? $company : $email ),
			'post_content' => $body,
		)
	);
	if ( $lead_id && ! is_wp_error( $lead_id ) ) {
		update_post_meta( $lead_id, 'email', $email );
		update_post_meta( $lead_id, 'services', implode( ', ', $services ) );
		update_post_meta( $lead_id, 'source', isset( $_POST['raze_src'] ) ? sanitize_text_field( wp_unslash( $_POST['raze_src'] ) ) : '' );
	}

	$to = raze_opt( 'lead_email', get_option( 'admin_email' ) );
	wp_mail(
		$to,
		sprintf( 'New enquiry from %s', $name ),
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'enquiry', 'sent', $back ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_raze_contact', 'raze_handle_contact' );
add_action( 'admin_post_raze_contact', 'raze_handle_contact' );

/**
 * Status message after a submission.
 *
 * @return array|null [type, text]
 */
function raze_enquiry_status() {
	$state = isset( $_GET['enquiry'] ) ? sanitize_key( wp_unslash( $_GET['enquiry'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
	$map   = array(
		'sent'    => array( 'ok', 'Thanks. Your message is with us and we will reply by email.' ),
		'invalid' => array( 'error', 'Please add your name, a valid email and a short message.' ),
		'expired' => array( 'error', 'The form timed out. Please send it again.' ),
	);
	return isset( $map[ $state ] ) ? $map[ $state ] : null;
}
