<?php
/**
 * Site header: preloader (front page) and the nav bar.
 *
 * The nav is one dark glass pill fixed at the top: logo on the left, the
 * links split around the "r" mark in the middle, the call to action on the
 * right. It narrows and slims down once the visitor scrolls. On a lander the
 * links stay on that page and the logo goes to the top of the page, so the
 * visitor is never sent back to the homepage.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_lander = raze_current_lander();
$raze_home   = is_front_page() ? '' : home_url( '/' );
$raze_book   = raze_opt( 'booking_url' );

if ( $raze_lander ) {
	$raze_l         = raze_lander( $raze_lander );
	$raze_links     = $raze_l['nav'];
	$raze_brand_url = '#top';
	$raze_cta_url   = '#contact';
	$raze_cta_label = $raze_l['cta'];
	$raze_cta_new   = false;
} else {
	$raze_links     = array(
		'#services' => 'Services',
		'#work'     => 'Work',
		'#process'  => 'Process',
		'#results'  => 'Results',
		'#reviews'  => 'Reviews',
		'#faq'      => 'FAQ',
	);
	foreach ( $raze_links as $raze_href => $raze_label ) {
		unset( $raze_links[ $raze_href ] );
		$raze_links[ $raze_home . $raze_href ] = $raze_label;
	}
	$raze_brand_url = home_url( '/' );
	$raze_cta_url   = $raze_book ? $raze_book : $raze_home . '#contact';
	$raze_cta_label = 'Start a project';
	$raze_cta_new   = (bool) $raze_book;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'raze' ); ?></a>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part( 'template-parts/preloader' ); ?>
<?php endif; ?>

<header class="nav" id="site-nav" data-nav>
	<div class="nav-bar">
		<a class="nav-brand" href="<?php echo esc_url( $raze_brand_url ); ?>" aria-label="<?php echo $raze_lander ? 'Back to the top' : 'Raze Premier home'; ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'medium', false, array( 'class' => 'brand-logo' ) ); ?>
			<?php else : ?>
				<?php echo raze_wordmark( 'wordmark-sm' ); // phpcs:ignore ?>
			<?php endif; ?>
		</a>

		<?php $raze_halves = array_chunk( $raze_links, (int) ceil( count( $raze_links ) / 2 ), true ); ?>
		<nav class="nav-links" aria-label="<?php esc_attr_e( 'Main', 'raze' ); ?>">
			<ul>
				<?php foreach ( $raze_halves[0] as $raze_href => $raze_label ) : ?>
					<li><a href="<?php echo esc_url( $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<a class="nav-mark" href="#top" aria-label="Back to the top"><span aria-hidden="true">r</span></a>
			<ul>
				<?php foreach ( isset( $raze_halves[1] ) ? $raze_halves[1] : array() as $raze_href => $raze_label ) : ?>
					<li><a href="<?php echo esc_url( $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="nav-end">
			<a class="btn btn-grad nav-cta" href="<?php echo esc_url( $raze_cta_url ); ?>" <?php echo $raze_cta_new ? 'target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html( $raze_cta_label ); ?></a>
			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="nav-sheet" data-nav-toggle>
				<span class="sr-only"><?php esc_html_e( 'Menu', 'raze' ); ?></span>
				<?php echo raze_icon( 'menu' ); // phpcs:ignore ?>
				<?php echo raze_icon( 'close' ); // phpcs:ignore ?>
			</button>
		</div>
	</div>

	<div class="nav-sheet" id="nav-sheet" data-nav-sheet>
		<ul>
			<?php foreach ( $raze_links as $raze_href => $raze_label ) : ?>
				<li><a href="<?php echo esc_url( $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<a class="btn btn-grad btn-block" href="<?php echo esc_url( $raze_cta_url ); ?>"><?php echo esc_html( $raze_cta_label ); ?> <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>
</header>
