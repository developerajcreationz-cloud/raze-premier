<?php
/**
 * Customizer settings: contact details and hero text.
 *
 * Appearance > Customize > Raze Premier.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register settings.
 *
 * @param WP_Customize_Manager $wp_customize Manager.
 */
function raze_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'raze_contact',
		array(
			'title'       => __( 'Raze Premier', 'raze' ),
			'description' => __( 'Contact details and hero text for the landing page. Empty fields are hidden on the site.', 'raze' ),
			'priority'    => 30,
		)
	);

	$fields = array(
		'hero_kicker'   => array( __( 'Hero label', 'raze' ), 'text', 'sanitize_text_field', 'Branding, websites, search and ads' ),
		'email'         => array( __( 'Public email address', 'raze' ), 'email', 'sanitize_email', '' ),
		'lead_email'    => array( __( 'Send form enquiries to (defaults to the admin email)', 'raze' ), 'email', 'sanitize_email', '' ),
		'phone'         => array( __( 'Phone', 'raze' ), 'text', 'sanitize_text_field', '' ),
		'whatsapp'      => array( __( 'WhatsApp number, international format, digits only', 'raze' ), 'text', 'raze_sanitize_digits', '' ),
		'booking_url'   => array( __( 'Booking link (Calendly, Cal.com, GHL)', 'raze' ), 'url', 'esc_url_raw', '' ),
		'instagram'     => array( __( 'Instagram URL', 'raze' ), 'url', 'esc_url_raw', '' ),
		'linkedin'      => array( __( 'LinkedIn URL', 'raze' ), 'url', 'esc_url_raw', '' ),
		'facebook'      => array( __( 'Facebook URL', 'raze' ), 'url', 'esc_url_raw', '' ),
		'behance'       => array( __( 'Behance URL', 'raze' ), 'url', 'esc_url_raw', '' ),
		'meta_desc'     => array( __( 'Homepage meta description', 'raze' ), 'textarea', 'sanitize_textarea_field', '' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'raze_' . $key,
			array(
				'default'           => $field[3],
				'sanitize_callback' => $field[2],
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			'raze_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'raze_contact',
				'type'    => $field[1],
			)
		);
	}
}
add_action( 'customize_register', 'raze_customize_register' );

/**
 * Keep digits only.
 *
 * @param string $value Raw.
 * @return string
 */
function raze_sanitize_digits( $value ) {
	return preg_replace( '/\D+/', '', (string) $value );
}

/**
 * Social links that have a value.
 *
 * @return array label => url
 */
function raze_socials() {
	$out = array();
	foreach ( array( 'instagram' => 'Instagram', 'linkedin' => 'LinkedIn', 'facebook' => 'Facebook', 'behance' => 'Behance' ) as $key => $label ) {
		$url = raze_opt( $key );
		if ( $url ) {
			$out[ $label ] = $url;
		}
	}
	return $out;
}
