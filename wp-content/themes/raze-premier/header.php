<?php
/**
 * Site header: preloader (front page), top bar and the floating dock nav.
 *
 * The dock starts at the bottom of the screen and moves to the top once
 * the visitor scrolls.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_home  = is_front_page() ? '' : home_url( '/' );
$raze_left  = array(
	'#services' => 'Services',
	'#work'     => 'Work',
	'#process'  => 'Process',
);
$raze_right = array(
	'#results' => 'Results',
	'#reviews' => 'Reviews',
	'#contact' => 'Contact',
);
$raze_book  = raze_opt( 'booking_url' );
$raze_cta   = $raze_book ? $raze_book : $raze_home . '#contact';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#07060b">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'raze' ); ?></a>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part( 'template-parts/preloader' ); ?>
<?php endif; ?>

<header class="topbar" data-topbar>
	<a class="topbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Raze Premier home">
		<?php if ( has_custom_logo() ) : ?>
			<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'medium', false, array( 'class' => 'brand-logo' ) ); ?>
		<?php else : ?>
			<?php echo raze_wordmark( 'wordmark-sm' ); // phpcs:ignore ?>
		<?php endif; ?>
	</a>
	<a class="btn btn-ghost topbar-cta" href="<?php echo esc_url( $raze_cta ); ?>" <?php echo $raze_book ? 'target="_blank" rel="noopener"' : ''; ?>>Start a project</a>
</header>

<nav class="dock<?php echo is_front_page() ? '' : ' is-top'; ?>" id="site-nav" aria-label="<?php esc_attr_e( 'Main', 'raze' ); ?>" data-dock>
	<div class="dock-pill">
		<ul class="dock-list dock-left">
			<?php foreach ( $raze_left as $raze_href => $raze_label ) : ?>
				<li><a href="<?php echo esc_url( $raze_home . $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<a class="dock-mark" href="<?php echo esc_url( $raze_home . '#top' ); ?>" aria-label="Back to top"><span aria-hidden="true">r</span></a>
		<ul class="dock-list dock-right">
			<?php foreach ( $raze_right as $raze_href => $raze_label ) : ?>
				<li><a href="<?php echo esc_url( $raze_home . $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<button class="dock-toggle" type="button" aria-expanded="false" aria-controls="dock-sheet" data-dock-toggle>
			<span class="dock-toggle-label">Menu</span>
			<?php echo raze_icon( 'menu' ); // phpcs:ignore ?>
			<?php echo raze_icon( 'close' ); // phpcs:ignore ?>
		</button>
	</div>
	<div class="dock-sheet" id="dock-sheet" data-dock-sheet>
		<ul>
			<?php foreach ( array_merge( $raze_left, $raze_right ) as $raze_href => $raze_label ) : ?>
				<li><a href="<?php echo esc_url( $raze_home . $raze_href ); ?>"><?php echo esc_html( $raze_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<a class="btn btn-light btn-block" href="<?php echo esc_url( $raze_cta ); ?>">Start a project <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>
</nav>
