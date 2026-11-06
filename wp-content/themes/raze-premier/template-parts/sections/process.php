<?php
/**
 * How a project runs, drawn as a workflow: a trigger, two steps, then two
 * branches that run side by side. Nodes complete one after another when
 * the section scrolls into view.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

$raze_flow   = raze_workflow();
$raze_main   = array_slice( $raze_flow, 0, 3 );
$raze_branch = array_slice( $raze_flow, 3 );
$raze_book   = raze_opt( 'booking_url' );
$raze_cta    = $raze_book ? $raze_book : '#contact';

/**
 * One workflow node.
 *
 * @param array $node Node.
 * @param int   $step Order in the run.
 */
$raze_node = static function ( $node, $step ) {
	?>
	<div class="node" data-node style="--step:<?php echo (int) $step; ?>">
		<?php if ( ! empty( $node['tag'] ) ) : ?>
			<span class="node-tag"><?php echo raze_icon( 'arrow' ); // phpcs:ignore ?><?php echo esc_html( $node['tag'] ); ?></span>
		<?php endif; ?>
		<span class="node-done"><?php echo raze_icon( 'check' ); // phpcs:ignore ?>Completed</span>
		<p class="node-title"><span class="node-ic"><?php echo raze_icon( $node['icon'] ); // phpcs:ignore ?></span><?php echo esc_html( $node['title'] ); ?></p>
		<p class="node-body"><?php echo esc_html( $node['body'] ); ?></p>
	</div>
	<?php
};
?>
<section class="process" id="process">
	<div class="process-card" data-zoom>
		<div class="process-copy">
			<p class="kicker" data-reveal>How a project runs</p>
			<h2 class="h-xl process-title" data-reveal>Turn one call into a <span class="fade-word">working plan</span></h2>
			<p class="lede" data-reveal style="--d:.1s">Every project runs the same way. One call starts it. We look under the hood before we suggest anything, you get a fixed quote in writing, and the build and the tracking go live together so every enquiry has a source from day one.</p>
			<a class="btn btn-white" href="<?php echo esc_url( $raze_cta ); ?>" data-reveal style="--d:.18s">Start a project</a>
		</div>

		<div class="flow" data-flow>
			<?php
			$raze_step = 0;
			foreach ( $raze_main as $raze_item ) {
				$raze_node( $raze_item, $raze_step );
				if ( $raze_step < count( $raze_main ) - 1 ) {
					echo '<span class="flow-link" style="--step:' . (int) $raze_step . '" aria-hidden="true"></span>';
				}
				$raze_step++;
			}
			?>
			<div class="flow-split" aria-hidden="true" style="--step:<?php echo (int) $raze_step - 1; ?>"><span></span></div>
			<div class="flow-branches">
				<?php
				foreach ( $raze_branch as $raze_item ) {
					$raze_node( $raze_item, $raze_step );
				}
				?>
			</div>
		</div>
	</div>
</section>
