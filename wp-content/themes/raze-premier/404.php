<?php
/**
 * Not found.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="page-shell page-404">
	<div class="wrap wrap-narrow">
		<p class="kicker">404</p>
		<h1 class="page-title">This page moved, or never existed.</h1>
		<p class="lede">The homepage has everything we do and a way to reach us.</p>
		<p><a class="btn btn-ink" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to the homepage <?php echo raze_icon( 'arrow' ); // phpcs:ignore ?></a></p>
	</div>
</main>
<?php
get_footer();
