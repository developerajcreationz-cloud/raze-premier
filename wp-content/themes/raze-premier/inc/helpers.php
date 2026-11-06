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
		'brand'    => '<path d="M12 3l1.8 4.6L18.5 9l-4.7 1.4L12 15l-1.8-4.6L5.5 9l4.7-1.4z" /><path d="M18 15l.8 2.2L21 18l-2.2.8L18 21l-.8-2.2L15 18l2.2-.8z" />',
		'web'      => '<rect x="3" y="4" width="18" height="16" rx="2.5" /><path d="M3 9h18M6.5 6.5h.01M9 6.5h.01M8 13l-2 2 2 2M16 13l2 2-2 2M13 12.5l-2 5" />',
		'video'    => '<rect x="3" y="5" width="18" height="14" rx="2.5" /><path d="M10 9.2v5.6l4.8-2.8z" />',
		'search'   => '<circle cx="11" cy="11" r="6.5" /><path d="M20 20l-4.2-4.2M8.5 11h5M11 8.5v5" />',
		'ads'      => '<path d="M4 10v4a1 1 0 0 0 1 1h2l6 4V5L7 9H5a1 1 0 0 0-1 1z" /><path d="M16.5 9a4 4 0 0 1 0 6M19 6.5a7.5 7.5 0 0 1 0 11" />',
		'funnel'   => '<path d="M3.5 5h17l-6.5 7.5V19l-4 1.5v-8z" />',
		'bell'     => '<path d="M6 16V11a6 6 0 0 1 12 0v5l1.5 2h-15z" /><path d="M10 20.5a2 2 0 0 0 4 0" />',
		'doc'      => '<path d="M7 3h7l5 5v12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" /><path d="M14 3v5h5M9 13h6M9 17h4" />',
		'rocket'   => '<path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-4-4z" /><path d="M9 11l-4 .5L3 14l4 1M13 15l-.5 4L10 21l-1-4M15.5 8.5h.01" />',
		'chart'    => '<path d="M4 20V4M4 20h16" /><path d="M8 16l3.5-4 3 2.5L20 8" />',
		'check'    => '<path d="M5 12.5l4.5 4.5L19 7.5" />',
		'star'     => '<path d="M12 3.5l2.6 5.4 5.9.8-4.3 4.1 1 5.8L12 16.9l-5.2 2.7 1-5.8-4.3-4.1 5.9-.8z" />',
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

/**
 * The Raze Premier logo: the white "raze PREMIER" mark, motion blur and
 * all, cut out of the brand artwork so it sits on any dark background.
 *
 * @param string $class Extra class.
 * @return string
 */
function raze_wordmark( $class = '' ) {
	return sprintf(
		'<img class="logo %1$s" src="%2$s" width="748" height="263" alt="" decoding="async">',
		esc_attr( $class ),
		esc_url( raze_asset( 'img/logo-white.webp' ) )
	);
}

/**
 * Turn [[words]] into highlighted spans, escaping everything else.
 *
 * @param string $text Text.
 * @return string
 */
function raze_highlight( $text ) {
	$parts = preg_split( '/(\[\[.*?\]\])/u', (string) $text, -1, PREG_SPLIT_DELIM_CAPTURE );
	$out   = '';
	foreach ( $parts as $part ) {
		if ( preg_match( '/^\[\[(.*)\]\]$/u', $part, $m ) ) {
			$out .= '<mark>' . esc_html( $m[1] ) . '</mark>';
		} else {
			$out .= esc_html( $part );
		}
	}
	return $out;
}

/**
 * One node of a workflow chart (the "How a project runs" style).
 *
 * @param array $node icon, title, body, optional tag.
 * @param int   $step Order in the run; nodes with the same step run together.
 */
function raze_flow_node( $node, $step ) {
	?>
	<div class="node" data-node style="--step:<?php echo (int) $step; ?>">
		<?php if ( ! empty( $node['tag'] ) ) : ?>
			<span class="node-tag"><?php echo esc_html( $node['tag'] ); ?></span>
		<?php endif; ?>
		<span class="node-done"><?php echo raze_icon( 'check' ); // phpcs:ignore ?>Done</span>
		<p class="node-title"><span class="node-ic"><?php echo raze_icon( isset( $node['icon'] ) ? $node['icon'] : 'check' ); // phpcs:ignore ?></span><?php echo esc_html( $node['title'] ); ?></p>
		<p class="node-body"><?php echo esc_html( $node['body'] ); ?></p>
	</div>
	<?php
}

/**
 * A straight workflow chart: nodes joined by links, run one after another.
 *
 * @param array $nodes Nodes.
 */
function raze_flow_line( $nodes ) {
	echo '<div class="flow" data-flow>';
	foreach ( array_values( $nodes ) as $i => $node ) {
		raze_flow_node( $node, $i );
		if ( $i < count( $nodes ) - 1 ) {
			echo '<span class="flow-link" style="--step:' . (int) $i . '" aria-hidden="true"></span>';
		}
	}
	echo '</div>';
}
