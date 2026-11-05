<?php
/**
 * Fallback template for posts, archives and search.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="page-shell">
	<div class="wrap wrap-narrow">
		<?php if ( have_posts() ) : ?>
			<?php if ( ! is_singular() ) : ?>
				<h1 class="page-title"><?php echo esc_html( is_home() ? __( 'Notes', 'raze' ) : wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
			<?php endif; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'entry' ); ?>>
					<?php if ( is_singular() ) : ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
						<div class="prose"><?php the_content(); ?></div>
					<?php else : ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="entry-meta"><?php echo esc_html( get_the_date() ); ?></p>
						<div class="prose"><?php the_excerpt(); ?></div>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing here yet', 'raze' ); ?></h1>
			<p><a class="btn btn-ink" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the homepage', 'raze' ); ?></a></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
