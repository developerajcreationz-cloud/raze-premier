<?php
/**
 * Site header.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_links = array(
	'#services' => 'Services',
	'#work'     => 'Work',
	'#process'  => 'Process',
	'#faq'      => 'FAQ',
	'#contact'  => 'Contact',
);
$raze_home = is_front_page() ? '' : home_url( '/' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'raze' ); ?></a>

<header class="site-header" data-header>
	<div class="nav-pill">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Raze Premier home">
			<?php if ( has_custom_logo() ) : ?>
				<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'medium', false, array( 'class' => 'brand-logo' ) ); ?>
			<?php else : ?>
				<span class="brand-mark" aria-hidden="true"><svg viewBox="0 0 32 32" width="28" height="28"><rect width="32" height="32" rx="8" fill="#0B1209"/><path d="M10 24V8h7a5 5 0 0 1 0 10h-7" fill="none" stroke="#FCFFFF" stroke-width="3" stroke-linejoin="round"/><path d="M15.5 18 22 24" stroke="#CDF73D" stroke-width="3" stroke-linecap="round"/></svg></span>
				<span class="brand-word">Raze <b>Premier</b></span>
			<?php endif; ?>
		</a>

		<nav class="nav" id="site-nav" aria-label="<?php esc_attr_e( 'Main', 'raze' ); ?>" data-nav>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'nav-list',
						'depth'          => 1,
					)
				);
			} else {
				echo '<ul class="nav-list">';
				foreach ( $raze_links as $href => $label ) {
					printf( '<li><a href="%s">%s</a></li>', esc_url( $raze_home . $href ), esc_html( $label ) );
				}
				echo '</ul>';
			}
			?>
			<a class="btn btn-ink nav-cta-mobile" href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Book a call</a>
		</nav>

		<a class="btn btn-ink nav-cta" href="<?php echo esc_url( $raze_home . '#contact' ); ?>">Book a call <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
			<span class="sr-only"><?php esc_html_e( 'Menu', 'raze' ); ?></span>
			<?php echo raze_icon( 'menu' ); // phpcs:ignore ?>
			<?php echo raze_icon( 'close' ); // phpcs:ignore ?>
		</button>
	</div>
</header>
