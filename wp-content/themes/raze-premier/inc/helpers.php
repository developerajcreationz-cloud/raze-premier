<?php
/**
 * Small template helpers.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * URL of a file in the theme assets folder.
 *
 * @param string $path Path relative to assets/.
 * @return string
 */
function raze_asset( $path ) {
	return RAZE_URI . '/assets/' . ltrim( $path, '/' );
}

/**
 * Read a theme mod with a fallback default.
 *
 * @param string $key     Setting key without the raze_ prefix.
 * @param mixed  $default Fallback.
 * @return mixed
 */
function raze_opt( $key, $default = '' ) {
	$value = get_theme_mod( 'raze_' . $key, $default );
	return ( '' === $value || null === $value ) ? $default : $value;
}

/**
 * Inline SVG icons drawn for this theme. Kept to the few the design needs.
 *
 * @param string $name Icon name.
 * @return string
 */
function raze_icon( $name ) {
	$icons = array(
		'arrow'    => '<path d="M4 12h15M13 6l6 6-6 6" />',
		'arrow-ne' => '<path d="M7 17 17 7M8 7h9v9" />',
		'plus'     => '<path d="M12 5v14M5 12h14" />',
		'menu'     => '<path d="M4 8h16M4 16h16" />',
		'close'    => '<path d="M6 6l12 12M18 6 6 18" />',
		'copy'     => '<rect x="8" y="8" width="11" height="11" rx="2" /><path d="M5 15V6a1 1 0 0 1 1-1h9" />',
	);
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return '<svg class="icon icon-' . esc_attr( $name ) . '" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $icons[ $name ] . '</svg>';
}

/**
 * Print a section template part with arguments.
 *
 * @param string $name Section slug in template-parts/sections.
 * @param array  $args Arguments.
 */
function raze_section( $name, $args = array() ) {
	get_template_part( 'template-parts/sections/' . $name, null, $args );
}
