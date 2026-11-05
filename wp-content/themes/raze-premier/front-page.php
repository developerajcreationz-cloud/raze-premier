<?php
/**
 * Landing page. Each section is a template part in template-parts/sections.
 * Reorder or remove sections here.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="landing">
	<?php
	raze_section( 'hero' );
	raze_section( 'surfaces' );
	raze_section( 'services' );
	raze_section( 'ai-search' );
	raze_section( 'work' );
	raze_section( 'process' );
	raze_section( 'quote' );
	raze_section( 'faq' );
	raze_section( 'contact' );
	?>
</main>
<?php
get_footer();
