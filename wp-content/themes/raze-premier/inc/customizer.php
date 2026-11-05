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

	$wp_customize->add_setting(
		'raze_palette',
		array(
			'default'           => 'lime',
			'sanitize_callback' => 'raze_sanitize_palette',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'raze_palette',
		array(
			'label'   => __( 'Colour palette', 'raze' ),
			'section' => 'raze_contact',
			'type'    => 'select',
			'choices' => raze_palettes(),
		)
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

/**
 * Available colour palettes.
 *
 * @return array slug => label
 */
function raze_palettes() {
	return array(
		'lime'  => __( 'White, ink and neon lime', 'raze' ),
		'swiss' => __( 'Bone, black and Swiss red', 'raze' ),
		'klein' => __( 'Midnight and Klein blue', 'raze' ),
		'ember' => __( 'Black, bone and ember orange', 'raze' ),
	);
}

/**
 * Keep the palette to a known slug.
 *
 * @param string $value Raw.
 * @return string
 */
function raze_sanitize_palette( $value ) {
	return array_key_exists( $value, raze_palettes() ) ? $value : 'lime';
}

/**
 * Active palette. Administrators can preview another one with ?palette=slug.
 *
 * @return string
 */
function raze_current_palette() {
	if ( isset( $_GET['palette'] ) && current_user_can( 'edit_theme_options' ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		return raze_sanitize_palette( sanitize_key( wp_unslash( $_GET['palette'] ) ) ); // phpcs:ignore WordPress.Security.NonceVerification
	}
	return raze_sanitize_palette( get_theme_mod( 'raze_palette', 'lime' ) );
}

/**
 * Add the palette class to <body>.
 *
 * @param array $classes Classes.
 * @return array
 */
function raze_palette_body_class( $classes ) {
	$classes[] = 'palette-' . raze_current_palette();
	return $classes;
}
add_filter( 'body_class', 'raze_palette_body_class' );
