<?php
/**
 * Lander process. Two styles from the homepage:
 * 'flow'  - the "How a project runs" card with a workflow chart;
 * 'cards' - the results-style gradient cards, one per step.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_p     = $args['l']['process'];
$raze_icons = array( 'search', 'doc', 'rocket', 'chart' );

if ( 'flow' === $raze_p['style'] ) :
	$raze_nodes = array();
	foreach ( $raze_p['steps'] as $raze_k => $raze_s ) {
		$raze_nodes[] = array(
			'icon'  => $raze_icons[ $raze_k % 4 ],
			'tag'   => 0 === $raze_k ? 'Free' : '',
			'title' => $raze_s[0],
			'body'  => $raze_s[1],
		);
	}
	?>
	<section class="process" id="process">
		<div class="process-card" data-zoom>
			<div class="process-copy">
				<p class="kicker" data-reveal><?php echo esc_html( $raze_p['kicker'] ); ?></p>
				<h2 class="h-xl process-title" data-reveal><?php echo esc_html( $raze_p['title'] ); ?></h2>
				<p class="lede" data-reveal style="--d:.1s"><?php echo esc_html( $raze_p['body'] ); ?></p>
				<a class="btn btn-white" href="#contact" data-reveal style="--d:.18s">Start with the free audit</a>
			</div>
			<?php raze_flow_line( $raze_nodes ); ?>
		</div>
	</section>
<?php else : ?>
	<section class="results lprocess" id="process">
		<div class="wrap results-head">
			<h2 class="h-xl" data-reveal><?php echo esc_html( $raze_p['title'] ); ?></h2>
		</div>
		<div class="wrap result-cards lprocess-cards">
			<?php foreach ( $raze_p['steps'] as $raze_i => $raze_s ) : ?>
				<div class="rcard rcard-<?php echo (int) min( $raze_i, 2 ); ?> lstep-card" data-rise style="--i:<?php echo (int) $raze_i; ?>">
					<span class="rcard-kind">Step <?php echo (int) $raze_i + 1; ?></span>
					<span class="rcard-big"><?php echo esc_html( sprintf( '%02d', $raze_i + 1 ) ); ?></span>
					<span class="rcard-foot lstep-foot">
						<b><?php echo esc_html( $raze_s[0] ); ?></b>
						<span><?php echo esc_html( $raze_s[1] ); ?></span>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
