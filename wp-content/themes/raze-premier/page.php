<?php
/**
 * Regular pages (privacy policy, terms and so on).
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="page-shell">
	<div class="wrap wrap-narrow">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="prose"><?php the_content(); ?></div>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
