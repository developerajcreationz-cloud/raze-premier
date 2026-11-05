<?php
/**
 * Titles, meta description, Open Graph and structured data.
 *
 * Skips its own tags when an SEO plugin is active, so they never double up.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

/**
 * True when a common SEO plugin is handling meta tags.
 *
 * @return bool
 */
function raze_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || class_exists( 'SeoPress_Core' );
}

/**
 * Front page document title.
 *
 * @param array $parts Title parts.
 * @return array
 */
function raze_title_parts( $parts ) {
	if ( is_front_page() ) {
		$parts['title']   = 'Raze Premier';
		$parts['tagline'] = 'Branding, websites, SEO and ads that bring in leads';
	}
	return $parts;
}
add_filter( 'document_title_parts', 'raze_title_parts' );

/**
 * Default description.
 *
 * @return string
 */
function raze_meta_description() {
	return raze_opt( 'meta_desc', 'Raze Premier builds brands, websites and lead funnels, and runs SEO for Google and AI search (AEO and GEO), Google Ads, Meta Ads and video, tracked to the enquiries they bring in.' );
}

/**
 * Meta and Open Graph tags.
 */
function raze_head_meta() {
	if ( ! is_front_page() || raze_seo_plugin_active() ) {
		return;
	}
	$desc  = raze_meta_description();
	$title = wp_get_document_title();
	$img   = raze_asset( 'img/work/framily-adventures-04-brand-system-overview.webp' );
	?>
	<meta name="description" content="<?php echo esc_attr( $desc ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $img ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="theme-color" content="#f3f0e8">
	<?php
}
add_action( 'wp_head', 'raze_head_meta', 3 );

/**
 * Organization, services and FAQ structured data.
 */
function raze_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	$offers = array();
	foreach ( raze_service_groups() as $group ) {
		foreach ( $group['items'] as $item ) {
			$offers[] = array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => $item['name'],
					'description' => $item['desc'],
				),
			);
		}
	}

	$org = array(
		'@type'       => 'ProfessionalService',
		'@id'         => home_url( '/#organization' ),
		'name'        => 'Raze Premier',
		'url'         => home_url( '/' ),
		'description' => raze_meta_description(),
		'image'       => raze_asset( 'img/favicon.svg' ),
		'hasOfferCatalog' => array(
			'@type'           => 'OfferCatalog',
			'name'            => 'Services',
			'itemListElement' => $offers,
		),
	);
	if ( raze_opt( 'email' ) ) {
		$org['email'] = raze_opt( 'email' );
	}
	if ( raze_opt( 'phone' ) ) {
		$org['telephone'] = raze_opt( 'phone' );
	}
	$same_as = array_values( raze_socials() );
	if ( $same_as ) {
		$org['sameAs'] = $same_as;
	}

	$faq = array(
		'@type'      => 'FAQPage',
		'mainEntity' => array_map(
			function ( $f ) {
				return array(
					'@type'          => 'Question',
					'name'           => $f['q'],
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f['a'] ),
				);
			},
			raze_faqs()
		),
	);

	$graph = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'     => 'WebSite',
				'@id'       => home_url( '/#website' ),
				'url'       => home_url( '/' ),
				'name'      => 'Raze Premier',
				'publisher' => array( '@id' => home_url( '/#organization' ) ),
			),
			$org,
			$faq,
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'raze_schema', 20 );
